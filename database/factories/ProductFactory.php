<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->numberBetween(100000, 5000000),
            'images' => [$this->faker->imageUrl(800, 600, 'nature')],
            'category' => $this->faker->randomElement(['Barang', 'Jasa', 'Konstruksi', 'Konsultasi']),
            'platforms' => $this->faker->randomElements(['SIPLah', 'E-Katalog', 'PadiUMKM', 'Tokopedia', 'Shopee'], rand(1, 4)),
            // 'link' removed 
        ];
    }
}
