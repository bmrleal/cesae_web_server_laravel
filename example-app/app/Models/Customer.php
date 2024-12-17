<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Indicação de que pode ser usada factory para criação (nomeadamente, no seeding) de novas instâncias da classe Customer.
    use HasFactory;

    // Definição de relação one-to-many entre Customer e Order.
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
