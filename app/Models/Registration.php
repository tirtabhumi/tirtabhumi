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
        'payment_method',
        'payment_status',
        'transaction_id',
        'admin_fee',
        'total_amount',
        'payment_expiry_time',
        'status',
        'invoice_url',
        'referred_by',
    ];

    protected $casts = [
        'payment_expiry_time' => 'datetime',
        'admin_fee' => 'decimal:0',
        'total_amount' => 'decimal:0',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
