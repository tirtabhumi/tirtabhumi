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
        'referral_code',
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
        'total_points',
        'withdrawn_points',
        'pending_points',
    ];

    protected $casts = [
        'total_earnings' => 'decimal:2',
        'withdrawn_earnings' => 'decimal:2',
        'pending_earnings' => 'decimal:2',
        'total_points' => 'decimal:2',
        'withdrawn_points' => 'decimal:2',
        'pending_points' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        // Auto-generate referral code when creating new affiliate
        static::creating(function ($affiliate) {
            if (!$affiliate->referral_code) {
                $affiliate->referral_code = static::generateUniqueReferralCode();
            }
        });
    }

    /**
     * Generate a unique 5-character referral code
     */
    protected static function generateUniqueReferralCode(): string
    {
        do {
            // Generate 5 random uppercase alphanumeric characters
            $code = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5));
        } while (static::where('referral_code', $code)->exists());

        return $code;
    }

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
