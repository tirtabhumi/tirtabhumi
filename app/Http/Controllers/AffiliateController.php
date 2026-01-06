<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateSale;
use App\Models\AffiliateWithdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AffiliateController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $affiliate = $user->affiliate;

        // If user has never registered as affiliate
        if (!$affiliate) {
            return view('affiliates.register');
        }

        // If affiliate is pending approval
        if ($affiliate->status === 'pending') {
            return view('affiliates.pending');
        }

        // If affiliate is rejected
        if ($affiliate->status === 'rejected') {
            return view('affiliates.rejected', compact('affiliate'));
        }

        // If affiliate is approved, show dashboard
        return $this->dashboard();
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'ktp_name' => 'required|string|max:255',
            'ktp_photo' => 'required|image|max:2048',
            'bank_account_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:50',
            'bank_book_photo' => 'required|image|max:2048',
        ]);

        // Validate that KTP name and bank account name match
        if ($validated['ktp_name'] !== $validated['bank_account_name']) {
            return back()->withErrors([
                'bank_account_name' => 'Nama di KTP dan Buku Rekening harus sama.'
            ])->withInput();
        }

        // Upload files
        $ktpPath = $request->file('ktp_photo')->store('affiliates/ktp', 'public');
        $bankBookPath = $request->file('bank_book_photo')->store('affiliates/bank', 'public');

        // Generate unique affiliate code
        $affiliateCode = 'AFF-' . strtoupper(Str::random(8));
        while (Affiliate::where('affiliate_code', $affiliateCode)->exists()) {
            $affiliateCode = 'AFF-' . strtoupper(Str::random(8));
        }

        // Create affiliate record
        Affiliate::create([
            'user_id' => Auth::id(),
            'affiliate_code' => $affiliateCode,
            'ktp_name' => $validated['ktp_name'],
            'ktp_photo' => $ktpPath,
            'bank_account_name' => $validated['bank_account_name'],
            'bank_name' => $validated['bank_name'],
            'bank_account_number' => $validated['bank_account_number'],
            'bank_book_photo' => $bankBookPath,
            'status' => 'pending',
        ]);

        return redirect()->route('affiliates.index')->with('success', 'Pendaftaran berhasil! Dokumen Anda sedang direview.');
    }

    public function dashboard()
    {
        $affiliate = Auth::user()->affiliate;

        if (!$affiliate || $affiliate->status !== 'approved') {
            return redirect()->route('affiliates.index');
        }

        // Get current month and year earnings
        $currentMonth = now()->month;
        $currentYear = now()->year;

        $monthlyEarnings = AffiliateSale::where('affiliate_id', $affiliate->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('commission_amount');

        $yearlyEarnings = AffiliateSale::where('affiliate_id', $affiliate->id)
            ->whereYear('created_at', $currentYear)
            ->sum('commission_amount');

        $totalSales = AffiliateSale::where('affiliate_id', $affiliate->id)->count();

        // Get withdrawals
        $withdrawals = AffiliateWithdrawal::where('affiliate_id', $affiliate->id)
            ->latest()
            ->get();

        // Get recent sales
        $recentSales = AffiliateSale::where('affiliate_id', $affiliate->id)
            ->with('registration.training')
            ->latest()
            ->take(10)
            ->get();

        return view('affiliates.dashboard', compact(
            'affiliate',
            'monthlyEarnings',
            'yearlyEarnings',
            'totalSales',
            'withdrawals',
            'recentSales'
        ));
    }

    public function requestWithdrawal(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100000', // Minimum 100k
        ]);

        $affiliate = Auth::user()->affiliate;

        // Check if affiliate has enough balance
        $availableBalance = $affiliate->total_earnings - $affiliate->withdrawn_earnings - $affiliate->pending_earnings;

        if ($validated['amount'] > $availableBalance) {
            return back()->withErrors(['amount' => 'Saldo tidak mencukupi.']);
        }

        // Calculate deductions
        $taxAmount = $validated['amount'] * 0.11; // PPN 11%
        $platformFee = $validated['amount'] * 0.05; // Platform fee 5%
        $netAmount = $validated['amount'] - $taxAmount - $platformFee;

        // Create withdrawal request
        AffiliateWithdrawal::create([
            'affiliate_id' => $affiliate->id,
            'amount' => $validated['amount'],
            'tax_amount' => $taxAmount,
            'platform_fee' => $platformFee,
            'net_amount' => $netAmount,
            'status' => 'requested',
        ]);

        // Update pending earnings
        $affiliate->update([
            'pending_earnings' => $affiliate->pending_earnings + $validated['amount']
        ]);

        return back()->with('success', 'Permintaan pencairan berhasil diajukan.');
    }
}
