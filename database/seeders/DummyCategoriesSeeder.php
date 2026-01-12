<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 5 Webinars
        Training::factory()->count(5)->state(function (array $attributes) {
            return [
                'category' => 'webinar',
                'title' => 'Webinar: ' . fake()->sentence(3),
            ];
        })->create();
        $this->command->info('Created 5 Webinars.');

        // Create 5 Workshops
        Training::factory()->count(5)->state(function (array $attributes) {
            return [
                'category' => 'workshop',
                'title' => 'Workshop: ' . fake()->sentence(3),
                'price' => fake()->numberBetween(500000, 2000000),
                'type' => 'offline', // Workshops are often offline
                'location_offline' => fake()->address,
            ];
        })->create();
        $this->command->info('Created 5 Workshops.');

        // Create 5 Classes
        Training::factory()->count(5)->state(function (array $attributes) {
            return [
                'category' => 'class',
                'title' => 'Class: ' . fake()->sentence(3),
                'price' => fake()->numberBetween(1000000, 5000000),
                'level' => fake()->randomElement(['beginner', 'intermediate', 'expert']),
            ];
        })->create();
        $this->command->info('Created 5 Classes.');
    }
}
