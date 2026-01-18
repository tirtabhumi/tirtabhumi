@component('mail::message')
# New Withdrawal Request

A partner has submitted a new withdrawal request.

**Partner:** {{ $withdrawalRequest->user->name }}  
**Amount:** Rp {{ number_format($withdrawalRequest->amount, 0, ',', '.') }}  
**Requested At:** {{ $withdrawalRequest->created_at->format('d M Y, H:i') }}

**Bank Details:**  
{{ $withdrawalRequest->bank_details }}

@component('mail::button', ['url' => config('app.url') . '/admin/withdrawal-requests/' . $withdrawalRequest->id])
View Request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
