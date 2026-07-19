<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'venue_id',
        'rating',
        'comment',
    ];

    public function transaction(): BelongsTo{
        return $this->belongsTo(Transaction::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function venue(): BelongsTo{
        return $this->belongsTo(Venue::class);
    }
}
