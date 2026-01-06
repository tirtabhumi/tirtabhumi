<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Get the latest affiliate
$affiliate = App\Models\Affiliate::latest()->first();

if (!$affiliate) {
    echo "No affiliate found!\n";
    exit;
}

// Get some trainings for dummy sales
$trainings = App\Models\Training::take(5)->get();

if ($trainings->isEmpty()) {
    echo "No trainings found! Please create some trainings first.\n";
    exit;
}

echo "Creating dummy sales for affiliate: {$affiliate->referral_code}\n\n";

// Create 10 dummy sales
for ($i = 1; $i <= 10; $i++) {
    $training = $trainings->random();

    // Create a dummy registration first
    $registration = App\Models\Registration::create([
        'training_id' => $training->id,
        'name' => 'Customer ' . $i,
        'email' => 'customer' . $i . '@example.com',
        'phone' => '08123456789' . $i,
        'institution' => 'Company ' . $i,
        'status' => 'paid',
        'referred_by' => $affiliate->referral_code,
    ]);

    // Calculate commission (5%)
    $commissionAmount = ($training->price * 5) / 100;

    // Create affiliate sale
    $sale = App\Models\AffiliateSale::create([
        'affiliate_id' => $affiliate->id,
        'registration_id' => $registration->id,
        'commission_amount' => $commissionAmount,
        'commission_percentage' => 5.00,
        'status' => 'approved',
    ]);

    // Update affiliate points and earnings
    $affiliate->increment('total_points', $commissionAmount);
    $affiliate->increment('total_earnings', $commissionAmount);

    echo "✓ Sale #{$i}: {$training->title} - Rp " . number_format($training->price, 0, ',', '.') . " → Komisi: " . number_format($commissionAmount, 0, ',', '.') . " poin\n";
}

echo "\n✅ Done! Created 10 dummy sales\n";
echo "📊 Total Points: " . number_format($affiliate->fresh()->total_points, 0, ',', '.') . "\n";
echo "💰 Total Earnings: Rp " . number_format($affiliate->fresh()->total_earnings, 0, ',', '.') . "\n";
