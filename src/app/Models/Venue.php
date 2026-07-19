<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model{

    protected $fillable = ['name', 'slug', 'description', 'address', 'phone',
        'logo_path', 'cover_path', 'fee_percent'];

    protected $casts = ['fee_percent' => 'decimal:2'];
    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'venue_user')
        ->withPivot('status', 'approved_at', 'rejected_at', 'rejection_reason')
        ->withTimestamps();
    }

    public function approvedUsers(): BelongsToMany{
        return $this->users()->wherePivot('status', 'approved');
    }

    public function pendingUsers(): BelongsToMany{
        return $this->users()->wherePivot('status', 'pending');
    }
    public function transactions(): HasMany{
        return $this->hasMany(Transaction::class);
    }
    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function employeeRequests(): HasMany{
        return $this->hasMany(EmployeeRequest::class);
    }
    public function subscription(): BelongsTo{
        return $this->belongsTo(VenueSubscription::class);
    }
}
