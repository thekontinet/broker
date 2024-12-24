<?php

beforeEach(function () {
    /**
     * User trade will be executed with their default wallet.
     * wallet cannot run transaction if asset is inactive,
     * this ensures the default wallet asset is active
     */
    \App\Models\Asset::factory()->create([
        'name' => config('wallet.wallet.default.name'),
        'symbol' => config('wallet.wallet.default.slug'),
        'active' => true,
    ]);
});

test('users can trade active', function () {
    $enabledAsset = \App\Models\Asset::factory()->create(['active' => true, 'type' => 'crypto']);
    $user = \App\Models\User::factory()->create();
    $user->wallet->depositFloat(100);

    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use ($enabledAsset) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$enabledAsset->uid => 'price_change_percentage_24h']);
        }
    );

    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('orders.store', [
        'asset_id' => $enabledAsset->id,
        'type' => 'sell',
        'trade' => 'market',
        'amount' => '10',
    ]));

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    $this->assertDatabaseHas(\App\Models\Order::class);
});

test('users balance is debited after executing trade', function () {
    $enabledAsset = \App\Models\Asset::factory()->create(['active' => true, 'type' => 'crypto']);
    $user = \App\Models\User::factory()->create();
    $user->wallet->depositFloat(100);

    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use ($enabledAsset) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$enabledAsset->uid => 'price_change_percentage_24h']);
        }
    );

    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('orders.store', [
        'asset_id' => $enabledAsset->id,
        'type' => 'sell',
        'trade' => 'market',
        'amount' => '10',
    ]));

    $this->assertEquals($user->wallet->balanceFloat, 90);
});

test('users cannot trade inactive assets', function () {
    $disabledAsset = \App\Models\Asset::factory()->create(['active' => false, 'type' => 'crypto']);

    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use ($disabledAsset) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$disabledAsset->uid => 'price_change_percentage_24h']);
        }
    );

    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs(\App\Models\User::factory()->create())->post(route('orders.store', [
        'asset_id' => $disabledAsset->id,
        'type' => 'sell',
        'trade' => 'market',
        'amount' => '10',
    ]));

    $response->assertRedirect();
    $response->assertSessionHasErrors(['asset_id']);
});
