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
            $data['role'] = 'end_user';
            $data['organization_id'] = auth()->user()->organization_id;
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $role = $this->record->role;
        // Map legacy role names to Spatie role names if needed, or assume they match
        // Legacy: super_admin, admin, partner, end_user
        // Spatie: super_admin, admin, partner, end_user
        if ($role) {
            $this->record->syncRoles([$role]);
        }
    }
}
