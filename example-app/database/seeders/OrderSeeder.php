<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilização da CustomerFactory para gerar 80 customers aleatoriamente.
        Order::factory()
            ->count(80)
            ->create();
    }
}