<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationResource\Pages;
use App\Filament\Resources\OrganizationResource\RelationManagers;
use App\Models\Organization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizationResource extends Resource
{
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('partner')) {
            $query->where('id', auth()->user()->organization_id);
        }

        return $query;
    }
    protected static ?string $model = Organization::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function getNavigationGroup(): ?string
    {
        return 'User Management';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Organization Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pic_name')
                            ->label('PIC Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pic_phone')
                            ->label('PIC Phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Bank Details')
                    ->description('Account information for withdrawals.')
                    ->schema([
                        Forms\Components\TextInput::make('bank_name')
                            ->label('Bank Name')
                            ->placeholder('e.g. BCA, Mandiri')
                            ->required(),
                        Forms\Components\TextInput::make('bank_account_name')
                            ->label('Account Holder Name')
                            ->required(),
                        Forms\Components\TextInput::make('bank_account_number')
                            ->label('Account Number')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Legal Documents')
                    ->description('Upload legal documents (PKS, NIB, NPWP)')
                    ->schema([
                        Forms\Components\FileUpload::make('pks')
                            ->label('Perjanjian Kerjasama (PKS)')
                            ->directory('organizations/pks')
                            ->openable()
                            ->downloadable()
                            ->disk('public')
                            ->disabled(fn () => auth()->user()->hasRole('partner'))
                            ->dehydrated(fn () => ! auth()->user()->hasRole('partner')),
                        Forms\Components\FileUpload::make('nib')
                            ->label('Nomor Induk Berusaha (NIB)')
                            ->directory('organizations/nib')
                            ->openable()
                            ->downloadable()
                            ->disk('public')
                            ->disabled(fn () => auth()->user()->hasRole('partner'))
                            ->dehydrated(fn () => ! auth()->user()->hasRole('partner')),
                        Forms\Components\FileUpload::make('npwp')
                            ->label('NPWP')
                            ->directory('organizations/npwp')
                            ->openable()
                            ->downloadable()
                            ->disk('public')
                            ->disabled(fn () => auth()->user()->hasRole('partner'))
                            ->dehydrated(fn () => ! auth()->user()->hasRole('partner')),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pic_name')
                    ->label('PIC')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pic_phone')
                    ->label('Phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizations::route('/'),
            'create' => Pages\CreateOrganization::route('/create'),
            'edit' => Pages\EditOrganization::route('/{record}/edit'),
        ];
    }
}
