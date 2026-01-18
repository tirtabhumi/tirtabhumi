<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // 1. Xendit Balance
        $xenditService = new \App\Services\XenditService();
        $balanceData = $xenditService->getBalance();
        $xenditBalance = $balanceData['balance'] ?? 0;

        // 2. Revenue Stats (Based on Paid Registrations)
        $todayRevenue = Registration::where('status', 'paid')
            ->whereDate('created_at', now()->today())
            ->sum('total_amount');

        $weekRevenue = Registration::where('status', 'paid')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('total_amount');

        $monthRevenue = Registration::where('status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');

        $yearRevenue = Registration::where('status', 'paid')
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');

        return [
            Stat::make('Saldo Xendit Saat Ini', 'Rp ' . number_format($xenditBalance, 0, ',', '.'))
                ->description('Total Saldo Tersedia')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($todayRevenue, 0, ',', '.'))
                ->description(now()->format('d M Y'))
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),

            Stat::make('Pendapatan Minggu Ini', 'Rp ' . number_format($weekRevenue, 0, ',', '.'))
                ->description('Minggu Ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),

            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($monthRevenue, 0, ',', '.'))
                ->description(now()->format('F Y'))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make('Pendapatan Tahun Ini', 'Rp ' . number_format($yearRevenue, 0, ',', '.'))
                ->description(now()->format('Y'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('success'),
        ];
    }
}
