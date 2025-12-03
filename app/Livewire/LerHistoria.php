<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;

class LerHistoria extends Component
{
    public Story $historia;

    public function mount($id)
    {
        // Busca a história ou dá erro 404 se não achar
        // 'autor' vem junto para mostrarmos o nome de quem escreveu
        $this->historia = Story::with('autor')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.ler-historia')->layout('layouts.app');
    }
}