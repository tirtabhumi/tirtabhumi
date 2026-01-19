<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Wallet;
use App\Models\Affiliate;

class PartnerAndAffiliateBalanceStats extends BaseWidget
{
    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return !auth()->user()->hasRole('partner');
    }

    protected function getStats(): array
    {
        // 1. Partner Balance (Total balance of all wallets)
        $partnerBalance = Wallet::sum('balance');

        // 2. Affiliate Balance (Total Points Available)
        // Check if referral_code exists/points features active, otherwise 0
        $affiliateBalance = 0;

        // Ensure columns exist (fallback for migration safety)
        try {
            // Logic: Total Points - Withdrawn - Pending = Available
            // But usually "Current Balance" implies Available.

            // Re-calculate sum from database
            $totalPoints = Affiliate::sum('total_points');
            $withdrawnPoints = Affiliate::sum('withdrawn_points');
            $pendingPoints = Affiliate::sum('pending_points');

            $affiliateBalance = $totalPoints - $withdrawnPoints;
            $withdrawnAffiliateBalance = $withdrawnPoints;

            // Note: Pending points are usually deducted from available? 
            // If "Saldo Saat Ini" means what they HOLD, it's Total - Withdrawn.
            // If it means what they CAN withdraw, it's Total - Withdrawn - Pending.
            // I will use Total - Withdrawn (Current Assets held by Affiliates).
        } catch (\Exception $e) {
            $affiliateBalance = 0;
            $withdrawnAffiliateBalance = 0;
        }

        return [
            Stat::make('Saldo Partner Saat Ini', 'Rp ' . number_format($partnerBalance, 0, ',', '.'))
                ->description('Total Saldo Tersimpan di Dompet Partner')
                ->descriptionIcon('heroicon-m-wallet')
                ->color('primary')
                ->url(\App\Filament\Resources\WithdrawalRequestResource::getUrl('index')), // Link to partner withdrawals? or User list

            Stat::make('Saldo Affiliate Saat Ini', 'Rp ' . number_format($affiliateBalance, 0, ',', '.'))
                ->description('Total Komisi Affiliate (Tersedia)')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->url(\App\Filament\Resources\AffiliateSaleResource::getUrl('index')), // Link to Commissions list

            Stat::make('Saldo Affiliates yang Sudah Dicairkan', 'Rp ' . number_format($withdrawnAffiliateBalance, 0, ',', '.'))
                ->description('Total Komisi Sudah Dibayarkan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->url(\App\Filament\Resources\AffiliateWithdrawalResource::getUrl('index')), // Links to table with proofs
        ];
    }
}
