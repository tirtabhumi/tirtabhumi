<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            // Use Unsplash random tech/business images
            'images' => collect(range(1, rand(1, 5)))->map(fn() => 'https://images.unsplash.com/photo-' . fake()->randomElement(['1499951360447-b6f6daf84636', '1432821596592-e2c18b78144f', '1504384308090-c54be3855833', '1519389950476-295375a3c8eb', '1556761175-5973ac0f96fc', '1531297461368-bc6cb437084e']) . '?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80')->toArray(),
            'content' => fake()->paragraphs(3, true),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'is_featured' => fake()->boolean(20),
        ];
    }
}
