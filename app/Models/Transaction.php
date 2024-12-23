<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Transaction extends \Bavix\Wallet\Models\Transaction
{
    public function description(): Attribute
    {
        return new Attribute(
            get: fn () => $this->meta['description'] ?? null
        );
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
