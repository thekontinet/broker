<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pool>
 */
class PoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asset_id' => fake()->uuid(),
            'name' => fake()->firstName(),
            'min_amount' => 100,
            'apr' => 10,
            'start_date' => now(),
            'end_date' => now()->addDay(),
            'meta' => [],
        ];
    }
}
