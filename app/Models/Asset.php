<?php

namespace App\Models;

use App\Enums\AssetTypeEnum;
use App\Models\Concerns\HasMarketData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetFactory> */
    use HasFactory, HasMarketData;

    protected $guarded = [];

    protected function casts()
    {
        return [
            'type' => AssetTypeEnum::class,
            'meta' => 'json',
            'active' => 'boolean',
        ];
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->resolveRouteBindingQuery($this, $value, $field)
            ->where('active', true)
            ->firstOrFail();
    }

    public function canRecieveDeposit()
    {
        $symbol = strtoupper($this->symbol);

        return config("money.currencies.$symbol") ? true : false;
    }

    public function image(): Attribute
    {
        return new Attribute(
            get: fn () => $this->meta['image']
        );
    }

    public function address(): Attribute
    {
        return new Attribute(
            get: fn () => $this->meta['wallet_address'] ?? null
        );
    }

    public function getTradeSymbol()
    {
        return 'BINANCE:'.strtoupper($this->symbol).'USDT';
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    public function scopeFundable(Builder $query)
    {
        return $query->whereNotNull('meta->wallet_address');
    }

    public function pool()
    {
        return $this->hasMany(Pool::class);
    }
}
