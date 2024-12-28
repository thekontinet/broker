<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    /** @use HasFactory<\Database\Factories\PoolFactory> */
    use HasFactory;

    const CREATED_AT = 'start_date';

    const UPDATED_AT = null;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'meta' => 'json',
    ];

    public function image(): Attribute
    {
        return new Attribute(
            get: fn () => $this->meta['image'] ?? null
        );
    }

    public function getMeta($key, $default = null)
    {
        return $this->meta[$key] ?? $default;
    }

    public function isStakable()
    {
        return $this->start_date->isPast() && ! $this->end_date->isPast();
    }

    public function hasEnded()
    {
        return $this->end_date->isPast();
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function stakes()
    {
        return $this->hasMany(Stake::class);
    }
}
