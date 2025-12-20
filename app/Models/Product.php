<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'platforms',
        'image',
    ];

    protected $casts = [
        'platforms' => 'array',
        'price' => 'decimal:2',
    ];
}
