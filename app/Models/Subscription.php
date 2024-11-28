<?php

namespace App\Models;

use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model implements \Bavix\Wallet\Interfaces\Wallet
{
    /** @use HasFactory<\Database\Factories\SubscriptionFactory> */
    use HasFactory, HasWallet;

    protected $guarded = [];

    protected $casts = [
        'strength' => 'integer',
        'profit' => 'integer',
        'end_date' => 'date',
    ];

    public function total(): Attribute
    {
        return new Attribute(
            get: fn () => $this->wallet->balance_int + $this->profit
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
