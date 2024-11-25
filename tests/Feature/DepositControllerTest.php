<?php

use App\Models\Transaction;

test('user can deposit into their wallet', function () {
    // arrange
    $user = \App\Models\User::factory()->create();

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('deposit.store'), [
        'currency' => \App\Models\Asset::factory()->create(['active' => true])->symbol,
        'amount' => 100
    ]);

    // assert
    $response->assertRedirect();
    $this->assertDatabaseHas(Transaction::class, [
        'amount' => 10000,
    ]);
});

test('user deposit has description', function () {
    // arrange
    $user = \App\Models\User::factory()->create();

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('deposit.store'), [
        'currency' => \App\Models\Asset::factory()->create(['active' => true])->symbol,
        'amount' => 100
    ]);

    // assert
    $response->assertRedirect();
    $this->assertTrue(strlen(Transaction::first()->description) > 0);
});

test('user cannot deposit into wallet with inactive currency state', function () {
    // arrange
    $user = \App\Models\User::factory()->create();

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('deposit.store'), [
        'currency' => \App\Models\Asset::factory()->create(['active' => false])->symbol,
        'amount' => 100
    ]);

    // assert
    $response->assertSessionHasErrors(['currency']);
});

test('user cannot deposit into wallet with no address', function () {
    // arrange
    $user = \App\Models\User::factory()->create();

    // act
    /** @var \Illuminate\Testing\TestResponse $response */
    $response = $this->actingAs($user)->post(route('deposit.store'), [
        'currency' => \App\Models\Asset::factory()->create(['active' => true, 'meta' => ['wallet_address' => null]])->symbol,
        'amount' => 100
    ]);

    // assert
    $response->assertSessionHasErrors(['currency']);
});
