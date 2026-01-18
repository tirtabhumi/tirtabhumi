<?php

namespace App\Filament\Widgets;

use App\Services\XenditService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class XenditBalanceWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    public static function canView(): bool
    {
        return auth()->check() && (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('finance'));
    }

    protected function getStats(): array
    {
        $xenditService = new XenditService();
        $balanceData = $xenditService->getBalance();

        $stats = [];

        if ($balanceData) {
            $balance = $balanceData['balance'] ?? 0;
            $stats[] = Stat::make('Xendit Balance', 'Rp ' . number_format($balance, 0, ',', '.'))
                ->description('Current Balance')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success');
        } else {
            $stats[] = Stat::make('Xendit Balance', 'Error')
                ->description('Could not fetch balance')
                ->color('danger');
        }

        return $stats;
    }
}
