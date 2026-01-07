<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalRevenue = Registration::sum('total_amount') ?? 0;
        $partnerCount = User::role('partner')->count();
        $trainingsCount = \App\Models\Training::count();

        return [
            Stat::make('Total Revenue', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Total Platform Revenue')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Partners', $partnerCount)
                ->description('Active Partners')
                ->color('primary'),
            Stat::make('Total Trainings', $trainingsCount)
                ->description('All Trainings')
                ->color('warning'),
        ];
    }
}
