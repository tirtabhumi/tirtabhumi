<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\WalletTransaction;

class PartnerRevenueStats extends BaseWidget
{
    protected static ?int $sort = 1;

    public static function canView(): bool
    {
        return auth()->user()->hasRole('partner');
    }

    protected function getStats(): array
    {
        $userId = auth()->id();

        // Helper to get own revenue from Wallet Transactions
        $getRevenue = function ($scope) use ($userId) {
            return WalletTransaction::whereHas('wallet', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
                ->where('type', 'credit')
                ->when($scope === 'today', fn($q) => $q->whereDate('created_at', now()->today()))
                ->when($scope === 'week', fn($q) => $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]))
                ->when($scope === 'month', fn($q) => $q->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year))
                ->when($scope === 'year', fn($q) => $q->whereYear('created_at', now()->year))
                ->sum('amount');
        };

        $todayRevenue = $getRevenue('today');
        $weekRevenue = $getRevenue('week');
        $monthRevenue = $getRevenue('month');
        $yearRevenue = $getRevenue('year');

        return [
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($todayRevenue, 0, ',', '.'))
                ->description(now()->translatedFormat('d M Y'))
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),

            Stat::make('Pendapatan Minggu Ini', 'Rp ' . number_format($weekRevenue, 0, ',', '.'))
                ->description('Minggu Ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),

            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($monthRevenue, 0, ',', '.'))
                ->description(now()->translatedFormat('F Y'))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make('Pendapatan Tahun Ini', 'Rp ' . number_format($yearRevenue, 0, ',', '.'))
                ->description(now()->translatedFormat('Y'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('success'),
        ];
    }
}
