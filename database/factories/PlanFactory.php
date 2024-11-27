<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->userName(),
            "duration" => fake()->randomNumber(0),
            "min_amount" => fake()->randomNumber(),
            "rio" => fake()->randomNumber(),
            "meta" => []
        ];
    }
}
