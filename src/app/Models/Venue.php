<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'phone',
        'logo_path',
        'cover_path',
        'fee_percent'
    ];
}
