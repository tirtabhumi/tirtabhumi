<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::where('email', 'user@tirtabhumi.test')->first();
if ($user) {
    echo "Email: {$user->email}\n";
    echo "Password hash: {$user->password}\n";
    echo "Role: {$user->role}\n";
} else {
    echo "User not found\n";
}
?>