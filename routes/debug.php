<?php
use Illuminate\Support\Facades\Route;
use App\Models\Training;

Route::get('/debug/training/{id}', function ($id) {
    $training = Training::with('modules')->findOrFail($id);
    return $training->modules->map(function ($m) {
        return [
            'id' => $m->id,
            'title' => $m->title,
            'type' => $m->type,
            'questions_raw' => $m->getAttributes()['questions'] ?? 'N/A',
            'questions_decoded' => $m->questions,
            'is_quiz_check' => ($m->type === 'quiz' || (!empty($m->questions) && count($m->questions) > 0))
        ];
    });
});
