<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure role exists
        $role = Role::firstOrCreate(['name' => 'super_admin']);

        $user = User::firstOrCreate(
            ['email' => 'superadmin@tirtabhumi.id'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole($role);

        $this->command->info('Super Admin created successfully.');
        $this->command->info('Email: superadmin@tirtabhumi.id');
        $this->command->info('Password: password');
    }
}
