<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'training_id',
        'name',
        'email',
        'phone',
        'institution',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
