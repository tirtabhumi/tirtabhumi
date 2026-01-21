<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WithdrawalRequest extends Model
{
    use HasFactory;
    protected static function booted()
    {
        static::created(function ($record) {
            $wallet = Wallet::firstOrCreate(['user_id' => $record->user_id]);
            
            // Decrement balance
            $wallet->decrement('balance', $record->amount);
            
            // Create transaction
            \App\Models\WalletTransaction::create([
                'wallet_id' => $wallet->id,
                'type' => 'debit',
                'amount' => $record->amount,
                'description' => 'Withdrawal Request Created',
                'source_type' => get_class($record),
                'source_id' => $record->id,
            ]);

            // Create history
            \App\Models\WithdrawalRequestHistory::create([
                'withdrawal_request_id' => $record->id,
                'user_id' => $record->user_id, // Usually the requester
                'action' => 'created',
                'description' => $record->user->name . " requested withdrawal",
            ]);

            // Notify admins
            try {
                $admins = \App\Models\User::role(['super_admin', 'admin', 'finance'])->get();
                foreach ($admins as $admin) {
                    \Illuminate\Support\Facades\Mail::to($admin->email)
                        ->send(new \App\Mail\WithdrawalRequestedAdminMail($record));
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Failed to send withdrawal notification: " . $e->getMessage());
            }
        });
    }

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'bank_details',
        'admin_note',
        'proof_of_transfer',
        'processed_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function processor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function histories()
    {
        return $this->hasMany(WithdrawalRequestHistory::class);
    }
}
