@component('mail::message')
# Withdrawal Rejected

Unfortunately, your withdrawal request has been rejected.

**Amount:** Rp {{ number_format($withdrawalRequest->amount, 0, ',', '.') }}  
**Status:** Rejected  
**Processed At:** {{ $withdrawalRequest->updated_at->format('d M Y, H:i') }}

@if($withdrawalRequest->admin_note)
**Reason:**  
{{ $withdrawalRequest->admin_note }}
@endif

The requested amount has been refunded to your wallet balance.

@component('mail::button', ['url' => config('app.url') . '/admin/withdrawal-requests/' . $withdrawalRequest->id])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
