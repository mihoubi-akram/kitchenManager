<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'desired_delivery_date' => $this->faker->date(),
            'number' => $this->faker->randomNumber(),
            'fee_per_weight' => $this->faker->randomFloat(2, 0, 100),
            'fee_per_km' => $this->faker->randomFloat(2, 0, 50),
            'fee_per_stop' => $this->faker->randomFloat(2, 0, 20),
            'fee_per_delivery' => $this->faker->randomFloat(2, 0, 30),
            'delivered_at' => null,
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'address' => $this->faker->address(),
        ];
    }
}
