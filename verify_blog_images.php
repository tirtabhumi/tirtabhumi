<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$counts = App\Models\Post::whereNotNull('images')
    ->latest()
    ->take(10)
    ->get()
    ->map(fn($p) => count($p->images ?? []))
    ->toArray();

echo "Image counts for latest 10 posts: " . implode(', ', $counts) . PHP_EOL;
