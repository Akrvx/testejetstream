<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Solicitacao; // Importante!

class NovaSolicitacaoMentoria extends Mailable
{
    use Queueable, SerializesModels;

    // Recebemos a solicitação aqui
    public function __construct(
        public Solicitacao $solicitacao
    ) {}

    // Define o Assunto do E-mail
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nova Solicitação de Mentoria - Projeto ELLAS',
        );
    }

    // Define qual arquivo visual será usado
    public function content(): Content
    {
        return new Content(
            view: 'emails.nova_solicitacao', // Vamos criar esse arquivo já já
        );
    }

    public function attachments(): array
    {
        return [];
    }
}