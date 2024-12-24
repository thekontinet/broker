<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    /** @use HasFactory<\Database\Factories\TradersFactory> */
    use HasFactory;

    protected $guarded = [];

    public function image(): Attribute
    {
        return new Attribute(
            get: fn ($value) => '/storage/'.$value
        );
    }

    public function winRate(): Attribute
    {
        return new Attribute(
            get: fn () => intval($this->wins / ($this->losses + $this->wins) * 100)
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
