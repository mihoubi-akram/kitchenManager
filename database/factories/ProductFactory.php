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
            'name' => $this->faker->randomElement(['Apple', 'Banana', 'Carrot', 'Tomato']),
            'brand' => $this->faker->randomElement(['BrandA', 'BrandB', 'BrandC', 'BrandD']),
            'category' => $this->faker->randomElement(['Fruit', 'Vegetable', 'Dairy', 'Meat']),
            'store_name' => $this->faker->company(),
            'type' => $this->faker->randomElement(['unit', 'pack']),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_of_measure' => $this->faker->randomElement(['KG', 'L', 'pcs']),
            'unit_quantity' => $this->faker->randomFloat(2, 0.1, 10),
        ];
    }
}
