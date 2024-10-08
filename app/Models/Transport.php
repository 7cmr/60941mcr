<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transport extends Model
{
    use HasFactory;
    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class, 'trips')
            ->withPivot(['start', 'finish']);
    }
}
