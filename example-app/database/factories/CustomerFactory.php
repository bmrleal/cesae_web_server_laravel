<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName(),
            'gender' => strtoupper(substr($gender, 0, 1)),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'telephone' => fake()->phoneNumber(),
            'created_at' => now(),
            'updated_at' => null
        ];
    }
}
