<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;

class MinhasSolicitacoes extends Component
{
    // Ações dos botões
    public function aceitar($id)
    {
        $solicitacao = Solicitacao::find($id);
        
        // Segurança: Só a dona pode mexer
        if ($solicitacao && $solicitacao->mentora_id == Auth::id()) {
            $solicitacao->update(['status' => 'aceito']);
        }
    }

    public function recusar($id)
    {
        $solicitacao = Solicitacao::find($id);
        
        if ($solicitacao && $solicitacao->mentora_id == Auth::id()) {
            $solicitacao->update(['status' => 'recusado']);
        }
    }

    public function render()
    {
        // Busca as solicitações onde EU sou a mentora
        // O 'with' traz os dados da aluna junto para não fazer mil consultas
        $solicitacoes = Solicitacao::with('aluna')
            ->where('mentora_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.minhas-solicitacoes', [
            'solicitacoes' => $solicitacoes
        ])->layout('layouts.app');
    }
}
