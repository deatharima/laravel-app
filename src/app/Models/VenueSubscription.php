<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VenueSubscription extends Model
{
    protected $fillable = ['venue_id', 'subscription_plan_id', 'status', 'trial_ends_at', 'starts_at',
        'ends_at', 'cancelled_at', 'payment_provider', 'provider_subscription_id'];

    protected $casts = ['trial_ends_at' => 'datetime',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'cancelled_at' => 'datetime',];

    public function venue(): BelongsTo{
        return $this->belongsTo(Venue::class);
    }

    public function subscriptionPlan(): BelongsTo{
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }

    public function isActive(): bool{
        return $this->status === 'active' || ($this->status === 'trial' && $this->trial_ends_at && $this->trial_ends_at->isFuture());
    }
}
