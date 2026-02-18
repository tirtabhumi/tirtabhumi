<?php

namespace App\Filament\Resources\BusinessWifiOrderResource\Pages;

use App\Filament\Resources\BusinessWifiOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBusinessWifiOrders extends ManageRecords
{
    protected static string $resource = BusinessWifiOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
