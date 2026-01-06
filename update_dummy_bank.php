<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$affiliate = App\Models\Affiliate::latest()->first();

if ($affiliate) {
    if (!$affiliate->bank_name) {
        $affiliate->update([
            'bank_name' => 'BCA',
            'bank_account_number' => '8230912345',
            'bank_account_holder' => 'Affiliate Store Owner',
        ]);
        echo "Updated affiliate bank details.\n";
    } else {
        echo "Affiliate already has bank details: {$affiliate->bank_name} - {$affiliate->bank_account_number}\n";
    }
} else {
    echo "No affiliate found.\n";
}
