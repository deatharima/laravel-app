<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeRequest extends Model
{
    protected $fillable = ['user_id', 'venue_id', 'status', 'message', 'reviewed_by',
        'reviewed_at', 'rejection_reason'];

    protected $casts = ['reviewed_at' => 'datetime'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function venue(): BelongsTo{
        return $this->belongsTo(Venue::class);
    }

    public function reviewer(): BelongsTo{
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
