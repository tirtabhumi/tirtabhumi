<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getModelLabel(): string
    {
        return 'Pengguna';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pengguna';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Pengguna';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('partner');
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('partner')) {
            $query->where('organization_id', auth()->user()->organization_id)
                ->whereDoesntHave('roles', function ($q) {
                    $q->whereIn('name', ['super_admin', 'admin']);
                });
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Pengguna')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email Diverifikasi Pada'),
                        Forms\Components\TextInput::make('password')
                            ->label('Kata Sandi')
                            ->password(),
                        Forms\Components\Select::make('role')
                            ->label('Peran (Legacy)')
                            ->options([
                                'super_admin' => 'Super Admin',
                                'admin' => 'Admin',
                                'partner' => 'Partner',
                                'end_user' => 'User',
                            ])
                            ->required()
                            ->hidden(fn() => auth()->user()->hasRole('partner'))
                            ->live(),
                        Forms\Components\Select::make('organization_id')
                            ->label('Organisasi')
                            ->relationship('organization', 'name')
                            ->searchable()
                            ->preload()
                            ->disabled(fn() => auth()->user()->hasRole('partner')) // Disabled but visible
                            ->default(fn() => auth()->user()->hasRole('partner') ? auth()->user()->organization_id : null)
                            ->dehydrated() // Ensure it is saved
                            ->required(fn(Forms\Get $get) => $get('role') === 'partner'),
                        Forms\Components\TextInput::make('google_id'),
                        Forms\Components\TextInput::make('avatar'),
                        /*
                        Forms\Components\Select::make('roles')
                            ->label('Peran')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->hidden(fn() => auth()->user()->hasRole('partner')),
                        */
                        Forms\Components\TextInput::make('phone')
                            ->label('Telepon')
                            ->tel(),
                        Forms\Components\Toggle::make('is_blocked')
                            ->label('Blokir Pengguna')
                            ->onColor('danger')
                            ->offColor('success')
                            ->default(false),
                    ]),

                Forms\Components\Section::make('Aplikasi Afiliasi')
                    ->description('Tinjau dan kelola detail aplikasi afiliasi.')
                    ->relationship('affiliate')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('affiliate_code')
                                    ->label('Kode Afiliasi')
                                    ->disabled(),
                                Forms\Components\Select::make('status')
                                    ->label('Status Aplikasi')
                                    ->options([
                                        'pending' => 'Menunggu',
                                        'approved' => 'Disetujui',
                                        'rejected' => 'Ditolak',
                                    ])
                                    ->required()
                                    ->live(),
                            ]),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ktp_name')
                                    ->label('Nama Sesuai KTP'),
                                Forms\Components\FileUpload::make('ktp_photo')
                                    ->label('Foto KTP')
                                    ->image()
                                    ->maxSize(200)
                                    ->disk('public')
                                    ->directory('affiliates/ktp')
                                    ->visibility('public')
                                    ->openable(),
                            ]),

                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('bank_name')
                                    ->label('Nama Bank'),
                                Forms\Components\TextInput::make('bank_account_number')
                                    ->label('Nomor Rekening'),
                                Forms\Components\TextInput::make('bank_account_name')
                                    ->label('Nama Pemilik Rekening'),
                            ]),

                        Forms\Components\FileUpload::make('bank_book_photo')
                            ->label('Foto Buku Tabungan')
                            ->image()
                            ->maxSize(200)
                            ->disk('public')
                            ->directory('affiliates/bank')
                            ->visibility('public')
                            ->openable(),

                        Forms\Components\Textarea::make('rejection_reason')
                            ->label('Alasan Penolakan')
                            ->visible(fn(Forms\Get $get) => $get('status') === 'rejected')
                            ->required(fn(Forms\Get $get) => $get('status') === 'rejected')
                            ->columnSpanFull(),
                    ])
                    ->visible(fn($record) => $record && $record->affiliate()->exists()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization.name')
                    ->label('Organisasi')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('affiliate.status')
                    ->label('Status Afiliasi')
                    ->badge()
                    ->color(fn($state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    })
                    ->sortable()
                    ->hidden(fn() => auth()->user()->hasRole('partner')),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('Terverifikasi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Peran')
                    ->formatStateUsing(fn($state) => $state === 'end_user' ? 'Pengguna Akhir' : ucfirst(str_replace('_', ' ', $state)))
                    ->badge()
                    ->color(fn($state): string => match ($state) {
                        'super_admin' => 'danger',
                        'admin' => 'warning',
                        'partner' => 'info',
                        'finance' => 'success',
                        'end_user' => 'gray',
                        default => 'gray',
                    })
                    ->searchable()
                    ->default('Pengguna Akhir')
                    ->hidden(fn() => auth()->user()->hasRole('partner')),
                Tables\Columns\TextColumn::make('organization.name')
                    ->label('Organisasi')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable()
                    ->default('Pengguna Akhir'),
                Tables\Columns\TextColumn::make('affiliate.status')
                    ->label('Status Afiliasi')
                    ->badge()
                    ->color(fn($state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn($state) => ucfirst($state))
                    ->default('Belum Mengajukan')
                    ->sortable()
                    ->hidden(fn() => auth()->user()->hasRole('partner')),
                Tables\Columns\TextColumn::make('google_id')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('avatar')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_blocked')
                    ->boolean()
                    ->label('Diblokir')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Peran')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->hidden(fn() => auth()->user()->hasRole('partner')),
                Tables\Filters\TernaryFilter::make('is_blocked')
                    ->label('Status Blokir'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
