<?php

namespace App\Observers;

use App\Models\Registration;

class RegistrationObserver
{
    /**
     * Handle the Registration "created" event.
     */
    public function created(Registration $registration): void
    {
        //
    }

    /**
     * Handle the Registration "updated" event.
     */
    public function updated(Registration $registration): void
    {
        // Check if status changed to 'paid' and there's a referral
        if (
            $registration->isDirty('status') &&
            $registration->status === 'paid' &&
            $registration->referred_by
        ) {

            // Find the affiliate by referral code
            $affiliate = \App\Models\Affiliate::where('referral_code', $registration->referred_by)
                ->where('status', 'approved')
                ->first();

            if ($affiliate && $registration->training) {
                // Calculate commission using config
                $commissionRate = config('affiliate.commission_rate', 0.05);
                $commissionPercentage = $commissionRate * 100; // e.g. 5.00
                $commissionAmount = $registration->training->price * $commissionRate;

                // Convert to points (1000 points = Rp 1000, so 1 point = Rp 1)
                $points = $commissionAmount;

                // Create affiliate sale record
                \App\Models\AffiliateSale::create([
                    'affiliate_id' => $affiliate->id,
                    'registration_id' => $registration->id,
                    'commission_amount' => $commissionAmount,
                    'commission_percentage' => $commissionPercentage,
                    'status' => 'approved',
                ]);

                // Update affiliate points and earnings
                $affiliate->increment('total_points', $points);
                $affiliate->increment('total_earnings', $commissionAmount);
            }
        }
    }

    /**
     * Handle the Registration "deleted" event.
     */
    public function deleted(Registration $registration): void
    {
        //
    }

    /**
     * Handle the Registration "restored" event.
     */
    public function restored(Registration $registration): void
    {
        //
    }

    /**
     * Handle the Registration "force deleted" event.
     */
    public function forceDeleted(Registration $registration): void
    {
        //
    }
}
