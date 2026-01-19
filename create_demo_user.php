<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Create a regular end‑user account
$user = User::firstOrCreate(
    ['email' => 'user@tirtabhumi.test'],
    [
        'name' => 'Demo User',
        'password' => bcrypt('Secure#1234'), // same password as before
        'role' => 'end_user',
        // optional fields – adjust as needed
        'is_blocked' => false,
    ]
);

if ($user->wasRecentlyCreated) {
    echo "User created: {$user->email}\n";
} else {
    echo "User already existed: {$user->email}\n";
}
?>