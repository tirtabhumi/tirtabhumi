<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Carbon;

// Helper to (re)create a user
function createDemoUser(string $email, string $name, string $plainPassword, string $role)
{
    // Remove any existing record with this email
    User::where('email', $email)->delete();

    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => $plainPassword, // plain – will be hashed by the model's `hashed` cast
        'role' => $role,
        'is_blocked' => false,
        'email_verified_at' => Carbon::now(),
    ]);

    echo "✅ Created {$role}: {$email} (ID {$user->id})\n";
    echo "   Password hash: {$user->password}\n";
}

// Super admin
createDemoUser('superadmin@tirtabhumi.test', 'Super Admin', 'SuperPass#123', 'super_admin');

// Regular end‑user
createDemoUser('user@tirtabhumi.test', 'Demo User', 'Secure#1234', 'user');
?>