<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;
    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
    public function transports(): BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'trips');
    }
}
