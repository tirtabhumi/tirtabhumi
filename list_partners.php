<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$partners = \App\Models\User::role('partner')->get();

echo "Count Partners: " . $partners->count() . "\n";

foreach ($partners as $user) {
    echo "Email: " . $user->email . "\n";
    echo "Org ID: " . ($user->organization_id ?? 'NULL') . "\n";
    if ($user->organization_id) {
        $org = \App\Models\Organization::find($user->organization_id);
        echo "Org Name: " . ($org ? $org->name : 'Org Not Found') . "\n";
    }
    echo "-------------------\n";
}
