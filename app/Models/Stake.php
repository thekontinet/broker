<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stake extends Model
{
    /** @use HasFactory<\Database\Factories\UserPoolFactory> */
    use HasFactory;

    protected $guarded = [];

    public function profit(): Attribute
    {
        return new Attribute(
            get: fn() => $this->amount + $this->amount * ($this->pool->profit_percent / 100),
        );
    }

    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }
}
