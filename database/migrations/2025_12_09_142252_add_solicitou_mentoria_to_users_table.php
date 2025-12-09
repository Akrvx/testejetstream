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
      Schema::table('users', function (Blueprint $table) {
        // Cria uma coluna booleana (verdadeiro/falso)
        // Default false = Ninguém pediu nada ainda
        $table->boolean('solicitou_mentoria')->default(false)->after('role');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('solicitou_mentoria');
    });
}
};
