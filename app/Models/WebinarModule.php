<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebinarModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'webinar_id',
        'title',
        'description',
        'type',
        'url',
        'file',
        'order',
    ];

    public function webinar(): BelongsTo
    {
        return $this->belongsTo(Webinar::class);
    }
}
