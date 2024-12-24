<?php

test('it can see list of plans', function () {
    $plans = \App\Models\Plan::factory(5)->create();

    \Pest\Laravel\actingAs(\App\Models\User::factory()->create());
    $response = \Pest\Laravel\get(route('plans.index'));

    $response->assertStatus(200);
    $response->assertSeeInOrder($plans->pluck('name')->toArray());
});

test('it can subscribe to plan', function () {
    $plan = \App\Models\Plan::factory()->create([
        'min_amount' => 50,
    ]);
    \Pest\Laravel\actingAs($user = \App\Models\User::factory()->create());

    $this->instance(\App\Services\WalletService::class, Mockery::mock(\App\Services\WalletService::class, function ($mock) {
        $mock->shouldReceive('withdraw')->once()->andReturn($mock);
        $mock->shouldReceive('description')->once()->andReturn($mock);
        $mock->shouldReceive('execute')->once();
    }));

    $response = \Pest\Laravel\post(route('subscriptions.store'), [
        'plan_id' => $plan->id,
        'amount' => 100,
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas(\App\Models\Subscription::class, [
        'plan_id' => $plan->id,
        'user_id' => $user->id,
    ]);
    $this->assertEquals(100, $user->subscription->wallet->balance);
});

test('it can withdraw subscription', function () {
    $subscription = \App\Models\Subscription::factory()->create([
        'profit' => 10,
    ]);
    $subscription->wallet->deposit(100);
    $user = $subscription->user;
    \Pest\Laravel\actingAs($user);

    $this->instance(\App\Services\WalletService::class, Mockery::mock(\App\Services\WalletService::class, function ($mock) {
        $mock->shouldReceive('deposit')->once()->with(110)->andReturn($mock);
        $mock->shouldReceive('description')->once()->andReturn($mock);
        $mock->shouldReceive('execute')->once();
    }));

    $response = \Pest\Laravel\delete(route('subscriptions.destroy', $subscription));

    $response->assertRedirect();
    $this->assertModelMissing($subscription);
});

test('it cannot withdraw if subscription has not ended', function () {
    $subscription = \App\Models\Subscription::factory()->create([
        'profit' => 10,
        'end_date' => now()->addDay(),
    ]);
    $user = $subscription->user;
    \Pest\Laravel\actingAs($user);

    $response = \Pest\Laravel\delete(route('subscriptions.destroy', $subscription));

    $response->assertSessionHas('error');
    $this->assertModelExists($subscription);
});
