<?php

namespace Database\Seeders;

use App\Models\Training;
use App\Models\TrainingModule;
use Illuminate\Database\Seeder;

class TrainingModuleSeeder extends Seeder
{
    public function run()
    {
        // Get all classes (not webinars)
        $classes = Training::where('category', 'class')->get();

        foreach ($classes as $class) {
            // Create 5-8 modules per class
            $moduleCount = rand(5, 8);

            for ($i = 1; $i <= $moduleCount; $i++) {
                TrainingModule::create([
                    'training_id' => $class->id,
                    'title' => "Module {$i}: " . $this->getModuleTitle($i),
                    'description' => $this->getModuleDescription($i),
                    'video_url' => $this->getSampleVideoUrl(),
                    'duration_minutes' => rand(10, 45),
                    'order' => $i - 1, // 0-indexed
                    'is_preview' => $i === 1, // First module is preview
                ]);
            }
        }
    }

    private function getModuleTitle($number)
    {
        $titles = [
            'Introduction and Getting Started',
            'Core Concepts and Fundamentals',
            'Practical Implementation',
            'Advanced Techniques',
            'Best Practices and Tips',
            'Real-World Case Studies',
            'Common Mistakes to Avoid',
            'Final Project and Conclusion',
        ];

        return $titles[$number - 1] ?? "Learning Module {$number}";
    }

    private function getModuleDescription($number)
    {
        $descriptions = [
            'Get started with the basics and set up your learning environment',
            'Understand the fundamental concepts that form the foundation',
            'Apply what you\'ve learned through hands-on practice',
            'Dive deeper into advanced topics and techniques',
            'Learn industry best practices and expert tips',
            'Analyze real-world examples and case studies',
            'Discover common pitfalls and how to avoid them',
            'Complete your final project and review key takeaways',
        ];

        return $descriptions[$number - 1] ?? "Learn important concepts in this module";
    }

    private function getSampleVideoUrl()
    {
        // Sample YouTube video URLs for demonstration
        $sampleVideos = [
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://www.youtube.com/watch?v=jNQXAC9IVRw',
            'https://www.youtube.com/watch?v=9bZkp7q19f0',
        ];

        return $sampleVideos[array_rand($sampleVideos)];
    }
}
