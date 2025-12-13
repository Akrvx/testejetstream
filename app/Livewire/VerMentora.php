<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovaSolicitacaoMentoria;
use Illuminate\Support\Facades\Log;

class VerMentora extends Component
{
    public User $mentora;
    public $statusSolicitacao = null; // Mudamos de boolean para string (null, 'pendente', 'aceito')

    public function mount($id)
    {
        $this->mentora = User::findOrFail($id);
        
        if ($this->mentora->role !== 'mentora') { abort(404); }

        // Busca a solicitação MAIS RECENTE entre essa aluna e essa mentora
        $solicitacao = Solicitacao::where('mentora_id', $this->mentora->id)
            ->where('aluna_id', Auth::id())
            ->latest() // Pega a última caso tenha mais de uma
            ->first();

        if ($solicitacao) {
            $this->statusSolicitacao = $solicitacao->status;
        }
    }

    public function solicitarMentoria()
    {
        set_time_limit(120);

        if (Auth::id() === $this->mentora->id) {
            return;
        }

        // Se já está pendente ou aceito, não faz nada
        if ($this->statusSolicitacao === 'pendente' || $this->statusSolicitacao === 'aceito') {
            return;
        }

        $solicitacao = Solicitacao::create([
            'mentora_id' => $this->mentora->id,
            'aluna_id' => Auth::id(),
            'status' => 'pendente'
        ]);

        try {
            Mail::to($this->mentora->email)->send(new NovaSolicitacaoMentoria($solicitacao));
        } catch (\Throwable $e) {
            Log::error('Erro ao enviar email: ' . $e->getMessage());
        }

        $this->statusSolicitacao = 'pendente';
    }

    public function render()
    {
        return view('livewire.ver-mentora')->layout('layouts.app');
    }
}