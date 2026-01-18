<?php

namespace App\Filament\Resources\AffiliateSaleResource\Pages;

use App\Filament\Resources\AffiliateSaleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAffiliateSale extends EditRecord
{
    protected static string $resource = AffiliateSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
