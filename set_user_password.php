<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = App\Models\User::where('email', 'user@tirtabhumi.test')->first();
if ($user) {
    $user->password = bcrypt('Secure#1234');
    $user->save();
    echo "Password updated\n";
} else {
    echo "User not found\n";
}
?>