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
    Schema::create('stories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained(); // Quem escreveu (Admin/Mentora)
        $table->string('titulo');
        $table->string('subtitulo')->nullable(); // Um resumo curto
        $table->text('conteudo'); // O texto completo
        $table->string('imagem_capa')->nullable(); // Caminho da foto
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
