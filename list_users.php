<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$users = User::all();
foreach ($users as $u) {
    echo "ID: {$u->id}, Email: {$u->email}, Role: {$u->role}, Verified: " . ($u->email_verified_at ? 'yes' : 'no') . "\n";
}
?>