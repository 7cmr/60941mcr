<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trip extends Model
{
    use HasFactory;

    public function cargos(): HasMany
    {
        return $this->hasMany(Cargo::class);
    }

    public function routes(): BelongsTo
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }

    public function transports(): BelongsTo
    {
        return $this->belongsTo(Transport::class, 'transport_id', 'id');
    }
    protected $fillable = [
        'start',
        // другие поля, которые вы хотите разрешить для массового присвоения
    ];
}

