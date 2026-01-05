<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $registrations = \App\Models\Registration::with('training')
            ->where('email', auth()->user()->email)
            ->latest()
            ->get();

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
}
