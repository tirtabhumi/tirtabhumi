@component('mail::message')
# Withdrawal Approved

Good news! Your withdrawal request has been approved.

**Amount:** Rp {{ number_format($withdrawalRequest->amount, 0, ',', '.') }}  
**Status:** Approved  
**Processed At:** {{ $withdrawalRequest->updated_at->format('d M Y, H:i') }}

@if($withdrawalRequest->admin_note)
**Admin Note:**  
{{ $withdrawalRequest->admin_note }}
@endif

The funds will be transferred to your registered bank account shortly.

@component('mail::button', ['url' => config('app.url') . '/admin/withdrawal-requests/' . $withdrawalRequest->id])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
