<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure some categories exist
        $categories = ['Technology', 'Business', 'Innovation', 'News'];
        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($cat)],
                ['name' => $cat]
            );
        }

        // Create 20 posts, assigning random categories from existing ones
        Post::factory(20)->create(function () {
             return ['category_id' => Category::inRandomOrder()->first()->id];
        });
    }
}
