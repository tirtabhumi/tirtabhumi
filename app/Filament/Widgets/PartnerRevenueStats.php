<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\WalletTransaction;
use App\Filament\Resources\WalletTransactionResource;

class PartnerRevenueStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '30s';

    public static function canView(): bool
    {
        return auth()->user()->hasRole('partner');
    }

    protected function getStats(): array
    {
        $userId = auth()->id();

        // Helper to get own revenue from Wallet Transactions
        $getRevenue = function ($scope) use ($userId) {
            $query = WalletTransaction::whereHas('wallet', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })->where('type', 'credit');

            if ($scope === 'chart') {
                return \Flowframe\Trend\Trend::query($query)
                    ->between(start: now()->subDays(6), end: now())
                    ->perDay()
                    ->sum('amount');
            }

            return $query->when($scope === 'today', fn($q) => $q->whereDate('created_at', now()->today()))
                ->when($scope === 'week', fn($q) => $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]))
                ->when($scope === 'month', fn($q) => $q->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year))
                ->when($scope === 'year', fn($q) => $q->whereYear('created_at', now()->year))
                ->sum('amount');
        };

        $todayRevenue = $getRevenue('today');
        $weekRevenue = $getRevenue('week');
        $monthRevenue = $getRevenue('month');
        $yearRevenue = $getRevenue('year');

        $chartData = $getRevenue('chart')->map(fn($item) => $item->aggregate)->toArray();

        return [
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($todayRevenue, 0, ',', '.'))
                ->description(now()->translatedFormat('d M Y'))
                ->descriptionIcon('heroicon-m-calendar')
                ->chart($chartData)
                ->url(WalletTransactionResource::getUrl('index', ['tableFilters[created_at][created_from]' => now()->toDateString()]))
                ->color('primary'),

            Stat::make('Pendapatan Minggu Ini', 'Rp ' . number_format($weekRevenue, 0, ',', '.'))
                ->description('Minggu Ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart($chartData)
                ->url(WalletTransactionResource::getUrl('index'))
                ->color('info'),

            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($monthRevenue, 0, ',', '.'))
                ->description(now()->translatedFormat('F Y'))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart($chartData)
                ->url(WalletTransactionResource::getUrl('index'))
                ->color('warning'),

            Stat::make('Pendapatan Tahun Ini', 'Rp ' . number_format($yearRevenue, 0, ',', '.'))
                ->description(now()->translatedFormat('Y'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->chart($chartData)
                ->url(WalletTransactionResource::getUrl('index'))
                ->color('success'),
        ];
    }
}
