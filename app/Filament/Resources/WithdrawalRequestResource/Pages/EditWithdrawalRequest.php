<?php

namespace App\Filament\Resources\WithdrawalRequestResource\Pages;

use App\Filament\Resources\WithdrawalRequestResource;
use App\Models\Wallet;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWithdrawalRequest extends EditRecord
{
    protected static string $resource = WithdrawalRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $record = $this->record;
        $user = auth()->user();
        
        // Record History if status changed
        if ($record->wasChanged('status')) {
             
             // Update processed_by if finalized
             if (in_array($record->status, ['approved', 'rejected'])) {
                 $record->update(['processed_by' => $user->id]);
             }

             $oldStatus = $record->getOriginal('status');
             $newStatus = $record->status;
             $note = $record->admin_note ? " with note: '{$record->admin_note}'" : "";

             $description = "{$user->name} changed status '{$oldStatus}' to '{$newStatus}'{$note}";

             \App\Models\WithdrawalRequestHistory::create([
                 'withdrawal_request_id' => $record->id,
                 'user_id' => $user->id,
                 'action' => $record->status,
                 'description' => $description,
             ]);

             // If status changed to rejected, refund the amount
             if ($record->status === 'rejected') {
                 $wallet = Wallet::where('user_id', $record->user_id)->first();
                 if ($wallet) {
                     $wallet->increment('balance', $record->amount);

                     \App\Models\WalletTransaction::create([
                         'wallet_id' => $wallet->id,
                         'type' => 'credit',
                         'amount' => $record->amount,
                         'description' => 'Refund: Withdrawal Rejected',
                         'source_type' => get_class($record),
                         'source_id' => $record->id,
                     ]);
                 }

                 // Notify partner
                 \Illuminate\Support\Facades\Mail::to($record->user->email)
                     ->send(new \App\Mail\WithdrawalRejectedPartnerMail($record));
             }

             // If status changed to approved, notify partner
             if ($record->status === 'approved') {
                 \Illuminate\Support\Facades\Mail::to($record->user->email)
                     ->send(new \App\Mail\WithdrawalApprovedPartnerMail($record));
             }
        }
    }
}
