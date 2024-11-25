<?php

namespace App\Services;

use App\Exceptions\TransactionError;
use App\Models\Asset;
use App\Models\User;
use App\Models\Wallet;
use Bavix\Wallet\Internal\Exceptions\ExceptionInterface;
use Illuminate\Support\Facades\Auth;

class WalletService
{
    private string $currency;
    private string $type;
    private ?string $description = null;
    private int | float $amount = 0;
    private bool $confirmed = true;
    private array $meta = [];
    private array $reservedKeys = [
        'description',
        'currency',
    ];


    public function execute(User $user)
    {
        try {
            $asset = Asset::query()->active()->where('symbol', $this->currency)->first();

            if (!$asset) throw new \Exception("$this->currency is not supported for $this->type");

            $wallet = $this->getUserWallet($user, $this->currency);

            $description = match ($this->description) {
                null => ucfirst($this->type),
                default => $this->description,
            };

            $meta = [
                'description' => $description,
                ...$this->meta
            ];

            return match ($this->type) {
                'deposit' => $wallet->depositFloat($this->amount, $meta, $this->confirmed),
                'withdraw' => $wallet->withdrawFloat($this->amount, $meta, $this->confirmed),
                default => throw new \Exception('invalid transaction type')
            };
        }catch (\Exception|ExceptionInterface $exception){
            throw new TransactionError('Transaction error: ' . $exception->getMessage());
        }
    }

    public function deposit(float | string | int $amount, string $currency = null)
    {
        if(!is_numeric($amount)) throw new TransactionError('Transaction error: invalid amount specified');
        $this->type = 'deposit';
        $this->amount = $amount;
        $this->currency = $currency ?? config('wallet.wallet.default.meta.currency');
        return $this;
    }

    public function withdraw(float $amount, string $currency = null)
    {
        if(!is_numeric($amount)) throw new TransactionError('Transaction error: invalid amount specified');
        $this->type = 'withdraw';
        $this->amount = $amount;
        $this->currency = $currency ?? config('wallet.wallet.default.meta.currency');
        return $this;
    }

    public function confirmed(bool $confirmed = true)
    {
        $this->confirmed = $confirmed;
        return $this;
    }

    public function with(string $key, mixed $value)
    {
        if(in_array($key, $this->reservedKeys)) return $this;

        $this->meta[$key] = $value;

        return $this;
    }

    public function description(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getUserWallet(User $user, ?string $currency = null)
    {
        $currency = $currency ?? config('wallet.wallet.default.meta.currency');
        $asset = Asset::query()->where('symbol', $currency)->firstOrFail();

        if(!$user->hasWallet($currency)){
            $wallet = $user->createWallet([
                'name' => $asset->name,
                'slug' => $asset->symbol,
                'decimal_places' => $asset->precision,
                'meta' => ['currency' => $asset->symbol],
            ]);
            return Wallet::query()->find($wallet->id);
        }

        $wallet = $user->getWallet($currency);
        return Wallet::query()->find($wallet->id);
    }
}
