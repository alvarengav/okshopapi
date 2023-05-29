<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(12),
            'regular_price' => fake()->numberBetween(100, 200),
            'sale_price' => fake()->numberBetween(100, 200),
            'quantity' => fake()->numberBetween(0, 100),
        ];
    }
}
