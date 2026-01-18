<?php

namespace App\Filament\Resources\AffiliateSaleResource\Pages;

use App\Filament\Resources\AffiliateSaleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAffiliateSales extends ListRecords
{
    protected static string $resource = AffiliateSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
