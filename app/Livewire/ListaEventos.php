<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ListaEventos extends Component
{
    public function participar($eventId)
    {
        $evento = Event::find($eventId);

        if (!$evento) return;
        if ($evento->estaLotado()) return;

        // Adiciona o usuário na lista de participantes
        $evento->participantes()->attach(Auth::id());
        
        session()->flash('success', 'Inscrição confirmada! O evento agora aparecerá em "Meus Cursos".');
    }

    public function sair($eventId)
    {
        $evento = Event::find($eventId);
        if ($evento) {
            $evento->participantes()->detach(Auth::id());
        }
    }

    public function render()
    {
        // ATENÇÃO: Removi o filtro "where data_hora >= now()" para você ver tudo
        $eventos = Event::with('participantes')
            ->orderBy('data_hora', 'desc') // Mostra os eventos mais novos primeiro
            ->get();

        return view('livewire.lista-eventos', ['eventos' => $eventos])
            ->layout('layouts.app');
    }
}