<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onUpdate('cascade')->onDelete('cascade'); // Coluna "customer_id", que é Foreign key para a coluna "id" da tabela "customers". O método "constrained" é responsável por validar a utilização das naming conventions.
            $table->datetime('ordered_at');
            $table->unsignedBigInteger('item');
            $table->unsignedSmallInteger('quantity');
            $table->decimal('amount', total: 8, places: 2);
            $table->enum('status', ['unpaid', 'paid', 'processing', 'delivering', 'delivered']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
