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
    $assets = Asset::factory()->create([
        'name' => config('wallet.wallet.default.name'),
        'symbol' => config('wallet.wallet.default.slug'),
        'active' => true
    ]);
    $pools = Pool::factory(10)->create([
        'asset_id' => $assets->random()->id
    ]);

    $response = $this->actingAs($user)->get(route('stakes.index'));

    $response->assertStatus(200);
    $response->assertSee($pools->pluck('id')->toArray());
});
