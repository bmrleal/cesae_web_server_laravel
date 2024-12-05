<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Customer;

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
        $customers = Customer::select('id')
            ->get();

        return [
            'customer_id' => fake()->randomElement($customers),
            'ordered_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'item' => fake()->randomNumber(),
            'quantity' => fake()->randomDigit(),
            'amount' => fake()->randomFloat(2, 1, 300),
            'status' => fake()->randomElement(['unpaid', 'paid', 'processing', 'delivering', 'delivered']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
