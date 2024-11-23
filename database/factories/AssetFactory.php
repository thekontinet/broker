<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => $this->faker->uuid(),
            'name' => $this->faker->userName(),
            'symbol' => $this->faker->currencyCode(),
            'precision' => 2,
            'type' => $this->faker->randomElement(['crypto', 'stock', 'forex']),
            'active' => $this->faker->boolean(),
            'meta' => [
                'image' => $this->faker->imageUrl(),
                'price' => $this->faker->randomFloat(2, 10, 100),
                'currency' => $this->faker->currencyCode(),
            ]
        ];
    }
}
