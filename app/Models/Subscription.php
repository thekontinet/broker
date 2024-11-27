<?php

namespace App\Models;

use Bavix\Wallet\Traits\HasWallet;
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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
