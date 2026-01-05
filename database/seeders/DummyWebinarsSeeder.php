<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Training;
use App\Models\Registration;
use App\Models\TrainingModule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyWebinarsSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if (!$user) {
            $this->command->error('No user found. Please create a user first.');
            return;
        }

        $webinarTopics = [
            'Digital Transformation in 2026',
            'AI & Machine Learning Trends',
            'Cybersecurity Best Practices',
            'Cloud Computing Strategies',
            'Data Analytics for Business',
            'Agile Project Management',
            'Remote Work Excellence',
            'Digital Marketing Innovations',
            'E-Commerce Growth Hacking',
            'Blockchain & Cryptocurrency',
            'IoT & Smart Technologies',
            'UX/UI Design Masterclass',
            'Content Creation Strategies',
            'Social Media Marketing',
            'SEO & SEM Techniques',
            'Email Marketing Automation',
            'Customer Experience Design',
            'Business Intelligence Tools',
            'Leadership in Digital Age',
            'Innovation & Entrepreneurship',
        ];

        $levels = ['beginner', 'intermediate', 'expert'];
        $types = ['online', 'offline', 'hybrid'];
        $prices = [0, 99000, 199000, 299000, 499000]; // Webinars bisa gratis

        foreach ($webinarTopics as $index => $topic) {
            $selectedType = $types[array_rand($types)];

            // Create Training (Webinar)
            $training = Training::create([
                'title' => $topic,
                'slug' => Str::slug($topic) . '-webinar-' . time() . '-' . $index,
                'description' => "Join our exclusive webinar on {$topic}. Learn from industry experts and get insights into the latest trends and best practices. Interactive Q&A session included. Perfect for professionals looking to stay ahead in their field.",
                'event_date' => now()->addDays(rand(1, 30)),
                'type' => $selectedType,
                'category' => 'webinar',
                'level' => $levels[array_rand($levels)],
                'price' => $prices[array_rand($prices)],
                'location_online' => $selectedType === 'offline' ? null : 'Zoom Webinar',
                'location_offline' => $selectedType === 'offline' ? 'Jakarta Convention Center' : null,
                'is_active' => true,
            ]);

            // Create Registration (Completed)
            Registration::create([
                'training_id' => $training->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => '081234567890',
                'status' => 'completed',
                'payment_status' => $training->price > 0 ? 'paid' : 'unpaid',
            ]);

            // Create Modules (3-5 modules per webinar - shorter than classes)
            $moduleCount = rand(3, 5);

            $moduleTitles = [
                'Welcome & Introduction',
                'Key Concepts Overview',
                'Deep Dive Session',
                'Case Studies & Examples',
                'Q&A and Wrap-up',
            ];

            for ($i = 0; $i < $moduleCount; $i++) {
                TrainingModule::create([
                    'training_id' => $training->id,
                    'title' => $moduleTitles[$i] ?? "Session " . ($i + 1),
                    'description' => $this->getModuleDescription($i),
                    'video_url' => $this->getSampleVideoUrl(),
                    'duration_minutes' => rand(10, 30), // Shorter modules for webinars
                    'order' => $i,
                    'is_preview' => $i === 0, // First module is preview
                ]);
            }

            $this->command->info("Created: {$topic} with {$moduleCount} modules");
        }

        $this->command->info("\n✅ Successfully created 20 dummy webinars with modules for {$user->email}");
    }

    private function getModuleDescription($index)
    {
        $descriptions = [
            'Welcome to the webinar! Get an overview of what we will cover',
            'Understanding the fundamental concepts and terminology',
            'Detailed exploration of key topics and strategies',
            'Real-world examples and practical applications',
            'Interactive Q&A session and closing remarks',
        ];

        return $descriptions[$index] ?? 'Important webinar content for this session';
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
