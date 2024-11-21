<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
    ];

    public function endDate(): Attribute
    {
        return new Attribute(
            get: fn () => $this->start_date->addDays($this->duration)
        );
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class)->where('active', true);
    }
}
