<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Indicação de que pode ser usada factory para criação (nomeadamente, no seeding) de novas instâncias da classe Order.
    use HasFactory;

    // Definição de relação one-to-many entre Customer e Order.
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
