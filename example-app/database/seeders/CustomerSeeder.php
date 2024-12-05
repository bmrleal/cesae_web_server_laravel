<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('customers')->insert([
        //     "first_name" => "Miquelina",
        //     "last_name" => "Silva",
        //     "gender" => "F",
        //     "email" => "miq.silva@dominio.com",
        //     "address" => "Rua das Flores, n.º 1",
        //     "postal_code" => "9999-999",
        //     "city" => "Vila Nova do Pinhal",
        //     "country" => "Portugal",
        //     "telephone" => "+351900000000",
        //     "created_at" => date("Y/m/d h:m:s")
        // ]);

        Customer::factory()
            ->count(50)
            ->create();
    }
}
