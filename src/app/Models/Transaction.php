<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];
}
