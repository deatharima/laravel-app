<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser{

    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'country', 'city', 'contact_phone', 'dob',
        'gender', 'avatar', 'role', 'balance', 'personal_slug', 'is_active'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime', 'password' => 'hashed', 'balance' => 'decimal:2',
            'dob' => 'date', 'is_active' => 'boolean', 'role' => 'string'];
    }

    public function canAccessPanel(Panel $panel): bool{
        return in_array($this->role, ['manager', 'admin']);
    }
    public function venues(): BelongsToMany{
        return $this->belongsToMany(Venue::class, 'venue_user')
            ->withPivot('status', 'approved_at', 'rejected_at', 'rejection_reason')
            ->withTimestamps();
    }
    public function approvedVenues(): BelongsToMany{
        return $this->venues()->wherePivot('status', 'approved');
    }
    public function pendingVenues(): BelongsToMany{
        return $this->venues()->wherePivot('status', 'pending');
    }
    public function transactions(): HasMany{
        return $this->hasMany(Transaction::class);
    }
    public function payouts(): HasMany{
        return $this->hasMany(Payout::class);
    }
    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function employeeRequests(): HasMany{
        return $this->hasMany(EmployeeRequest::class);
    }

    public function reviewedRequests(): HasMany{
        return $this->hasMany(EmployeeRequest::class, 'reviewed_by');
    }

}
