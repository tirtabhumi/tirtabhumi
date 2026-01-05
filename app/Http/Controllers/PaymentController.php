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

        $validated = $request->validate([
            'payment_method' => 'required|string',
        ]);

        $paymentMethod = $validated['payment_method'];
        $adminFee = 0;

        // Simple fee logic
        switch ($paymentMethod) {
            case 'bca_va':
            case 'mandiri_va':
                $adminFee = 4000;
                break;
            case 'bri_va':
                $adminFee = 3000;
                break;
            case 'ovo':
            case 'dana':
                $adminFee = 1500; // Or percentage
                break;
            default:
                $adminFee = 0;
        }

        $registration->update([
            'payment_method' => $paymentMethod,
            'payment_status' => 'unpaid',
            'admin_fee' => $adminFee,
            'total_amount' => $registration->training->price + $adminFee,
            'transaction_id' => 'TRX-' . strtoupper(uniqid()),
            'payment_expiry_time' => now()->addDay(),
        ]);

        return redirect()->route('payment.confirmation', $registration);
    }

    public function confirmation(Registration $registration)
    {
        if ($registration->email !== auth()->user()->email) {
            abort(403);
        }

        $registration->load('training');

        return view('payment.confirmation', compact('registration'));
    }

    public function cancel(Request $request, Registration $registration)
    {
        if ($registration->email !== auth()->user()->email) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        if ($registration->payment_status === 'paid') {
            return response()->json(['success' => false, 'message' => 'Cannot cancel paid transaction'], 400);
        }

        $registration->update([
            'payment_status' => 'cancelled',
            'status' => 'cancelled',
        ]);

        return response()->json(['success' => true, 'message' => 'Payment cancelled successfully']);
    }
}
