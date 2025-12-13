<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Necessário para download
use App\Models\Event;

class MeusCursos extends Component
{
    // Função para resolver o erro 403 no download
    public function baixarMaterial($aulaId)
    {
        $aula = Event::find($aulaId);

        if ($aula && $aula->material_link) {
            // Se for link externo (Drive/Youtube), redireciona
            if (strpos($aula->material_link, 'http') === 0 && strpos($aula->material_link, '/storage/') === false) {
                return redirect()->away($aula->material_link);
            }

            // Se for arquivo local (no storage), faz o download forçado pelo PHP
            $path = str_replace('/storage/', '', parse_url($aula->material_link, PHP_URL_PATH));
            
            if (Storage::disk('public')->exists($path)) {
                return Storage::disk('public')->download($path);
            } else {
                return redirect()->away($aula->material_link);
            }
        }
    }

    public function render()
    {
        $user = Auth::user();

        $todosCursos = $user->eventosParticipando()
                            ->orderByDesc('data_hora')
                            ->get();

        // CORREÇÃO DA LÓGICA DE TEMPO:
        // Agora usamos a mesma regra do Dashboard: 
        // É "Próxima/Ativa" se a Data Fim for futura OU (se não tiver fim) se começou há menos de 2h.
        $proximasAulas = $todosCursos->filter(function($evento) {
            // Se tiver data_fim, usa ela. Se não, assume duração de 2h após o início.
            $fim = $evento->data_fim ?? $evento->data_hora->copy()->addHours(2);
            return $fim >= now();
        });

        // Passadas são todas as outras
        $aulasPassadas = $todosCursos->diff($proximasAulas);

        return view('livewire.meus-cursos', [
            'proximasAulas' => $proximasAulas,
            'aulasPassadas' => $aulasPassadas
        ])->layout('layouts.app');
    }
}