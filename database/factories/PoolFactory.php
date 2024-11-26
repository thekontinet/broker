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
            'duration' => fake()->randomDigitNotZero(),
            'start_date' => fake()->date(),
            'description' => fake()->sentence(),
            'active' => fake()->boolean(),
        ];
    }
}
