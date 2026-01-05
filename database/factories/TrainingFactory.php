<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(3),
            'image' => null, // Or a default image path if available
            'event_date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'type' => $this->faker->randomElement(['online', 'offline']),
            'price' => $this->faker->numberBetween(0, 1000000),
            'location_offline' => $this->faker->address,
            'location_online' => $this->faker->url,
            'is_active' => true,
            'category' => 'webinar', // Default, will be overridden
            'level' => 'beginner', // Default
        ];
    }

    /**
     * Indicate that the training is a webinar.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function webinar()
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => 'webinar',
            ];
        });
    }

    /**
     * Indicate that the training is a class.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function class()
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => 'class',
                'level' => $this->faker->randomElement(['beginner', 'intermediate', 'expert']),
            ];
        });
    }
}
