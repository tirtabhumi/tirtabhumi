<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegularUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'user@tirtabhumi.id'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password123'),
                'role' => 'end_user',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Regular User created successfully.');
        $this->command->info('Email: user@tirtabhumi.id');
        $this->command->info('Password: password123');
    }
}
