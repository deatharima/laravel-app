<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'billing_cycle', 'price', 'currency', 'fee_percent',
        'min_fee', 'max_venues', 'max_employees_per_venue', 'is_active', 'is_popular', 'features'];

    protected $casts = [
        'price' => 'decimal:2',
        'fee_percent' => 'decimal:2',
        'min_fee' => 'decimal:2',
        'is_active' => 'boolean',
        'is_popular' => 'boolean',
        'features' => 'array'
        ];

    public function venueSubscriptions(): HasMany{
        return $this->hasMany(VenueSubscription::class, 'subscription_plan_id');
    }
}
