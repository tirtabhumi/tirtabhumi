<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use App\Models\User;
use App\Filament\Resources\WithdrawalRequestResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '30s';

    public static function canView(): bool
    {
        return !auth()->user()->hasRole('partner');
    }

    protected function getStats(): array
    {
        // 1. Xendit Balance
        $xenditService = new \App\Services\XenditService();
        $balanceData = $xenditService->getBalance();
        $xenditBalance = $balanceData['balance'] ?? 0;

        // Helper to get own sales revenue
        $getOwnSales = function ($scope) {
            $query = Registration::where('status', 'paid')
                ->whereHas('training', function ($q) {
                    $q->whereHas('partner', function ($u) {
                        $u->whereHas('roles', fn($r) => $r->where('name', 'super_admin'));
                    });
                });

            if ($scope === 'chart') {
                return \Flowframe\Trend\Trend::query($query)
                    ->between(start: now()->subDays(6), end: now())
                    ->perDay()
                    ->sum('total_amount');
            }

            return $query->when($scope === 'today', fn($q) => $q->whereDate('created_at', now()->today()))
                ->when($scope === 'week', fn($q) => $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]))
                ->when($scope === 'month', fn($q) => $q->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year))
                ->when($scope === 'year', fn($q) => $q->whereYear('created_at', now()->year))
                ->sum('total_amount');
        };

        // Helper to get platform fees from partner withdrawals
        $getPartnerFees = function ($scope) {
            $query = \App\Models\WithdrawalRequest::where('status', 'paid');

            if ($scope === 'chart') {
                return \Flowframe\Trend\Trend::query($query)
                    ->between(start: now()->subDays(6), end: now())
                    ->perDay()
                    ->sum('platform_fee');
            }

            return $query->when($scope === 'today', fn($q) => $q->whereDate('updated_at', now()->today()))
                ->when($scope === 'week', fn($q) => $q->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()]))
                ->when($scope === 'month', fn($q) => $q->whereMonth('updated_at', now()->month)->whereYear('updated_at', now()->year))
                ->when($scope === 'year', fn($q) => $q->whereYear('updated_at', now()->year))
                ->sum('platform_fee');
        };

        $todayRevenue = $getOwnSales('today') + $getPartnerFees('today');
        $weekRevenue = $getOwnSales('week') + $getPartnerFees('week');
        $monthRevenue = $getOwnSales('month') + $getPartnerFees('month');
        $yearRevenue = $getOwnSales('year') + $getPartnerFees('year');

        // Calculate 7-day trend
        $ownSalesTrend = $getOwnSales('chart');
        $partnerFeesTrend = $getPartnerFees('chart');

        $combinedTrend = [];
        foreach ($ownSalesTrend as $index => $item) {
            $combinedTrend[] = $item->aggregate + ($partnerFeesTrend[$index]->aggregate ?? 0);
        }

        return [
            Stat::make('Saldo Xendit Saat Ini', 'Rp ' . number_format($xenditBalance, 0, ',', '.'))
                ->description('Total Saldo Tersedia')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($todayRevenue, 0, ',', '.'))
                ->description(now()->format('d M Y'))
                ->descriptionIcon('heroicon-m-calendar')
                ->chart($combinedTrend)
                ->url(WithdrawalRequestResource::getUrl('index', ['tableFilters[status][value]' => 'approved'])) // Link to approved (paid) withdrawals
                ->color('primary'),

            Stat::make('Pendapatan Minggu Ini', 'Rp ' . number_format($weekRevenue, 0, ',', '.'))
                ->description('Minggu Ini')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart($combinedTrend)
                ->url(WithdrawalRequestResource::getUrl('index'))
                ->color('info'),

            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($monthRevenue, 0, ',', '.'))
                ->description(now()->format('F Y'))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart($combinedTrend)
                ->url(WithdrawalRequestResource::getUrl('index'))
                ->color('warning'),

            Stat::make('Pendapatan Tahun Ini', 'Rp ' . number_format($yearRevenue, 0, ',', '.'))
                ->description(now()->format('Y'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->chart($combinedTrend)
                ->url(WithdrawalRequestResource::getUrl('index'))
                ->color('success'),
        ];
    }
}
