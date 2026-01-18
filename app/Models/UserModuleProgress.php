<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModuleProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_module_id',
        'is_completed',
        'completed_at',
        'score',
        'attempts',
        'submission_text',
        'submission_file',
        'status',
        'quiz_answers',
        'mentor_feedback',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
        'submission_file' => 'array',
        'quiz_answers' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingModule()
    {
        return $this->belongsTo(TrainingModule::class);
    }
}
