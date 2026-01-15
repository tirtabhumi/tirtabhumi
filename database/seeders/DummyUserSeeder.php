<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DummyUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Normal User
        $user = User::firstOrCreate(
            ['email' => 'user@tirtabhumi.test'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $categories = ['class', 'webinar', 'workshop'];

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                // Create Training
                $training = Training::create([
                    'title' => ucfirst($category) . " Training $i",
                    'slug' => \Illuminate\Support\Str::slug(ucfirst($category) . " Training $i-" . \Illuminate\Support\Str::random(5)),
                    'description' => "This is a dummy $category description for testing purposes.",
                    'image' => null, // Or a placeholder URL if permitted
                    'event_date' => now()->addDays(rand(1, 30)),
                    'type' => 'online', // Default to online
                    'category' => $category,
                    'level' => 'beginner',
                    'price' => 100000 * $i,
                    'location_online' => 'Zoom',
                    'is_active' => true,
                ]);

                // Create Registration for the user
                Registration::create([
                    'training_id' => $training->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => '081234567890',
                    'institution' => 'Tirta Bhumi',
                    'status' => 'completed', // Assuming 'completed' makes it 'purchased'
                    'payment_method' => 'bank_transfer',
                    'payment_status' => 'paid',
                    'total_amount' => $training->price,
                ]);
            }
        }

        // 2. Create Superadmin
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@tirtabhumi.test'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Ensure super_admin role exists (created by Filament Shield usually)
        if (!Role::where('name', 'super_admin')->exists()) {
             Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
        }

        $superAdmin->assignRole('super_admin');
    }
}
