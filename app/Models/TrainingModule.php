<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'title',
        'description',
        'type',
        'video_url',
        'file_path',
        'questions',
        'duration_minutes',
        'order',
        'is_preview',
        'min_score',
        'max_attempts',
        'meeting_platform',
        'meeting_link',
        'scheduled_at',
    ];

    protected $casts = [
        'questions' => 'array',
        'is_preview' => 'boolean',
        'min_score' => 'integer',
        'max_attempts' => 'integer',
        'scheduled_at' => 'datetime',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserModuleProgress::class);
    }

    public function isCompletedBy($userId)
    {
        return $this->userProgress()
            ->where('user_id', $userId)
            ->where('is_completed', true)
            ->exists();
    }

    public function isCompletedOrSubmittedBy($userId)
    {
        return $this->userProgress()
            ->where('user_id', $userId)
            ->where(function ($query) {
                $query->where('is_completed', true)
                    ->orWhereIn('status', ['Menunggu Penilaian', 'submitted']);
            })
            ->exists();
    }

    public function isUnlockedFor($userId)
    {
        // First module is always unlocked
        if ($this->order === 0) {
            return true;
        }

        // Check if previous module is completed
        $previousModule = self::where('training_id', $this->training_id)
            ->where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();

        if (!$previousModule) {
            return true;
        }

        return $previousModule->isCompletedOrSubmittedBy($userId);
    }
}
