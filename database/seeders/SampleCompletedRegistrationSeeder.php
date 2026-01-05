<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Training;
use App\Models\Registration;
use Illuminate\Database\Seeder;

class SampleCompletedRegistrationSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if (!$user) {
            $this->command->error('No user found. Please create a user first.');
            return;
        }

        // Get 3 classes
        $classes = Training::where('category', 'class')->take(3)->get();

        foreach ($classes as $class) {
            Registration::create([
                'training_id' => $class->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => '081234567890',
                'status' => 'completed',
                'payment_status' => 'paid',
            ]);
        }

        $this->command->info('Created 3 completed class registrations for ' . $user->email);
    }
}
