<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'affiliate_code',
        'ktp_name',
        'ktp_photo',
        'bank_account_name',
        'bank_name',
        'bank_account_number',
        'bank_book_photo',
        'status',
        'rejection_reason',
        'total_earnings',
        'withdrawn_earnings',
        'pending_earnings',
    ];

    protected $casts = [
        'total_earnings' => 'decimal:2',
        'withdrawn_earnings' => 'decimal:2',
        'pending_earnings' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(AffiliateSale::class);
    }

    public function withdrawals(): HasMany
    {
        return $this->hasMany(AffiliateWithdrawal::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(AffiliateLink::class);
    }

    public function commissions(): HasMany
    {
        return $this->hasMany(Commission::class);
    }
}
