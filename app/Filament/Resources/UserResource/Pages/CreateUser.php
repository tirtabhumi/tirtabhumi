<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->hasRole('partner')) {
            $data['role'] = 'partner';
        }
    
        return $data;
    }

    protected function afterCreate(): void
    {
        if (auth()->user()->hasRole('partner')) {
            $this->record->assignRole('partner');
        }
    }
}
