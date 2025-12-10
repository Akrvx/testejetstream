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
        Schema::table('events', function (Blueprint $table) {
        $table->string('material_link')->nullable()->after('local');
        $table->boolean('concluido')->default(false)->after('material_link'); // Para marcar aula dada
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
        $table->dropColumn(['material_link', 'concluido']);
    });
    }
};
