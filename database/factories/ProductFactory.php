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
            'images' => [
                $this->faker->imageUrl(800, 600, 'nature'),
                $this->faker->imageUrl(800, 600, 'architecture'),
                $this->faker->imageUrl(800, 600, 'tech'),
            ],
            'category_id' => \App\Models\Category::whereIn('slug', ['barang', 'jasa', 'konstruksi', 'konsultasi'])->inRandomOrder()->first()?->id,
            'platforms' => $this->faker->randomElements(['SIPLah', 'E-Katalog', 'PadiUMKM', 'Tokopedia', 'Shopee'], rand(1, 4)),
            // 'link' removed 
        ];
    }
}
