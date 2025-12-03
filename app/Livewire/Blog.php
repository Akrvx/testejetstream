<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;

class Blog extends Component
{
    public function render()
    {
        // Pega todas as histórias, da mais nova para a mais antiga
        $historias = Story::with('autor')->orderBy('created_at', 'desc')->get();

        return view('livewire.blog', [
            'historias' => $historias
        ])->layout('layouts.app');
    }
}