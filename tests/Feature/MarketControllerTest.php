<?php

use Illuminate\Support\Facades\Http;


test('user can only view enabled assets', function () {
    $enabledAsset = \App\Models\Asset::factory()->create(['active' => true, 'type' => 'crypto']);
    $disabledAsset = \App\Models\Asset::factory()->create(['active' => false, 'type' => 'crypto']);

    $this->mock(
        \App\Services\MarketData\MarketDataService::class,
        function (\Mockery\MockInterface $mock) use($enabledAsset) {
            $mock->shouldReceive('getPrice')->andReturn(100);
            $mock->shouldReceive('getMarketInfo')->andReturn([$enabledAsset->uid => 'price_change_percentage_24h']);
        }
    );

    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs(\App\Models\User::factory()->create())->get(route('markets.index', 'crypto'));

    $response->assertStatus(200);
    $response->assertSee($enabledAsset->name);
    $response->assertDontSee($disabledAsset->name);
});

test('user cannot view disabled asset market', function () {
    $disabledAsset = \App\Models\Asset::factory()->create(['active' => false, 'type' => 'crypto']);

    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs(\App\Models\User::factory()->create())->get(route('markets.show', $disabledAsset));

    $response->assertNotFound();
});

