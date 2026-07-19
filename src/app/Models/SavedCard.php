<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedCard extends Model
{
    protected $fillable = ['device_uuid', 'card_last4', 'card_brand', 'payment_provider_token', 'is_default'];

    protected $casts = ['is_default' => 'boolean'];
}
