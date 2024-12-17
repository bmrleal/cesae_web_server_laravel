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
        /*
        Obtenção da lista de ids de customers já existentes na base de dados.
        Será usada para obter aleatoriamente um que será usado como customer responsável pela order (no campo "customer_id", que é FK para a tabela "customers").
        */
        $customers = Customer::select('id')
            ->get();

        return [
            'customer_id' => fake()->randomElement($customers), // Extracção aleatória de um id da lista de ids de customers.
            'ordered_at' => fake()->dateTimeBetween('-1 month', 'now'), // Geração de data aleatória desde há um mês até agora.
            'item' => fake()->randomNumber(),
            'quantity' => fake()->randomDigit(),
            'amount' => fake()->randomFloat(2, 1, 300), // Geração de float com duas casas decimais, compreendido entre 1 e 300.
            'status' => fake()->randomElement(['unpaid', 'paid', 'processing', 'delivering', 'delivered']), // Selecção aleatória de um dos elementos indicados.
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
