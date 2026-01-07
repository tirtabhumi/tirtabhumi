<?php

namespace App\Filament\Resources\WebinarResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ModulesRelationManager extends RelationManager
{
    protected static string $relationship = 'modules';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description'),
                Forms\Components\Select::make('type')
                    ->options([
                        'video' => 'Video (URL)',
                        'pdf' => 'PDF (File)',
                        'assignment' => 'Assignment',
                    ])
                    ->required()
                    ->reactive(),
                Forms\Components\TextInput::make('url')
                    ->label('Video URL')
                    ->url()
                    ->visible(fn(Forms\Get $get) => $get('type') === 'video'),
                Forms\Components\FileUpload::make('file')
                    ->directory('webinar-modules')
                    ->visible(fn(Forms\Get $get) => in_array($get('type'), ['pdf', 'assignment'])),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
