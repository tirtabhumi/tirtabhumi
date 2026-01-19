<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$user = User::where('email', 'user@tirtabhumi.test')->first();
if ($user) {
    echo "Email: {$user->email}\n";
    echo "Password hash: {$user->password}\n";
    echo "Role: {$user->role}\n";
    echo "Email verified: " . ($user->email_verified_at ? 'yes' : 'no') . "\n";
} else {
    echo "User not found\n";
}
?>