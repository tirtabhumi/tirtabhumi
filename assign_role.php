<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

$userEmail = 'amalina@gmail.com';
$user = App\Models\User::where('email', $userEmail)->first();

if (!$user) {
    echo "User not found: $userEmail\n";
    exit(1);
}

try {
    $role = Spatie\Permission\Models\Role::firstOrCreate(['name' => 'super_admin']);
    $user->assignRole($role);
    echo "Successfully assigned 'super_admin' role to {$user->name} ({$user->email})\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
