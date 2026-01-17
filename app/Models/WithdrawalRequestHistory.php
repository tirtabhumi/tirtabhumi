<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRequestHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'withdrawal_request_id',
        'user_id',
        'action',
        'description',
    ];

    public function withdrawalRequest()
    {
        return $this->belongsTo(WithdrawalRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
