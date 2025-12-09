<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class GaleriaMentoras extends Component
{
    // Variáveis que guardam o estado dos filtros
    public $search = '';
    public $filtroArea = '';
    public $filtroNivel = '';

    // Resetar a paginação se usar (opcional, mas boa prática)
    public function updatedSearch() { $this->resetPage(); }

    public function limparFiltros()
    {
        $this->reset(['search', 'filtroArea', 'filtroNivel']);
    }

    public function render()
    {
        // 1. Pega todas as áreas únicas que existem no banco para montar o <select>
        $areasDisponiveis = User::where('role', 'mentora')
            ->whereNotNull('area_atuacao')
            ->distinct()
            ->orderBy('area_atuacao')
            ->pluck('area_atuacao');

        // 2. Constrói a consulta com os filtros aplicados
        $mentoras = User::where('role', 'mentora')
            ->when($this->search, function ($query) {
                // Busca por nome OU bio (agrupa num AND (A ou B))
                $query->where(function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%')
                             ->orWhere('bio', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filtroArea, function ($query) {
                $query->where('area_atuacao', $this->filtroArea);
            })
            ->when($this->filtroNivel, function ($query) {
                $query->where('nivel_experiencia', $this->filtroNivel);
            })
            ->get(); // Se tiver muitas, pode trocar ->get() por ->paginate(9)

        return view('livewire.galeria-mentoras', [
            'mentoras' => $mentoras,
            'areasDisponiveis' => $areasDisponiveis,
        ])->layout('layouts.app');
    }
}