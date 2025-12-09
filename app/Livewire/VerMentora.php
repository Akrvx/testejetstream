<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // <--- IMPORTANTE
use App\Mail\NovaSolicitacaoMentoria; // <--- IMPORTANTE

class VerMentora extends Component
{
    public User $mentora;
    public $solicitacaoEnviada = false;

    public function mount($id)
    {
        $this->mentora = User::findOrFail($id);
        
        if ($this->mentora->role !== 'mentora') { abort(404); }

        $jaSolicitou = Solicitacao::where('mentora_id', $this->mentora->id)
            ->where('aluna_id', Auth::id())
            ->exists();

        if ($jaSolicitou) {
            $this->solicitacaoEnviada = true;
        }
    }

    public function solicitarMentoria()
    {
        if (Auth::id() === $this->mentora->id) {
            return;
        }

        // 1. Cria no Banco
        $solicitacao = Solicitacao::create([
            'mentora_id' => $this->mentora->id,
            'aluna_id' => Auth::id(),
            'status' => 'pendente'
        ]);

        // 2. ENVIA O E-MAIL (A MÁGICA ACONTECE AQUI)
        try {
            Mail::to($this->mentora->email)->send(new NovaSolicitacaoMentoria($solicitacao));
        } catch (\Exception $e) {
            // Se der erro no envio, não travamos o site, apenas logamos
            \Log::error('Erro ao enviar email: ' . $e->getMessage());
        }

        $this->solicitacaoEnviada = true;
    }

    public function render()
    {
        return view('livewire.ver-mentora')->layout('layouts.app');
    }
}