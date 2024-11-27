<?php

namespace App\Models;

 use Bavix\Wallet\Traits\HasWallet;
 use Bavix\Wallet\Traits\HasWallets;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
 use Illuminate\Database\Eloquent\Casts\Attribute;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasWallet, HasWallets;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function firstname(): Attribute
    {
        return new Attribute(
            get: fn() => substr($this->name, 0, strpos($this->name, ' '))
        );
    }

    public function lastname(): Attribute
    {
        return new Attribute(
            get: fn() => substr($this->name, strpos($this->name, ' '))
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function stake(Pool $pool)
    {
        return $this->hasOne(Stake::class)->where('pool_id', $pool->id);
    }

    public function stakes()
    {
        return $this->hasMany(Stake::class);
    }
}
