<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$user = User::where('email', 'user@tirtabhumi.test')->first();
if (!$user) {
    echo "User not found\n";
    exit;
}

echo "ID: {$user->id}\n";
echo "Email: {$user->email}\n";
echo "Name: {$user->name}\n";
echo "Role: {$user->role}\n";
echo "Password (stored): {$user->password}\n";
echo "Email verified: " . ($user->email_verified_at ? 'yes' : 'no') . "\n";
?>