<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with('training')
            ->where('email', auth()->user()->email);

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category (class/webinar)
        if ($request->filled('category')) {
            $query->whereHas('training', function ($q) use ($request) {
                $q->where('category', $request->category);
            });
        }

        // Search by training title or transaction ID
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('transaction_id', 'like', "%{$search}%")
                    ->orWhereHas('training', function ($subQ) use ($search) {
                        $subQ->where('title', 'like', "%{$search}%");
                    });
            });
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'amount_asc':
                $query->orderBy('total_amount', 'asc');
                break;
            case 'amount_desc':
                $query->orderBy('total_amount', 'desc');
                break;
            default: // latest
                $query->latest();
                break;
        }

        $registrations = $query->paginate(15);

        return view('payment.index', compact('registrations'));
    }

    public function show(Registration $registration)
    {
        // Ensure the logged in user owns this registration
        if ($registration->email !== auth()->user()->email) {
            abort(403);
        }

        $registration->load('training');

        return view('payment.show', compact('registration'));
    }

    public function process(Request $request, Registration $registration)
    {
        if ($registration->email !== auth()->user()->email) {
            abort(403);
        }

        // Initialize Xendit
        \Xendit\Configuration::setXenditKey(config('services.xendit.key'));

        // Generate Transaction ID if not exists
        if (!$registration->transaction_id) {
            $registration->update([
                'transaction_id' => 'TRX-' . strtoupper(uniqid()) . '-' . time(),
            ]);
        }

        // Update expiry time
        $registration->update([
            'payment_expiry_time' => now()->addSeconds(86400),
        ]);

        try {
            $apiInstance = new \Xendit\Invoice\InvoiceApi();

            $createParams = new \Xendit\Invoice\CreateInvoiceRequest([
                'external_id' => $registration->transaction_id,
                'amount' => (float) $registration->training->price,
                'description' => 'Payment for ' . $registration->training->title,
                'invoice_duration' => 86400, // 24 hours
                'currency' => 'IDR',
                'customer' => [
                    'given_names' => $registration->name,
                    'email' => $registration->email,
                    'mobile_number' => $registration->phone,
                ],
                'success_redirect_url' => route('payment.finish', $registration),
                'failure_redirect_url' => route('payment.show', $registration),
            ]);

            $result = $apiInstance->createInvoice($createParams);

            // Save invoice_url
            $registration->update([
                'invoice_url' => $result->getInvoiceUrl(),
            ]);

            return redirect($result->getInvoiceUrl());

        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Xendit Payment Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to create payment: ' . $e->getMessage());
        }
    }



    private function creditPartnerWallet(Registration $registration)
    {
        // Prevent double credit if already paid (this check should be done before calling this, but safe to double check if needed)
        // Here we assume the caller has verified the status transition to 'paid'

        $training = $registration->training;
        if (!$training)
            return;

        $partner = $training->partner; // User relation
        if (!$partner)
            return;

        // 1. Calculate Split
        $price = $registration->training->price;
        $platformFeeRate = config('platform.fee_rate', 0.10); // Default 10%
        $platformFee = $price * $platformFeeRate;
        $partnerAmount = $price - $platformFee;

        // 2. Credit Partner
        $partnerWallet = \App\Models\Wallet::firstOrCreate(
            ['user_id' => $partner->id],
            ['balance' => 0]
        );

        $partnerWallet->increment('balance', $partnerAmount);

        // Log Transaction for Partner
        \App\Models\WalletTransaction::create([
            'wallet_id' => $partnerWallet->id,
            'type' => 'credit',
            'amount' => $partnerAmount,
            'description' => 'Payment from student for ' . $training->title . ' (deducted ' . ($platformFeeRate * 100) . '% platform fee)',
            'source_type' => get_class($registration),
            'source_id' => $registration->id,
        ]);

        // 3. Credit Super Admin (Platform)
        // Find a Super Admin user to receive the fee
        $admin = \App\Models\User::role('super_admin')->orderBy('id', 'asc')->first();

        if ($admin) {
            $adminWallet = \App\Models\Wallet::firstOrCreate(
                ['user_id' => $admin->id],
                ['balance' => 0]
            );
            $adminWallet->increment('balance', $platformFee);

            \App\Models\WalletTransaction::create([
                'wallet_id' => $adminWallet->id,
                'type' => 'credit',
                'amount' => $platformFee,
                'description' => 'Platform Fee from ' . $training->title . ' (Partner: ' . $partner->name . ')',
                'source_type' => get_class($registration),
                'source_id' => $registration->id,
            ]);
        }
    }

    public function finish(Registration $registration)
    {
        if ($registration->email !== auth()->user()->email) {
            abort(403);
        }

        // Optimistically check Xendit status if not yet completed
        if ($registration->status !== 'completed' && $registration->transaction_id) {
            try {
                \Xendit\Configuration::setXenditKey(config('services.xendit.key'));
                $apiInstance = new \Xendit\Invoice\InvoiceApi();

                // Get invoices by external_id (transaction_id)
                $invoices = $apiInstance->getInvoices(null, $registration->transaction_id);

                if (!empty($invoices) && count($invoices) > 0) {
                    // Start checking the first match (usually correct due to unique external_id)
                    $invoice = $invoices[0];
                    $status = $invoice['status'];

                    // Only update if status is actually changing from non-final to final
                    if (($status === 'PAID' || $status === 'SETTLED') && $registration->payment_status !== 'paid') {
                        $registration->update([
                            'status' => 'completed',
                            'payment_status' => 'paid',
                            'payment_method' => $invoice['payment_method'] ?? 'xendit',
                        ]);

                        $this->creditPartnerWallet($registration);

                    } elseif ($status === 'EXPIRED') {
                        $registration->update([
                            'status' => 'cancelled',
                            'payment_status' => 'expired',
                        ]);
                    }
                }

            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to sync Xendit status in finish: ' . $e->getMessage());
            }
        }

        // Reload to get fresh data
        $registration->load('training');

        return view('payment.finish', compact('registration'));
    }

    public function cancel(Request $request, Registration $registration)
    {
        if ($registration->email !== auth()->user()->email) {
            abort(403);
        }

        if ($registration->payment_status === 'paid') {
            return back()->with('error', 'Cannot cancel paid transaction');
        }

        $registration->update([
            'payment_status' => 'cancelled',
            'status' => 'cancelled',
        ]);

        return back()->with('success', 'Payment cancelled successfully');
    }

    public function webhook(Request $request)
    {
        $xenditXCallbackToken = env('XENDIT_WEBHOOK_TOKEN');
        $reqHeaders = $request->header('x-callback-token');

        if ($xenditXCallbackToken && $reqHeaders !== $xenditXCallbackToken) {
            return response()->json(['message' => 'Invalid Token'], 403);
        }

        $data = $request->all();

        // Check for invoice callback
        if (isset($data['status']) && isset($data['external_id'])) {
            $registration = Registration::with('training.partner')->where('transaction_id', $data['external_id'])->first();

            if ($registration) {
                if ($data['status'] === 'PAID') {
                    // Check if not already paid to avoid double credit
                    if ($registration->payment_status !== 'paid') {
                        $registration->update([
                            'status' => 'completed',
                            'payment_status' => 'paid',
                            'payment_method' => $data['payment_method'] ?? $data['payment_channel'] ?? 'xendit',
                        ]);

                        $this->creditPartnerWallet($registration);
                    }
                } elseif ($data['status'] === 'EXPIRED') {
                    $registration->update([
                        'status' => 'cancelled',
                        'payment_status' => 'expired',
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Success'], 200);
    }
}
