<?php

namespace App\Filament\Resources\WithdrawalRequestResource\Pages;

use App\Filament\Resources\WithdrawalRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWithdrawalRequests extends ListRecords
{
    protected static string $resource = WithdrawalRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => auth()->user()->hasRole('partner')),
        ];
    }

    public function getSubheading(): ?string
    {
        return 'Kelola permintaan pencairan dana dari mitra dan afiliator.';
    }
}
