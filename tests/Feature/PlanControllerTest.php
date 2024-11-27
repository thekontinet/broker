<?php

use App\Models\Plan;
use App\Models\User;

test('can access plans page', function () {
    $user = User::factory()->create();
    $plans = Plan::factory(10)->create();

    $response = $this->actingAs($user)->get(route('plans.index'));

    $response->assertStatus(200);
    $response->assertSee($plans->pluck('id')->toArray());
});

test('can subscribe to a plan', function () {
    \App\Models\Asset::factory()->create([
        'name' => config('wallet.wallet.default.name'),
        'symbol' => config('wallet.wallet.default.slug'),
        'active' => true
    ]);
    $user = User::factory()->create();
    $user->wallet->depositFloat(100);
    $plan = Plan::factory()->create();

    $data = [
        "amount" => '100',
        "user_id" => $user->id,
        "plan_id" => $plan->id
    ];

    $response = $this->actingAs($user)->post(route('plans.store'), $data);

    $response->assertStatus(302);
    $this->assertDatabaseHas('subscriptions', [
        'user_id' => $user->id,
        'plan_id' => $plan->id,
        'amount' => $data['amount']
    ]);
});
