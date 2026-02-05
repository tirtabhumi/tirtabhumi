<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Filament\Resources\WithdrawalRequestResource;
use App\Filament\Resources\WalletTransactionResource;

class PartnerFinanceStats extends BaseWidget
{
    protected static ?int $sort = 3;

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '30s';

    public static function canView(): bool
    {
        return auth()->user()->hasRole('partner');
    }

    protected function getStats(): array
    {
        $userId = auth()->id();
        $wallet = Wallet::where('user_id', $userId)->first();

        $currentBalance = $wallet ? $wallet->balance : 0;

        $getTrend = function ($type) use ($userId) {
            $query = WalletTransaction::whereHas('wallet', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })->where('type', $type);

            return \Flowframe\Trend\Trend::query($query)
                ->between(start: now()->subDays(6), end: now())
                ->perDay()
                ->sum('amount');
        };

        $totalEarnings = WalletTransaction::whereHas('wallet', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->where('type', 'credit')
            ->sum('amount');

        $totalWithdrawn = WalletTransaction::whereHas('wallet', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->where('type', 'debit')
            ->sum('amount');

        $earningsTrend = $getTrend('credit')->map(fn($item) => $item->aggregate)->toArray();
        $withdrawnTrend = $getTrend('debit')->map(fn($item) => $item->aggregate)->toArray();

        return [
            Stat::make('Saldo Aktif', 'Rp ' . number_format($currentBalance, 0, ',', '.'))
                ->description('Siap untuk dicairkan')
                ->descriptionIcon('heroicon-m-wallet')
                ->url(WithdrawalRequestResource::getUrl('index', ['tableFilters[status][value]' => 'pending']))
                ->color('primary'),
            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalEarnings, 0, ',', '.'))
                ->description('Akumulasi pendapatan kotor')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($earningsTrend)
                ->url(WalletTransactionResource::getUrl('index'))
                ->color('success'),
            Stat::make('Total Ditarik', 'Rp ' . number_format($totalWithdrawn, 0, ',', '.'))
                ->description('Total dana yang sudah dicairkan')
                ->descriptionIcon('heroicon-m-banknotes')
                ->chart($withdrawnTrend)
                ->url(WithdrawalRequestResource::getUrl('index'))
                ->color('warning'),
        ];
    }
}
