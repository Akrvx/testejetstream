<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Solicitacao; // <--- Importe o modelo novo!
use Illuminate\Support\Facades\Auth;

class VerMentora extends Component
{
    public User $mentora;
    public $solicitacaoEnviada = false; // Para controlar a mensagem de sucesso

    public function mount($id)
    {
        $this->mentora = User::findOrFail($id);
        
        if ($this->mentora->role !== 'mentora') { abort(404); }

        // Verifica se já existe uma solicitação enviada para não duplicar
        $jaSolicitou = Solicitacao::where('mentora_id', $this->mentora->id)
            ->where('aluna_id', Auth::id())
            ->exists();

        if ($jaSolicitou) {
            $this->solicitacaoEnviada = true;
        }
    }

    public function solicitarMentoria()
    {
        // 1. Não deixa pedir pra si mesma
        if (Auth::id() === $this->mentora->id) {
            return;
        }

        // 2. Cria o registro no banco
        Solicitacao::create([
            'mentora_id' => $this->mentora->id,
            'aluna_id' => Auth::id(), // Pega o ID de quem está logada
            'status' => 'pendente'
        ]);

        // 3. Atualiza a tela
        $this->solicitacaoEnviada = true;
        
        // Opcional: Aqui você enviaria um e-mail para a mentora avisando
    }

    public function render()
    {
        return view('livewire.ver-mentora')->layout('layouts.app');
    }
}