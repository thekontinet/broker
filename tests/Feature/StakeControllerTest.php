<?php

use App\Models\Asset;
use App\Models\Pool;
use App\Models\User;

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

test('can access staking pool page', function () {
    $user = User::factory()->create();
    $asset = Asset::factory()->create([
        'name' => config('wallet.wallet.default.name'),
        'symbol' => config('wallet.wallet.default.slug'),
        'active' => true
    ]);
    $pools = Pool::factory(10)->create([
        'asset_id' => $asset->id
    ]);

    $response = $this->actingAs($user)->get(route('pools.index'));

    $response->assertStatus(200);
    $response->assertSee($pools->pluck('id')->toArray());
});

test('can stake pool', function () {
    $user = User::factory()->create();
    $asset = Asset::factory()->create([
        'name' => config('wallet.wallet.default.name'),
        'symbol' => config('wallet.wallet.default.slug'),
        'active' => true
    ]);
    $pool = Pool::factory()->create([
        'asset_id' => $asset->id
    ]);

    app(\App\Services\WalletService::class)->deposit(1000)->execute($user);

    $response = \Pest\Laravel\actingAs($user)->post(route('stakes.store',[
        'pool_id' => $pool->id,
        'amount' => 500
    ]));

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    $this->assertEquals($user->wallet->balanceFloat, 500);
});

test('can withdraw stake', function () {

})->todo();
