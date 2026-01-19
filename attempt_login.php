<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Auth;

$credentials = ['email' => 'user@tirtabhumi.test', 'password' => 'Secure#1234'];

if (Auth::attempt($credentials)) {
    echo "✅ Auth::attempt succeeded!\n";
    $user = Auth::user();
    echo "Logged in as: {$user->email}, role: {$user->role}\n";
} else {
    echo "❌ Auth::attempt failed.\n";
}
?>