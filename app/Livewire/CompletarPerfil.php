<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CompletarPerfil extends Component
{
    public $role;
    public $area_atuacao;
    public $linkedin_url;
    public $bio;
    public $solicitou_mentoria; // Nova variável para controlar o botão

    public function mount()
    {
        $user = Auth::user();
        $this->role = $user->role;
        $this->area_atuacao = $user->area_atuacao;
        $this->linkedin_url = $user->linkedin_url;
        $this->bio = $user->bio;
        // Carrega do banco se ela já pediu ou não
        $this->solicitou_mentoria = $user->solicitou_mentoria; 
    }

    // Função nova: Aluna pede para virar mentora
    public function pedirParaSerMentora()
    {
        Auth::user()->update(['solicitou_mentoria' => true]);
        $this->solicitou_mentoria = true; // Atualiza a tela na hora
        session()->flash('message', 'Sua solicitação foi enviada para análise! Aguarde a aprovação.');
    }

    public function salvar()
    {
        $this->validate([
            'area_atuacao' => 'required|min:3',
            'bio' => 'nullable|max:500',
        ]);

        Auth::user()->update([
            'area_atuacao' => $this->area_atuacao,
            'linkedin_url' => $this->linkedin_url,
            'bio' => $this->bio,
        ]);

        session()->flash('message', 'Perfil atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.completar-perfil')->layout('layouts.app');
    }
}