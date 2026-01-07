<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',
        'price',
        'type',
        'link',
        'is_active',
    ];

    protected $casts = [
        'date' => 'datetime',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
    public function modules(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WebinarModule::class)->orderBy('order');
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
