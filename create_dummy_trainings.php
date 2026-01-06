<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Creating dummy trainings...\n\n";

// Clear existing trainings
App\Models\Training::truncate();

$trainings = [
    [
        'title' => 'Digital Marketing Fundamentals',
        'category' => 'webinar',
        'type' => 'online',
        'level' => 'beginner',
        'price' => 500000,
        'event_date' => now()->addDays(30),
    ],
    [
        'title' => 'Advanced SEO Strategies',
        'category' => 'class',
        'type' => 'online',
        'level' => 'expert',
        'price' => 750000,
        'event_date' => now()->addDays(45),
    ],
    [
        'title' => 'Social Media Marketing Workshop',
        'category' => 'webinar',
        'type' => 'offline',
        'level' => 'intermediate',
        'price' => 350000,
        'event_date' => now()->addDays(20),
    ],
    [
        'title' => 'Content Creation Masterclass',
        'category' => 'class',
        'type' => 'online',
        'level' => 'intermediate',
        'price' => 600000,
        'event_date' => now()->addDays(60),
    ],
    [
        'title' => 'Email Marketing Bootcamp',
        'category' => 'webinar',
        'type' => 'online',
        'level' => 'beginner',
        'price' => 400000,
        'event_date' => now()->addDays(15),
    ],
];

foreach ($trainings as $data) {
    $training = App\Models\Training::create(array_merge($data, [
        'slug' => \Illuminate\Support\Str::slug($data['title']),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'is_active' => true,
        'quota' => 50,
    ]));

    echo "✓ Created: {$training->title} - Rp " . number_format($training->price, 0, ',', '.') . "\n";
}

echo "\n✅ Done! Created " . count($trainings) . " trainings\n";
