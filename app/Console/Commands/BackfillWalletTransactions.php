<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;
use App\Models\WalletTransaction;
use App\Models\Wallet;

class BackfillWalletTransactions extends Command
{
    protected $signature = 'wallet:backfill';
    protected $description = 'Backfill wallet transactions for existing paid registrations';

    public function handle()
    {
        $this->info('Starting wallet transaction backfill...');

        // Get all paid registrations
        $paidRegistrations = Registration::with('training.partner')
            ->where('payment_status', 'paid')
            ->get();

        $created = 0;
        $skipped = 0;

        foreach ($paidRegistrations as $registration) {
            // Check if transaction already exists
            $exists = WalletTransaction::where('source_type', get_class($registration))
                ->where('source_id', $registration->id)
                ->where('type', 'credit')
                ->exists();

            if ($exists) {
                $skipped++;
                continue;
            }

            $training = $registration->training;
            if (!$training) {
                $this->warn("Training not found for registration #{$registration->id}");
                continue;
            }

            $partner = $training->partner;
            if (!$partner) {
                $this->warn("Partner not found for training #{$training->id}");
                continue;
            }

            // Ensure wallet exists
            $wallet = Wallet::firstOrCreate(
                ['user_id' => $partner->id],
                ['balance' => 0]
            );

            // Create wallet transaction
            WalletTransaction::create([
                'wallet_id' => $wallet->id,
                'type' => 'credit',
                'amount' => $training->price,
                'description' => 'Payment from student for ' . $training->title . ' (Backfilled)',
                'source_type' => get_class($registration),
                'source_id' => $registration->id,
            ]);

            // Update wallet balance
            $wallet->increment('balance', $training->price);

            $created++;
            $this->info("Created transaction for registration #{$registration->id} - Rp " . number_format($training->price, 0, ',', '.'));
        }

        $this->info("\nBackfill complete!");
        $this->info("Created: {$created}");
        $this->info("Skipped: {$skipped}");

        return 0;
    }
}
