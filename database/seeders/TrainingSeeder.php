<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 20 Webinars
        Training::factory()->count(20)->webinar()->create();

        // Create 20 Classes
        Training::factory()->count(20)->class()->create();
    }
}
