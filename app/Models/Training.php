<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'image',
        'attachment',
        'event_date',
        'type',
        'category',
        'level',
        'topic',
        'price',
        'location_offline',
        'location_online',
        'meeting_platform',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function modules()
    {
        return $this->hasMany(TrainingModule::class)->orderBy('order');
    }

    public function userModuleProgresses()
    {
        return $this->hasManyThrough(UserModuleProgress::class , TrainingModule::class);
    }

    public function partner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public static function scopeOwnedByPartner($query)
    {
        $user = auth()->user();
        if ($user && $user->hasRole('partner')) {
            return $query->where(function ($sq) use ($user) {
                $sq->where('user_id', $user->id);
                if ($user->organization_id) {
                    $sq->orWhereHas('partner', function ($pq) use ($user) {
                                $pq->where('organization_id', $user->organization_id);
                            }
                            );
                        }
                    });
        }
        return $query;
    }
}
