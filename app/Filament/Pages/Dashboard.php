<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\RevenueStats;
use App\Filament\Widgets\PartnerAndAffiliateBalanceStats;
use App\Filament\Widgets\LatestAffiliateTransactions;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $title = 'Ringkasan Bisnis';

    // IMPORTANT: Removing the view property will force Filament to use the default Dashboard view, 
    // effectively rendering only the widgets we define in getWidgets().
    // protected static string $view = 'filament.pages.dashboard'; 

    public function getColumns(): int|string|array
    {
        return 2;
    }

    public function getWidgets(): array
    {
        return [
            RevenueStats::class,
            PartnerAndAffiliateBalanceStats::class,
            \App\Filament\Widgets\PartnerRevenueStats::class,
            \App\Filament\Widgets\PartnerFinanceStats::class,
            LatestAffiliateTransactions::class,
        ];
    }
}
