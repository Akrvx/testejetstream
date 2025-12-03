<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;

class MinhasCandidaturas extends Component
{
    public function render()
    {
        // Busca solicitações onde EU sou a aluna
        // Traz os dados da 'mentora' para mostrarmos o nome dela
        $candidaturas = Solicitacao::with('mentora')
            ->where('aluna_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.minhas-candidaturas', [
            'candidaturas' => $candidaturas
        ])->layout('layouts.app');
    }
}