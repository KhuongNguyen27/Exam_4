<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => fake()->name,
            'isbn' => random_int(8, PHP_INT_MAX),
            'author_id' => fake()->numberBetween($min = 1, $max = 5),
            'category_id' => fake()->numberBetween($min = 1, $max = 5),
            'page' => rand(100,200),
            'year' => fake()->numberBetween($min = 1990, $max = 2022),
        ];
    }
}
