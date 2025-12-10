<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitacao;

class MinhaAgenda extends Component
{
    public function render()
    {
        $user = Auth::user();

        // 1. Buscando Eventos Inscritos (Ordenados por data)
        // O withPivot não é estritamente necessário aqui, mas boa prática
        $meusEventos = $user->eventosParticipando()
                            ->where('data_hora', '>=', now())
                            ->orderBy('data_hora', 'asc')
                            ->get();

        // 2. Buscando Mentorias Ativas (Status = aceito)
        $mentoriasAtivas = Solicitacao::with('mentora')
                                      ->where('aluna_id', $user->id)
                                      ->where('status', 'aceito')
                                      ->get();

        return view('livewire.minha-agenda', [
            'eventos' => $meusEventos,
            'mentorias' => $mentoriasAtivas
        ])->layout('layouts.app');
    }
}