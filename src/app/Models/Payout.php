<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payout extends Model
{
    protected $fillable = ['user_id', 'amount', 'destination_card', 'status', 'payout_provider_id'];

    protected $casts = ['amount' => 'decimal:2'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
