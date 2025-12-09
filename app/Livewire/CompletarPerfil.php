<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CompletarPerfil extends Component
{
    public $role;
    public $area_atuacao;
    public $linkedin_url;
    public $github_url; // Novo Campo
    public $nivel_experiencia; // Novo Campo
    public $bio;
    public $solicitou_mentoria;

    public function mount()
    {
        $user = Auth::user();
        $this->role = $user->role;
        $this->area_atuacao = $user->area_atuacao;
        $this->linkedin_url = $user->linkedin_url;
        $this->github_url = $user->github_url; // Carrega do banco
        $this->nivel_experiencia = $user->nivel_experiencia; // Carrega do banco
        $this->bio = $user->bio;
        $this->solicitou_mentoria = $user->solicitou_mentoria; 
    }

    public function pedirParaSerMentora()
    {
        Auth::user()->update(['solicitou_mentoria' => true]);
        $this->solicitou_mentoria = true;
        session()->flash('message', 'Sua solicitação foi enviada para análise! Aguarde a aprovação.');
    }

    public function salvar()
    {
        $this->validate([
            'area_atuacao' => 'required|min:3',
            'nivel_experiencia' => 'nullable|string', // Validação simples
            'github_url' => 'nullable|url', // Validação de URL
            'bio' => 'nullable|max:500',
        ]);

        Auth::user()->update([
            'area_atuacao' => $this->area_atuacao,
            'linkedin_url' => $this->linkedin_url,
            'github_url' => $this->github_url,
            'nivel_experiencia' => $this->nivel_experiencia,
            'bio' => $this->bio,
        ]);

        session()->flash('message', 'Perfil atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.completar-perfil')->layout('layouts.app');
    }
}