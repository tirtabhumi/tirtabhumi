<?php

use App\Models\Training;

$t = Training::find(18);
if ($t) {
    echo "ID: {$t->id} | Title: {$t->title} | Active: {$t->is_active} | Date: {$t->event_date} | Type: {$t->type} | Category: {$t->category}\n";
} else {
    echo "Training ID 18 not found.\n";
}

$count = Training::where('is_active', true)
    ->where(function ($q) {
        $q->where('event_date', '>=', now())
            ->orWhereNull('event_date');
    })->count();
echo "Total visible trainings count: $count\n";

