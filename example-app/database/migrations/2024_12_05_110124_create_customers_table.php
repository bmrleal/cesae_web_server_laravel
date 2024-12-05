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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', length: 20);
            $table->string('last_name', length: 20);
            $table->char('gender', length: 1);
            $table->string('email')->unique();
            $table->string('address');
            $table->string('postal_code', length: 20);
            $table->string('city', length: 100);
            $table->string('country', length: 50);
            $table->string('telephone', length: 20)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
