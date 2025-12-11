<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CompletarPerfil extends Component
{
    public $role;
    public $area_atuacao;
    public $linkedin_url;
    public $github_url;
    public $nivel_experiencia;
    public $bio;
    public $solicitou_mentoria;

    public function mount()
    {
        $user = Auth::user();
        $this->role = $user->role;
        $this->area_atuacao = $user->area_atuacao;
        $this->linkedin_url = $user->linkedin_url;
        $this->github_url = $user->github_url;
        $this->nivel_experiencia = $user->nivel_experiencia;
        $this->bio = $user->bio;
        $this->solicitou_mentoria = $user->solicitou_mentoria; 
    }

    // Função de candidatura agora com VALIDAÇÃO OBRIGATÓRIA
    public function pedirParaSerMentora()
    {
        // 1. Regras rígidas para quem quer ser mentora
        // Mesmo que no banco seja opcional, aqui exigimos tudo preenchido
        $this->validate([
            'area_atuacao' => 'required|min:3',
            'nivel_experiencia' => 'required', // Não pode ser vazio
            'linkedin_url' => 'required|url',  // Obrigatório ter LinkedIn
            'github_url' => 'required|url',    // Obrigatório ter Portfólio/GitHub
            'bio' => 'required|min:30',        // Bio mais completa
        ], [
            // Mensagens personalizadas (opcional, o Laravel tem padrão, mas ajuda na UX)
            'area_atuacao.required' => 'Precisamos saber sua área para conectar com alunas.',
            'nivel_experiencia.required' => 'Selecione seu nível de experiência.',
            'linkedin_url.required' => 'O LinkedIn é essencial para validarmos seu perfil profissional.',
            'github_url.required' => 'Compartilhe seu GitHub ou Portfólio para análise técnica.',
            'bio.required' => 'Conte um pouco sobre sua trajetória na biografia.',
            'bio.min' => 'Sua biografia precisa ser um pouco mais detalhada (mínimo 30 caracteres).',
        ]);

        // 2. Se passou na validação, salva tudo e marca a solicitação
        Auth::user()->update([
            'area_atuacao' => $this->area_atuacao,
            'linkedin_url' => $this->linkedin_url,
            'github_url' => $this->github_url,
            'nivel_experiencia' => $this->nivel_experiencia,
            'bio' => $this->bio,
            'solicitou_mentoria' => true
        ]);

        $this->solicitou_mentoria = true;
        session()->flash('message', 'Sua solicitação foi enviada para análise! Aguarde a aprovação.');
    }

    // Função de salvar normal (Para quem só quer atualizar dados sem pedir mentoria)
    public function salvar()
    {
        // Validação mais leve para salvar rascunho
        $this->validate([
            'area_atuacao' => 'required|min:3',
            'nivel_experiencia' => 'nullable',
            'linkedin_url' => 'nullable|url',
            'github_url' => 'nullable|url',
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