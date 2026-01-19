<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WalletTransactionResource\Pages;
use App\Filament\Resources\WalletTransactionResource\RelationManagers;
use App\Models\WalletTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WalletTransactionResource extends Resource
{
    protected static ?string $model = WalletTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Riwayat Transaksi';
    protected static ?string $modelLabel = 'Riwayat Transaksi';
    protected static ?string $pluralModelLabel = 'Riwayat Transaksi';

    protected static ?string $activeNavigationIcon = 'heroicon-s-clock';

    public static function getNavigationGroup(): ?string
    {
        return 'Keuangan & Afiliasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\KeyValue::make('details')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'credit' => 'success',
                        'debit' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah')
                    ->money('IDR')
                    ->sortable()
                    ->color(fn($record) => $record->type === 'credit' ? 'success' : 'danger')
                    ->prefix(fn($record) => $record->type === 'credit' ? '+ ' : '- '),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->wrap()
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
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
                // Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(\App\Filament\Exports\WalletTransactionExporter::class),
                ]),
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->exporter(\App\Filament\Exports\WalletTransactionExporter::class),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('wallet', function ($query) {
                $query->where('user_id', auth()->id());
            });
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWalletTransactions::route('/'),
        ];
    }
}
