<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationResource\Pages;
use App\Filament\Resources\OrganizationResource\RelationManagers;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
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
    protected static ?string $modelLabel = 'Organisasi';
    protected static ?string $pluralModelLabel = 'Organisasi';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Pengguna';
    }

    public static function canCreate(): bool
    {
        return !auth()->user()->hasRole('partner');
    }

    public static function canDelete(Model $record): bool
    {
        return !auth()->user()->hasRole('partner');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->disabled(fn() => auth()->user()->hasRole('partner'))
            ->schema([
                Forms\Components\Section::make('Detail Organisasi')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Organisasi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pic_name')
                            ->label('Nama PIC')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pic_phone')
                            ->label('Telepon PIC')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Bank')
                    ->description('Informasi rekening untuk penarikan dana.')
                    ->schema([
                        Forms\Components\TextInput::make('bank_name')
                            ->label('Nama Bank')
                            ->placeholder('contoh: BCA, Mandiri')
                            ->required(),
                        Forms\Components\TextInput::make('bank_account_name')
                            ->label('Nama Pemilik Rekening')
                            ->required(),
                        Forms\Components\TextInput::make('bank_account_number')
                            ->label('Nomor Rekening')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Dokumen Legalitas')
                    ->description('Unggah dokumen legalitas (PKS, NIB, NPWP)')
                    ->schema([
                        Forms\Components\FileUpload::make('pks')
                            ->label('Perjanjian Kerjasama (PKS)')
                            ->directory('organizations/pks')
                            ->openable()
                            ->downloadable()
                            ->disk('public'),
                        Forms\Components\FileUpload::make('nib')
                            ->label('Nomor Induk Berusaha (NIB)')
                            ->directory('organizations/nib')
                            ->openable()
                            ->downloadable()
                            ->disk('public'),
                        Forms\Components\FileUpload::make('npwp')
                            ->label('NPWP')
                            ->directory('organizations/npwp')
                            ->openable()
                            ->downloadable()
                            ->disk('public'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Organisasi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pic_name')
                    ->label('Nama PIC')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pic_phone')
                    ->label('Telepon PIC')
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
                Tables\Actions\ViewAction::make()->label('Lihat Detail')->icon('heroicon-o-eye')->visible(fn() => auth()->user()->hasRole('partner')),
                Tables\Actions\EditAction::make()->hidden(fn() => auth()->user()->hasRole('partner')),
                Tables\Actions\DeleteAction::make()->hidden(fn() => auth()->user()->hasRole('partner')),
            ])
            ->recordUrl(
                fn(Organization $record): string => auth()->user()->hasRole('partner')
                ? Pages\ViewOrganization::getUrl([$record->id])
                : Pages\EditOrganization::getUrl([$record->id])
            )
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
            'view' => Pages\ViewOrganization::route('/{record}'),
            'edit' => Pages\EditOrganization::route('/{record}/edit'),
        ];
    }
}
