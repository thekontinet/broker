<?php

test('user can view all thier wallet', function () {
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

test('user can deposit into their wallet', function () {
    // arrange
    $user = \App\Models\User::factory()->create();

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('deposit.store'), [
        'currency' => \App\Models\Asset::factory()->create()->id,
        'amount' => 100
    ]);

    // assert
    $response->assertRedirect();
    $this->assertDatabaseHas(\App\Models\Transaction::class, [
        'amount' => 10000,
    ]);
});
