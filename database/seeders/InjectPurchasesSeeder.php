<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Training;
use App\Models\Registration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InjectPurchasesSeeder extends Seeder
{
    public function run()
    {
        // 1. Find or Create User
        $email = 'juanganteng@gmail.com';
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Juan Ganteng',
                'password' => Hash::make('password'), // Default password
                'email_verified_at' => now(),
                'role' => 'end_user', // Assuming default role is end_user
            ]
        );

        // Assign role if using Spatie Permissions
        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            // Basic role assignment if applicable, though users might not have roles by default depending on setup
            // Just ensuring user is valid.
        }

        $this->command->info("Target User: {$user->name} ({$user->email})");

        // 2. Define categories to inject
        $categories = ['class', 'webinar', 'workshop'];

        foreach ($categories as $category) {
            // Get 5 trainings of this category
            $trainings = Training::where('category', $category)->inRandomOrder()->take(5)->get();

            if ($trainings->count() < 5) {
                $this->command->warn("Not enough trainings found for category: {$category}. Creating missing ones...");
                $needed = 5 - $trainings->count();
                // Create missing trainings on the fly
                $newTrainings = Training::factory()->count($needed)->state([
                    'category' => $category,
                    'title' => ucwords($category) . ' ' . Str::random(5),
                    'is_active' => true,
                ])->create();
                $trainings = $trainings->merge($newTrainings);
            }

            foreach ($trainings as $training) {
                // Check if already registered
                $exists = Registration::where('email', $user->email)
                    ->where('training_id', $training->id)
                    ->exists();

                if (!$exists) {
                    Registration::create([
                        'training_id' => $training->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone ?? '08123456789',
                        'status' => 'completed', // IMPORTANT: Must be completed to show up
                        'payment_status' => 'paid',
                        'total_amount' => $training->price,
                        'payment_method' => 'manual_transfer',
                        'transaction_id' => 'TRX-' . strtoupper(Str::random(10)),
                    ]);
                    $this->command->info("Injected: {$training->title} ({$category})");
                } else {
                    $this->command->info("Already owned: {$training->title}");
                }
            }
        }

        $this->command->info("Injection completed for {$email}");
    }
}
