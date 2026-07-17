<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'venue_id',
        'rating',
        'comment',
    ];
}
