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
        /*
        Este método define o que deve ser o estado inicial de um novo Customer.
        Neste caso, utiliza-se o Faker para criar dados aleatórios.
        */

        // Começa-se por escolher aleatoriamente o sexo do customer a crir.
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'first_name' => fake()->firstName($gender), // Geração aleatória de primeiro nome (com base no sexo)-
            'last_name' => fake()->lastName(), // Geração aleatória de apelido.
            'gender' => strtoupper(substr($gender, 0, 1)), // Extracção da primeira letra do sexo (calculado anteriormente), para registar na bd apenas como "M" ou "F".
            'email' => fake()->unique()->safeEmail(), // Geração aleatória de e-mail válido, com a restrição de ainda não dever existir na bd (método unique).
            'address' => fake()->address(),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'telephone' => fake()->phoneNumber(),
            'created_at' => now(), // Criação do registo com timestamp "created_at" no momento actual.
            'updated_at' => null
        ];
    }
}
