<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::where('email', 'partner@tirtabhumi.com')->first();

if ($user) {
    echo "User Found: " . $user->name . "\n";
    echo "Organization ID: " . ($user->organization_id ?? 'NULL') . "\n";
    echo "Roles: " . $user->getRoleNames()->implode(', ') . "\n";

    if ($user->organization_id) {
        $org = \App\Models\Organization::find($user->organization_id);
        echo "Organization Name: " . ($org ? $org->name : 'Not Found') . "\n";
    }
} else {
    echo "User partner@tirtabhumi.com not found.\n";
}
