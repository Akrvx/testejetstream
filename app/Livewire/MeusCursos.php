<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;

class MeusCursos extends Component
{
    public function baixarMaterial($aulaId)
    {
        $aula = Event::find($aulaId);

        if ($aula && $aula->material_link) {
            // 1. Verifica se é um link externo (Google Drive, Dropbox, YouTube, etc.)
            // Se não tiver "/storage/" no link, assumimos que é externo
            if (strpos($aula->material_link, '/storage/') === false && filter_var($aula->material_link, FILTER_VALIDATE_URL)) {
                return redirect()->away($aula->material_link);
            }

            // 2. Tratamento para Arquivo Local (Upload)
            // O link vem como: /storage/materiais/arquivo.pdf
            // O disco 'public' espera: materiais/arquivo.pdf
            
            // Pega apenas o caminho (remove o domínio se houver)
            $path = parse_url($aula->material_link, PHP_URL_PATH);
            
            // Remove o prefixo '/storage' para achar o arquivo real no disco
            // ltrim remove a barra inicial extra se sobrar
            $relativePath = ltrim(str_replace('/storage', '', $path), '/');

            // Verifica se o arquivo realmente existe no disco antes de baixar
            if (Storage::disk('public')->exists($relativePath)) {
                return Storage::disk('public')->download($relativePath);
            } 
            
            // 3. Fallback: Se não achou o arquivo físico, tenta abrir o link direto
            // (Isso ajuda se o link simbólico estiver quebrado mas a URL funcionar)
            return redirect()->away($aula->material_link);
        }
    }

    public function render()
    {
        $user = Auth::user();

        $todosCursos = $user->eventosParticipando()
                            ->orderByDesc('data_hora')
                            ->get();

        $proximasAulas = $todosCursos->filter(function($evento) {
            $fim = $evento->data_fim ?? $evento->data_hora->copy()->addHours(2);
            return $fim >= now();
        });

        $aulasPassadas = $todosCursos->diff($proximasAulas);

        return view('livewire.meus-cursos', [
            'proximasAulas' => $proximasAulas,
            'aulasPassadas' => $aulasPassadas
        ])->layout('layouts.app');
    }
}