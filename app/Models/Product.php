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
        'images',
        'description',
    ];

    protected $casts = [
        'platforms' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
    ];
}
