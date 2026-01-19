<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = \App\Models\User::all();

foreach ($users as $user) {
    echo "ID: " . $user->id . " | Name: " . $user->name . " | Email: " . $user->email . "\n";
    echo "Roles: " . $user->getRoleNames()->implode(', ') . "\n";
    echo "Legacy Role Column: " . $user->role . "\n";
    echo "Org ID: " . ($user->organization_id ?? 'NULL') . "\n";
    echo "-------------------\n";
}
