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

    public function partner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeOwnedByPartner($query)
    {
        if (auth()->user() && auth()->user()->hasRole('partner')) {
            return $query->where('user_id', auth()->id());
        }
        return $query;
    }
}
