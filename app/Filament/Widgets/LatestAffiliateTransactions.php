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
            ->query(function () {
                $query = AffiliateSale::query()->latest();

                if (auth()->user()->hasRole('partner')) {
                    $query->whereHas('registration.training', function ($q) {
                        $q->where('user_id', auth()->id());
                        if (auth()->user()->organization_id) {
                            $q->orWhereHas('partner', function ($pq) {
                                $pq->where('organization_id', auth()->user()->organization_id);
                            });
                        }
                    });
                }

                return $query;
            })
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('affiliate.user.name')
                    ->label('Afiliator')
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
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'paid' => 'Dibayar',
                        'approved' => 'Disetujui',
                        'pending' => 'Menunggu',
                        'rejected' => 'Ditolak',
                        default => ucfirst($state),
                    }),
            ])
            ->actions([
                // Tables\Actions\Action::make('open')
                //     ->url(fn (AffiliateSale $record): string => route('filament.admin.resources.affiliate-sales.edit', $record)),
            ]);
    }
}
