<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Training;
use App\Models\Registration;
use App\Models\TrainingModule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyClassesSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if (!$user) {
            $this->command->error('No user found. Please create a user first.');
            return;
        }

        $classTopics = [
            'Web Development Fundamentals',
            'Advanced JavaScript & React',
            'Python for Data Science',
            'Digital Marketing Mastery',
            'UI/UX Design Principles',
            'Mobile App Development',
            'Cloud Computing with AWS',
            'Cybersecurity Essentials',
            'Machine Learning Basics',
            'Database Design & SQL',
            'DevOps & CI/CD Pipeline',
            'Blockchain Technology',
            'E-Commerce Business Strategy',
            'Content Marketing & SEO',
            'Video Production & Editing',
            'Project Management Professional',
            'Financial Analysis & Modeling',
            'Leadership & Team Management',
            'Public Speaking & Presentation',
            'Personal Branding & LinkedIn',
        ];

        $prices = [299000, 499000, 799000, 999000, 1499000];

        foreach ($classTopics as $index => $topic) {
            // Create Training
            $training = Training::create([
                'title' => $topic,
                'slug' => Str::slug($topic) . '-' . ($index + 1),
                'description' => "Master {$topic} with comprehensive hands-on training. Learn from industry experts and build real-world projects. This course covers everything from basics to advanced concepts with practical examples and exercises.",
                'event_date' => now()->addDays(rand(7, 60)),
                'type' => 'online',
                'category' => 'class',
                'price' => $prices[array_rand($prices)],
                'location_online' => 'Zoom Meeting',
                'is_active' => true,
            ]);

            // Create Registration (Completed)
            Registration::create([
                'training_id' => $training->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => '081234567890',
                'status' => 'completed',
                'payment_status' => 'paid',
            ]);

            // Create Modules (6-10 modules per class)
            $moduleCount = rand(6, 10);

            $moduleTitles = [
                'Introduction & Course Overview',
                'Setting Up Your Environment',
                'Core Concepts & Fundamentals',
                'Hands-On Practice Session',
                'Advanced Techniques',
                'Real-World Project - Part 1',
                'Real-World Project - Part 2',
                'Best Practices & Tips',
                'Common Mistakes to Avoid',
                'Final Project & Certification',
            ];

            for ($i = 0; $i < $moduleCount; $i++) {
                TrainingModule::create([
                    'training_id' => $training->id,
                    'title' => $moduleTitles[$i] ?? "Module " . ($i + 1),
                    'description' => $this->getModuleDescription($i),
                    'video_url' => $this->getSampleVideoUrl(),
                    'duration_minutes' => rand(15, 60),
                    'order' => $i,
                    'is_preview' => $i === 0, // First module is preview
                ]);
            }

            $this->command->info("Created: {$topic} with {$moduleCount} modules");
        }

        $this->command->info("\n✅ Successfully created 20 dummy classes with modules for {$user->email}");
    }

    private function getModuleDescription($index)
    {
        $descriptions = [
            'Get started with the course and understand what you will learn',
            'Set up all necessary tools and software for the course',
            'Learn the fundamental concepts that form the foundation',
            'Apply what you have learned through practical exercises',
            'Dive deeper into advanced topics and techniques',
            'Start building your real-world project - Part 1',
            'Continue and enhance your real-world project - Part 2',
            'Discover industry best practices and expert tips',
            'Learn about common pitfalls and how to avoid them',
            'Complete your final project and get certified',
        ];

        return $descriptions[$index] ?? 'Important learning content for this module';
    }

    private function getSampleVideoUrl()
    {
        $sampleVideos = [
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://www.youtube.com/watch?v=jNQXAC9IVRw',
            'https://www.youtube.com/watch?v=9bZkp7q19f0',
            'https://www.youtube.com/watch?v=kJQP7kiw5Fk',
            'https://www.youtube.com/watch?v=fJ9rUzIMcZQ',
        ];

        return $sampleVideos[array_rand($sampleVideos)];
    }
}
