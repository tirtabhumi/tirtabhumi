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
            $status = strtolower($request->payment_status);
            if ($status === 'unpaid') {
                // Broadly define unpaid as 'unpaid', 'expired', or 'pending'
                $query->whereIn('payment_status', ['unpaid', 'expired', 'pending']);
            } else {
                $query->where('payment_status', $status);
            }
        }

        // Filter by status (completed, pending, cancelled)
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
        $training = $registration->training;
        if (!$training)
            return;

        $partner = $training->partner; // User relation
        if (!$partner)
            return;

        $partnerWallet = \App\Models\Wallet::firstOrCreate(
            ['user_id' => $partner->id],
            ['balance' => 0]
        );

        $partnerWallet->increment('balance', $registration->training->price);

        // Log Transaction
        \App\Models\WalletTransaction::create([
            'wallet_id' => $partnerWallet->id,
            'type' => 'credit',
            'amount' => $registration->training->price,
            'description' => 'Payment from student for ' . $training->title,
            'source_type' => get_class($registration),
            'source_id' => $registration->id,
        ]);
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
                    $invoice = $invoices[0];
                    $status = $invoice['status'];

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

        if (isset($data['status']) && isset($data['external_id'])) {
            $registration = Registration::with('training.partner')->where('transaction_id', $data['external_id'])->first();

            if ($registration) {
                if ($data['status'] === 'PAID') {
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