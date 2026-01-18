<?php

namespace App\Filament\Resources\UserModuleProgressResource\Pages;

use App\Filament\Resources\UserModuleProgressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserModuleProgress extends EditRecord
{
    protected static string $resource = UserModuleProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Try to get the training ID from the relation
        $record = $this->getRecord();
        $trainingId = $record->trainingModule->training_id ?? null;

        if ($trainingId) {
            // Redirect to Training Resource Edit page with relevant tab active (relation manager)
            // Assuming TrainingResource is registered properly via route name 'filament.admin.resources.trainings.edit'
            return route('filament.admin.resources.trainings.edit', [
                 'record' => $trainingId,
                 'activeRelationManager' => 2 // As requested by user, though index might be fragile if tabs change order
            ]);
        }

        return $this->getResource()::getUrl('index');
    }
}
