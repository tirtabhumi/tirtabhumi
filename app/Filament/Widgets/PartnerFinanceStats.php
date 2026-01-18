<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Wallet;
use App\Models\WalletTransaction;

class PartnerFinanceStats extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->user()->hasRole('partner');
    }

    protected function getStats(): array
    {
        $userId = auth()->id();
        $wallet = Wallet::where('user_id', $userId)->first();
        
        $currentBalance = $wallet ? $wallet->balance : 0;
        
        $totalEarnings = WalletTransaction::whereHas('wallet', function($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->where('type', 'credit')
            ->sum('amount');
            
        $totalWithdrawn = WalletTransaction::whereHas('wallet', function($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->where('type', 'debit')
            ->sum('amount');

        return [
            Stat::make('Current Balance', 'Rp ' . number_format($currentBalance, 0, ',', '.'))
                ->description('Ready for withdrawal')
                ->descriptionIcon('heroicon-m-wallet')
                ->color('primary'),
            Stat::make('Total Earnings', 'Rp ' . number_format($totalEarnings, 0, ',', '.'))
                ->description('Lifetime gross earnings')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Withdrawn', 'Rp ' . number_format($totalWithdrawn, 0, ',', '.'))
                ->description('Lifetime withdrawals')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),
        ];
    }
}
