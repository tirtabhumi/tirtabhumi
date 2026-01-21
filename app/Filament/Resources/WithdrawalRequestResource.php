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

    protected static ?string $navigationLabel = 'Permintaan Penarikan';
    protected static ?string $modelLabel = 'Permintaan Penarikan';
    protected static ?string $pluralModelLabel = 'Permintaan Penarikan';

    public static function getNavigationGroup(): ?string
    {
        return 'Keuangan & Afiliasi';
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
                    ->label('Mitra / Pengguna')
                    ->default(fn() => auth()->id())
                    ->disabled(fn() => !auth()->user()->hasRole(['super_admin', 'admin', 'finance']))
                    ->dehydrated()
                    ->required(),
                Forms\Components\Placeholder::make('current_balance')
                    ->label('Saldo Saat Ini')
                    ->content(function (Forms\Get $get) {
                        $userId = $get('user_id') ?? auth()->id();
                        $wallet = \App\Models\Wallet::where('user_id', $userId)->first();
                        return 'IDR ' . number_format($wallet?->balance ?? 0, 0, ',', '.');
                    }),
                Forms\Components\TextInput::make('amount')
                    ->label('Jumlah Penarikan')
                    ->required()
                    ->numeric()
                    ->live(debounce: 500)
                    ->minValue(10000)
                    ->rules([
                        fn (Forms\Get $get): \Closure => function (string $attribute, $value, \Closure $fail) use ($get) {
                            $userId = $get('user_id') ?? auth()->id();
                            $wallet = \App\Models\Wallet::where('user_id', $userId)->first();
                            if (!$wallet || $wallet->balance < $value) {
                                $fail('Saldo tidak mencukupi.');
                            }
                        },
                    ]),
                Forms\Components\Placeholder::make('breakdown')
                    ->label('Rincian Potongan')
                    ->content(function (Forms\Get $get) {
                        $amount = (float) $get('amount');
                        if (!$amount)
                            return '-';

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
                                    <span>Biaya Admin Bank:</span>
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
                    ->label('Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ])
                    ->default('pending')
                    ->required()
                    ->visible(fn() => auth()->user()->hasRole(['super_admin', 'admin', 'finance'])),
                Forms\Components\Textarea::make('bank_details')
                    ->label('Detail Bank')
                    ->columnSpanFull()
                    ->default(function () {
                        $user = auth()->user();
                        if ($user && $user->organization) {
                            return "Nama Bank: {$user->organization->bank_name}\nNama Pemilik: {$user->organization->bank_account_name}\nNo. Rekening: {$user->organization->bank_account_number}";
                        }
                        return null;
                    })
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                Forms\Components\FileUpload::make('proof_of_transfer')
                    ->label('Bukti Transfer')
                    ->image()
                    ->directory('withdrawals')
                    ->visible(fn(Forms\Get $get) => auth()->user()->hasRole(['super_admin', 'admin', 'finance']) || $get('proof_of_transfer'))
                    ->disabled(fn() => !auth()->user()->hasRole(['super_admin', 'admin', 'finance']))
                    ->columnSpanFull(),
                Forms\Components\Select::make('processed_by')
                    ->label('Diproses Oleh')
                    ->relationship('processor', 'name')
                    ->visible(fn(Forms\Get $get) => $get('processed_by'))
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('admin_note')
                    ->label('Catatan Admin')
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
                    ->label('Mitra')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        'default' => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                        'pending' => 'Menunggu',
                        default => ucfirst($state),
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('From Date'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Until Date'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['created_from'], fn($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'], fn($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn(WithdrawalRequest $record) => $record->status === 'pending' || auth()->user()->hasRole(['super_admin', 'admin', 'finance'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->exporter(\App\Filament\Exports\WithdrawalRequestExporter::class),
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
            // 'create' => Pages\CreateWithdrawalRequest::route('/create'), // creation handled by front‑end
            'edit' => Pages\EditWithdrawalRequest::route('/{record}/edit'),
            // 'view' => Pages\ViewWithdrawalRequest::route('/{record}'), // view page removed for simplicity
        ];
    }
}
