<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'event_date',
        'type',
        'price',
        'location_offline',
        'location_online',
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
}
