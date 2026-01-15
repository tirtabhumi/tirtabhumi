<?php

namespace Database\Seeders;

use App\Models\Training;
use App\Models\TrainingModule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComprehensiveDummySeeder extends Seeder
{
    public function run(): void
    {
        // ==================== WEBINARS (10) ====================
        for ($i = 1; $i <= 10; $i++) {
            $training = Training::create([
                'title' => "Webinar: " . fake()->words(4, true),
                'slug' => Str::slug("webinar-" . fake()->unique()->words(3, true)),
                'description' => fake()->paragraphs(3, true),
                'category' => 'webinar',
                'type' => fake()->randomElement(['online', 'hybrid']),
                'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
                'price' => fake()->numberBetween(0, 500000),
                'event_date' => now()->addDays(rand(7, 60)),
                'is_active' => true,
                'location_online' => 'https://zoom.us/j/' . fake()->numerify('##########'),
            ]);

            // Webinars typically have 1-3 video modules
            for ($m = 0; $m < rand(1, 3); $m++) {
                TrainingModule::create([
                    'training_id' => $training->id,
                    'title' => "Session " . ($m + 1) . ": " . fake()->sentence(3),
                    'description' => fake()->paragraph(),
                    'type' => 'video',
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'duration_minutes' => rand(30, 90),
                    'order' => $m,
                    'is_preview' => $m === 0,
                ]);
            }
        }
        $this->command->info('Created 10 Webinars with video modules.');

        // ==================== WORKSHOPS (10) ====================
        for ($i = 1; $i <= 10; $i++) {
            $training = Training::create([
                'title' => "Workshop: " . fake()->words(4, true),
                'slug' => Str::slug("workshop-" . fake()->unique()->words(3, true)),
                'description' => fake()->paragraphs(3, true),
                'category' => 'workshop',
                'type' => fake()->randomElement(['offline', 'hybrid']),
                'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
                'price' => fake()->numberBetween(500000, 2500000),
                'event_date' => now()->addDays(rand(14, 90)),
                'is_active' => true,
                'location_offline' => fake()->address(),
            ]);

            // Workshops have 2-4 modules including materials & assignment
            $modules = [
                ['title' => 'Introduction & Materials', 'type' => 'video'],
                ['title' => 'Hands-on Practice', 'type' => 'video'],
                ['title' => 'Group Assignment', 'type' => 'assignment'],
            ];
            foreach ($modules as $m => $mod) {
                $data = [
                    'training_id' => $training->id,
                    'title' => $mod['title'],
                    'description' => fake()->paragraph(),
                    'type' => $mod['type'],
                    'order' => $m,
                    'is_preview' => $m === 0,
                ];
                if ($mod['type'] === 'video') {
                    $data['video_url'] = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
                    $data['duration_minutes'] = rand(45, 120);
                }
                TrainingModule::create($data);
            }
        }
        $this->command->info('Created 10 Workshops with video & assignment modules.');

        // ==================== CLASSES (10) ====================
        $classTitles = [
            'Mastering Laravel Development',
            'React.js for Beginners',
            'Data Science with Python',
            'Digital Marketing Fundamentals',
            'UI/UX Design Bootcamp',
            'Mobile App Development with Flutter',
            'Machine Learning Essentials',
            'WordPress Theme Development',
            'SEO Mastery Course',
            'Entrepreneurship 101',
        ];

        foreach ($classTitles as $idx => $title) {
            $training = Training::create([
                'title' => "Class: " . $title,
                'slug' => Str::slug("class-" . $title),
                'description' => fake()->paragraphs(5, true),
                'category' => 'class',
                'type' => 'online',
                'level' => fake()->randomElement(['beginner', 'intermediate', 'expert']),
                'price' => fake()->numberBetween(1500000, 5000000),
                'event_date' => null, // Classes are self-paced
                'is_active' => true,
            ]);

            // Classes have comprehensive modules: videos, quizzes, assignments
            $classModules = [
                ['title' => 'Chapter 1: Introduction', 'type' => 'video', 'duration' => 15],
                ['title' => 'Chapter 2: Core Concepts', 'type' => 'video', 'duration' => 45],
                ['title' => 'Quiz: Core Concepts Check', 'type' => 'quiz'],
                ['title' => 'Chapter 3: Hands-on Practice', 'type' => 'video', 'duration' => 60],
                ['title' => 'Assignment: Build Your First Project', 'type' => 'assignment'],
                ['title' => 'Chapter 4: Advanced Techniques', 'type' => 'video', 'duration' => 50],
                ['title' => 'Quiz: Advanced Techniques', 'type' => 'quiz'],
                ['title' => 'Final Project Submission', 'type' => 'assignment'],
            ];

            foreach ($classModules as $order => $mod) {
                $data = [
                    'training_id' => $training->id,
                    'title' => $mod['title'],
                    'description' => fake()->paragraph(2),
                    'type' => $mod['type'],
                    'order' => $order,
                    'is_preview' => $order === 0,
                ];

                if ($mod['type'] === 'video') {
                    $data['video_url'] = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
                    $data['duration_minutes'] = $mod['duration'];
                }

                if ($mod['type'] === 'quiz') {
                    $data['min_score'] = 70;
                    $data['max_attempts'] = 3;
                    $data['questions'] = [
                        [
                            'question' => 'What is the primary purpose of ' . strtolower($title) . '?',
                            'options' => ['Option A', 'Option B', 'Option C', 'Option D'],
                            'correct' => 0,
                        ],
                        [
                            'question' => 'Which of the following is a key concept?',
                            'options' => ['Concept 1', 'Concept 2', 'Concept 3', 'Concept 4'],
                            'correct' => 1,
                        ],
                        [
                            'question' => 'What tool is commonly used?',
                            'options' => ['Tool A', 'Tool B', 'Tool C', 'Tool D'],
                            'correct' => 2,
                        ],
                        [
                            'question' => 'Which statement is correct?',
                            'options' => ['Statement 1', 'Statement 2', 'Statement 3', 'Statement 4'],
                            'correct' => 0,
                        ],
                        [
                            'question' => 'What is the best practice?',
                            'options' => ['Practice A', 'Practice B', 'Practice C', 'Practice D'],
                            'correct' => 3,
                        ],
                    ];
                }

                TrainingModule::create($data);
            }
        }
        $this->command->info('Created 10 Classes with video, quiz & assignment modules.');
    }
}
