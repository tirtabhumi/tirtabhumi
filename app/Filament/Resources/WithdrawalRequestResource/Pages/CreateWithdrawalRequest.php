<?php

namespace App\Filament\Resources\WithdrawalRequestResource\Pages;

use App\Filament\Resources\WithdrawalRequestResource;
use App\Models\Wallet;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;

class CreateWithdrawalRequest extends CreateRecord
{
    protected static string $resource = WithdrawalRequestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userId = $data['user_id'] ?? auth()->id();
        $amount = $data['amount'];

        $wallet = Wallet::firstOrCreate(['user_id' => $userId]);

        if ($wallet->balance < $amount) {
            Notification::make()
                ->title('Insufficient Balance')
                ->body('Your wallet balance is insufficient for this withdrawal.')
                ->danger()
                ->send();
            
            $this->halt();
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;
        $wallet = Wallet::where('user_id', $record->user_id)->first();
        
        if ($wallet) {
            $wallet->decrement('balance', $record->amount);
            
            \App\Models\WalletTransaction::create([
                'wallet_id' => $wallet->id,
                'type' => 'debit',
                'amount' => $record->amount,
                'description' => 'Withdrawal Request Created',
                'source_type' => get_class($record),
                'source_id' => $record->id,
            ]);
        }

        \App\Models\WithdrawalRequestHistory::create([
            'withdrawal_request_id' => $record->id,
            'user_id' => auth()->id(),
            'action' => 'created',
            'description' => "Withdrawal requested by " . auth()->user()->name,
        ]);
    }
}
