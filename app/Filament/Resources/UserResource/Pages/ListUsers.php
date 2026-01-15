<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => \Filament\Resources\Components\Tab::make('All Users'),
            'partners' => \Filament\Resources\Components\Tab::make('Partners')
                ->modifyQueryUsing(fn (\Illuminate\Database\Eloquent\Builder $query) => $query->role('partner')),
            'admins' => \Filament\Resources\Components\Tab::make('Admins')
                ->modifyQueryUsing(fn (\Illuminate\Database\Eloquent\Builder $query) => $query->role('admin')),
            'super_admins' => \Filament\Resources\Components\Tab::make('Super Admins')
                ->modifyQueryUsing(fn (\Illuminate\Database\Eloquent\Builder $query) => $query->role('super_admin')),
            'finance' => \Filament\Resources\Components\Tab::make('Finance')
                ->modifyQueryUsing(fn (\Illuminate\Database\Eloquent\Builder $query) => $query->role('finance')),
            'users' => \Filament\Resources\Components\Tab::make('End Users')
                ->modifyQueryUsing(fn (\Illuminate\Database\Eloquent\Builder $query) => $query->doesntHave('roles')),
        ];
    }
}
