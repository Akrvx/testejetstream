<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // Define os campos que podem ser gravados
    protected $fillable = [
        'user_id',
        'titulo',
        'subtitulo',
        'conteudo',
        'imagem_capa'
    ];

    // Relação: Uma história pertence a quem escreveu
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}