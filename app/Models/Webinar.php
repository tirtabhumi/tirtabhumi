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
}
