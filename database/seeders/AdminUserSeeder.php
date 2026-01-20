<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@tirtabhumi.com';
        // Hindari duplikasi jika sudah ada
        $existing = User::where('email', $email)->first();
        if (!$existing) {
            $admin = User::create([
                'name' => 'Super Admin',
                'email' => $email,
                'email_verified_at' => now(),
                // Ganti password di production setelah login pertama
                'password' => Hash::make('S3cureP@ssw0rd'),
            ]);

            // Pastikan role sudah ada (biasanya dibuat di RoleAssignmentSeeder)
            $admin->assignRole('super_admin');
        } else {
            // Fix: Ensure existing admin is verified
            if (is_null($existing->email_verified_at)) {
                $existing->email_verified_at = now();
                $existing->save();
            }
        }
    }
}
