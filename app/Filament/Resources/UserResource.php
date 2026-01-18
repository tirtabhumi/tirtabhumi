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

    public static function getNavigationGroup(): ?string
    {
        return 'User Management';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('partner');
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('partner')) {
            $query->where('organization_id', auth()->user()->organization_id);
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                        Forms\Components\DateTimePicker::make('email_verified_at'),
                        Forms\Components\TextInput::make('password')
                            ->password(),
                        Forms\Components\TextInput::make('role')
                            ->required()
                            ->hidden(fn () => auth()->user()->hasRole('partner'))
                            ->reactive(),
                        Forms\Components\Select::make('organization_id')
                            ->relationship('organization', 'name')
                            ->searchable()
                            ->preload()
                            ->visible(fn (Forms\Get $get) => $get('role') === 'partner')
                            ->disabled(fn () => auth()->user()->hasRole('partner'))
                            ->default(fn () => auth()->user()->hasRole('partner') ? auth()->user()->organization_id : null)
                            ->dehydrated() // Ensure it is saved even if disabled
                            ->required(fn (Forms\Get $get) => $get('role') === 'partner'),
                        Forms\Components\TextInput::make('google_id'),
                        Forms\Components\TextInput::make('avatar'),
                        Forms\Components\Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->hidden(fn () => auth()->user()->hasRole('partner')),
                        Forms\Components\TextInput::make('phone')
                            ->tel(),
                        Forms\Components\Toggle::make('is_blocked')
                            ->label('Block User')
                            ->onColor('danger')
                            ->offColor('success')
                            ->default(false),
                    ]),

                Forms\Components\Section::make('Affiliate Application')
                    ->description('Review and manage affiliate application details.')
                    ->relationship('affiliate')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('affiliate_code')
                                    ->label('Affiliate Code')
                                    ->disabled(),
                                Forms\Components\Select::make('status')
                                    ->label('Application Status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'approved' => 'Approved',
                                        'rejected' => 'Rejected',
                                    ])
                                    ->required()
                                    ->live(),
                            ]),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ktp_name')
                                    ->label('KTP Name'),
                                Forms\Components\FileUpload::make('ktp_photo')
                                    ->label('KTP Photo')
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
                                    ->label('Bank Name'),
                                Forms\Components\TextInput::make('bank_account_number')
                                    ->label('Account Number'),
                                Forms\Components\TextInput::make('bank_account_name')
                                    ->label('Account Name'),
                            ]),

                        Forms\Components\FileUpload::make('bank_book_photo')
                            ->label('Bank Book Photo')
                            ->image()
                            ->maxSize(200)
                            ->disk('public')
                            ->directory('affiliates/bank')
                            ->visibility('public')
                            ->openable(),

                        Forms\Components\Textarea::make('rejection_reason')
                            ->label('Reason for Rejection')
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization.name')
                    ->label('Organization')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable()
                    ->hidden(fn () => auth()->user()->hasRole('partner')),
                Tables\Columns\TextColumn::make('affiliate.status')
                    ->label('Affiliate Status')
                    ->badge()
                    ->color(fn($state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    })
                    ->sortable()
                    ->hidden(fn () => auth()->user()->hasRole('partner')),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        'super_admin' => 'danger',
                        'admin' => 'warning',
                        'partner' => 'info',
                        'finance' => 'success',
                        default => 'gray',
                    })
                    ->searchable()
                    ->hidden(fn () => auth()->user()->hasRole('partner')),
                Tables\Columns\TextColumn::make('google_id')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('avatar')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_blocked')
                    ->boolean()
                    ->label('Blocked')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_blocked')
                    ->label('Blocked Status'),
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
