<?php

use App\Models\Transaction;

beforeEach(function () {
    /**
     * User trade will be executed with their default wallet.
     * wallet cannot run transaction if asset is inactive,
     * this ensures the default wallet asset is active
     */
    \App\Models\Asset::factory()->create([
        'name' => config('wallet.wallet.default.name'),
        'symbol' => config('wallet.wallet.default.slug'),
        'active' => true
    ]);
});

test('user can view all their wallet', function () {
    // arrange
    $user = \App\Models\User::factory()->create();
    $wallet = \App\Models\Wallet::factory()->for($user, 'holder')->create();
    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use($wallet) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$wallet->asset->uid => 'price_change_percentage_24h']);
        }
    );

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->get(route('wallets.index'));

    // assert
    $response->assertStatus(200);
    $response->assertSee($wallet->name);
});

test('user can view wallet transactions', function () {
    // arrange
    $user = \App\Models\User::factory()->create();
    $wallet = resolve(\App\Services\WalletService::class)->getUserWallet($user);
    $transaction = resolve(\App\Services\WalletService::class)->deposit(100)->execute($user);
    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use($wallet) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$wallet->asset->uid => 'price_change_percentage_24h']);
        }
    );

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->get(route('wallets.show', $wallet));

    // assert
    $response->assertStatus(200);
    $response->assertSee($wallet->name);
    $response->assertSee($transaction->description);
});

test('user can view other wallet transactions', function () {
    // arrange
    $user = \App\Models\User::factory()->create();
    $anotherUser = \App\Models\User::factory()->create();
    $userWallet = resolve(\App\Services\WalletService::class)->getUserWallet($user);
    $anotherUserWallet = resolve(\App\Services\WalletService::class)->getUserWallet($anotherUser);
    $transaction = resolve(\App\Services\WalletService::class)->deposit(100)->execute($anotherUser);
    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use($anotherUserWallet) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$anotherUserWallet->asset->uid => 'price_change_percentage_24h']);
        }
    );

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->get(route('wallets.show', $userWallet));

    // assert
    $response->assertStatus(200);
    $response->assertDontSee($transaction->description);
});
