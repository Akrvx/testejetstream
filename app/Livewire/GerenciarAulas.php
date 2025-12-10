<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class GerenciarAulas extends Component
{
    // Array para controlar os inputs de link de vários eventos ao mesmo tempo
    // O índice será o ID do evento: [1 => 'link...', 5 => 'link...']
    public $materialLinks = []; 

    public function mount()
    {
        // 1. Trava de segurança: Apenas Mentoras e Admins podem acessar
        if (Auth::user()->role !== 'mentora' && Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        // 2. Inicializa os inputs com os dados que já existem no banco
        // Isso garante que, se já tiver um link salvo, ele apareça no campo
        $meusEventos = Event::where('user_id', Auth::id())->get();
        
        foreach($meusEventos as $evento) {
            $this->materialLinks[$evento->id] = $evento->material_link;
        }
    }

    public function salvarMaterial($eventoId)
    {
        $evento = Event::find($eventoId);
        
        // Verifica se o evento existe e se pertence à mentora logada (segurança)
        if ($evento && $evento->user_id == Auth::id()) {
            
            // Atualiza no banco
            $evento->update([
                'material_link' => $this->materialLinks[$eventoId] ?? null
            ]);
            
            session()->flash('message', 'Material atualizado com sucesso para: ' . $evento->titulo);
        }
    }

    public function render()
    {
        // Busca eventos criados por MIM, trazendo junto a lista de participantes
        $aulas = Event::with('participantes')
                      ->where('user_id', Auth::id())
                      ->orderByDesc('data_hora')
                      ->get();

        return view('livewire.gerenciar-aulas', [
            'aulas' => $aulas
        ])->layout('layouts.app');
    }
}