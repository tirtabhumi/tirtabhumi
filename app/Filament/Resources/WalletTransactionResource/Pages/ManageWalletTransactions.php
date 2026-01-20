<?php

namespace App\Filament\Resources\WalletTransactionResource\Pages;

use App\Filament\Resources\WalletTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWalletTransactions extends ManageRecords
{
    protected static string $resource = WalletTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(), // Transactions are read-only
        ];
    }

    public function getSubheading(): ?string
    {
        return 'Pantau riwayat pemasukan dan pengeluaran saldo Anda.';
    }
}
