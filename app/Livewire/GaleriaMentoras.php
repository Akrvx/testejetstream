<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class GaleriaMentoras extends Component
{
    public function render()
    {
        // Busca apenas quem tem role = 'mentora'
        $mentoras = User::where('role', 'mentora')->get();

        return view('livewire.galeria-mentoras', [
            'mentoras' => $mentoras
        ])->layout('layouts.app'); // Usa o layout do painel
    }
}