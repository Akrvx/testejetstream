<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 
        'titulo', 
        'descricao', 
        'data_hora', 
        'data_fim', // <--- Novo campo
        'local', 
        'limite_vagas',
        'material_link',
        'concluido'
    ];

    protected $casts = [
        'data_hora' => 'datetime',
        'data_fim' => 'datetime', // <--- Novo cast
    ];

    public function criador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participantes()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }
    
    public function estaLotado()
    {
        if ($this->limite_vagas == 0) return false;
        return $this->participantes()->count() >= $this->limite_vagas;
    }
}