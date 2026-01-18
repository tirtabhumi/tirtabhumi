<?php

namespace App\Filament\Widgets;

use App\Models\AffiliateSale;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAffiliateTransactions extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Transaksi Affiliate Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                AffiliateSale::query()->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('affiliate.user.name')
                    ->label('Affiliate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration.training.title')
                    ->label('Kelas/Produk')
                    ->limit(30),
                Tables\Columns\TextColumn::make('commission_amount')
                    ->label('Komisi')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'paid' => 'success',
                        'approved' => 'info',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->actions([
                // Tables\Actions\Action::make('open')
                //     ->url(fn (AffiliateSale $record): string => route('filament.admin.resources.affiliate-sales.edit', $record)),
            ]);
    }
}
