<?php

namespace App\Models;

use App\Enums\AssetTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetFactory> */
    use HasFactory;

    protected $guarded = [];

    protected function casts()
    {
        return [
            'type' => AssetTypeEnum::class,
            'meta' => 'json',
            'active' => 'boolean',
        ];
    }

    public function image(): Attribute
    {
        return new Attribute(
            get: fn () => $this->meta['image']
        );
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    public function pool(){
        return $this->hasMany(Pool::class);
    }
}
