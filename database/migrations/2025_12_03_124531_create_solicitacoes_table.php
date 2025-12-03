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
    Schema::create('solicitacoes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('mentora_id')->constrained('users'); // Quem vai ensinar
        $table->foreignId('aluna_id')->constrained('users');   // Quem pediu
        $table->text('mensagem')->nullable();                  // Uma mensagem inicial
        $table->string('status')->default('pendente');         // pendente, aceito, recusado
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
