<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WithdrawalRequestResource\Pages;
use App\Models\WithdrawalRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WithdrawalRequestResource extends Resource
{
    protected static ?string $model = WithdrawalRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Withdrawals';

    public static function getNavigationGroup(): ?string
    {
        return 'Finance';
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('partner');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(fn() => auth()->id())
                    ->disabled(fn() => !auth()->user()->hasRole(['super_admin', 'admin', 'finance']))
                    ->dehydrated()
                    ->required(),
                Forms\Components\Placeholder::make('current_balance')
                    ->label('Current Balance')
                    ->content(function (Forms\Get $get) {
                        $userId = $get('user_id') ?? auth()->id();
                        $wallet = \App\Models\Wallet::where('user_id', $userId)->first();
                        return 'IDR ' . number_format($wallet?->balance ?? 0, 0, ',', '.');
                    }),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->live(debounce: 500)
                    ->minValue(10000),
                Forms\Components\Placeholder::make('breakdown')
                    ->label('Rincian Potongan')
                    ->content(function (Forms\Get $get) {
                        $amount = (float) $get('amount');
                        if (!$amount) return '-';

                        // Assumptions: PPN 11%, Platform 5%, Bank 6500
                        // The user can adjust these logic later
                        $ppn = $amount * 0.11; 
                        $platformFee = $amount * 0.05; 
                        $bankFee = 6500;
                        $totalDeduction = $ppn + $platformFee + $bankFee;
                        $net = $amount - $totalDeduction;

                        return new \Illuminate\Support\HtmlString("
                            <div class='text-sm space-y-1'>
                                <div class='flex justify-between'>
                                    <span>Potongan PPN (11%):</span>
                                    <span>Rp " . number_format($ppn, 0, ',', '.') . "</span>
                                </div>
                                <div class='flex justify-between'>
                                    <span>Platform Fee (5%):</span>
                                    <span>Rp " . number_format($platformFee, 0, ',', '.') . "</span>
                                </div>
                                <div class='flex justify-between'>
                                    <span>Bank Admin:</span>
                                    <span>Rp " . number_format($bankFee, 0, ',', '.') . "</span>
                                </div>
                                <div class='flex justify-between font-bold pt-2 border-t'>
                                    <span>Estimasi Diterima:</span>
                                    <span>Rp " . number_format($net, 0, ',', '.') . "</span>
                                </div>
                            </div>
                        ");
                    }),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required()
                    ->visible(fn() => auth()->user()->hasRole(['super_admin', 'admin', 'finance'])),
                Forms\Components\Textarea::make('bank_details')
                    ->columnSpanFull()
                    ->default(function () {
                        $user = auth()->user();
                        if ($user && $user->organization) {
                            return "Bank Name: {$user->organization->bank_name}\nAccount Name: {$user->organization->bank_account_name}\nAccount Number: {$user->organization->bank_account_number}";
                        }
                        return null;
                    })
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                Forms\Components\FileUpload::make('proof_of_transfer')
                    ->image()
                    ->directory('withdrawals')
                    ->visible(fn(Forms\Get $get) => auth()->user()->hasRole(['super_admin', 'admin', 'finance']) || $get('proof_of_transfer'))
                    ->disabled(fn() => !auth()->user()->hasRole(['super_admin', 'admin', 'finance']))
                    ->columnSpanFull(),
                Forms\Components\Select::make('processed_by')
                    ->label('Processed By')
                    ->relationship('processor', 'name')
                    ->visible(fn(Forms\Get $get) => $get('processed_by'))
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('admin_note')
                    ->columnSpanFull()
                    ->visible(fn(Forms\Get $get) => auth()->user()->hasRole(['super_admin', 'admin', 'finance']) || $get('admin_note'))
                    ->disabled(fn() => !auth()->user()->hasRole(['super_admin', 'admin', 'finance'])),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Partner')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        'default' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn (WithdrawalRequest $record) => $record->status === 'pending' || auth()->user()->hasRole(['super_admin', 'admin', 'finance'])),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->when(auth()->user() && auth()->user()->hasRole('partner'), fn($q) => $q->where('user_id', auth()->id()));
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\WithdrawalRequestResource\RelationManagers\HistoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWithdrawalRequests::route('/'),
            'create' => Pages\CreateWithdrawalRequest::route('/create'),
            'edit' => Pages\EditWithdrawalRequest::route('/{record}/edit'),
            'view' => Pages\ViewWithdrawalRequest::route('/{record}'),
        ];
    }
}
