<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends \Bavix\Wallet\Models\Wallet
{
    use HasFactory;

    public function balanceUSD(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($this->asset->price * ($this->balance / 10 ** $this->decimal_places))
        );
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'slug', 'symbol');
    }
}
