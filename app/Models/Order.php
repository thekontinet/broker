<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $guarded = [];

    protected function casts()
    {
        return [
            'price' => 'decimal:8',
            'quantity' => 'decimal:8',
            'status' => OrderStatus::class,
        ];
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', OrderStatus::COMPLETED);
    }

    public function scopeRunning(Builder $query): Builder
    {
        return $query->whereNot('status', OrderStatus::COMPLETED);
    }

    public function isBuy()
    {
        return $this->type === 'buy';
    }

    public function profitAndLossPrice(): Attribute
    {
        return new Attribute(
            get: fn () => number_format(($this->asset->price - $this->price) * $this->quantity, 2)
        );
    }

    public function profitAndLossPercentage(): Attribute
    {
        return new Attribute(
            get: fn () => number_format((($this->asset->price - $this->price) / $this->price) * 100, 2)
        );
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
