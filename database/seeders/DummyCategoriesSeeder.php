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
        // Create 10 Webinars
        Training::factory()->count(10)->state(function (array $attributes) {
            return [
                'category' => 'webinar',
                'title' => 'Webinar: ' . fake()->sentence(3),
                'type' => fake()->randomElement(['online', 'hybrid']),
            ];
        })->create();
        $this->command->info('Created 10 Webinars.');

        // Create 10 Workshops
        Training::factory()->count(10)->state(function (array $attributes) {
            return [
                'category' => 'workshop',
                'title' => 'Workshop: ' . fake()->sentence(3),
                'price' => fake()->numberBetween(500000, 2000000),
                'type' => fake()->randomElement(['offline', 'hybrid']),
                'location_offline' => fake()->address,
            ];
        })->create();
        $this->command->info('Created 10 Workshops.');

        // Create 10 Classes
        Training::factory()->count(10)->state(function (array $attributes) {
            return [
                'category' => 'class',
                'title' => 'Class: ' . fake()->sentence(3),
                'price' => fake()->numberBetween(1000000, 5000000),
                'level' => fake()->randomElement(['beginner', 'intermediate', 'expert']),
                'type' => 'online',
            ];
        })->create();
        $this->command->info('Created 10 Classes.');
    }
}
