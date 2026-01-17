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

             $description = "Status updated to {$record->status} by {$user->name}";
             if ($record->status === 'approved') {
                 $description = "Approved by {$user->name}";
             } elseif ($record->status === 'rejected') {
                 $description = "Rejected by {$user->name}";
             }

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
             }
        }
    }
}
