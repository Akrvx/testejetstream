<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = 'solicitacoes';
    protected $fillable = ['mentora_id', 'aluna_id', 'mensagem', 'status'];

    // Relação: Uma solicitação pertence a uma Aluna
    public function aluna()
    {
        return $this->belongsTo(User::class, 'aluna_id');
    }

    // Relação: Uma solicitação pertence a uma Mentora
    public function mentora()
    {
        return $this->belongsTo(User::class, 'mentora_id');
    }
}