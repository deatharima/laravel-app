<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'service_fee',
        'payout_amount',
        'venue_id',
        'user_id',
        'status',
        'payment_provider',
        'payment_id',
        'device_uuid'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'service_fee' => 'decimal:2',
        'payout_amount' => 'decimal:2'];

    public function venue(): BelongsTo{
        return $this->belongsTo(Venue::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

}
