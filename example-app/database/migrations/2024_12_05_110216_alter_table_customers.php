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
        // Adição de nova coluna "comments" à tabela "customers".
        Schema::table('customers', function (Blueprint $table) {
            $table->text('comments')->nullable()->after('telephone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reversão da adição de nova coluna "comments" à tabela "customers" = eliminação da coluna.
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('comments');
        });
    }
};
