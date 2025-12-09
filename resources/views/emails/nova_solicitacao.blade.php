<!DOCTYPE html>
<html>
<head>
    <title>Nova Solicitação de Mentoria</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .header { text-align: center; border-bottom: 2px solid #9333ea; padding-bottom: 20px; margin-bottom: 20px; }
        .logo { font-size: 24px; font-weight: bold; color: #9333ea; }
        .content { color: #374151; line-height: 1.6; }
        .button { display: inline-block; background-color: #9333ea; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; margin-top: 20px; font-weight: bold; }
        .footer { margin-top: 30px; font-size: 12px; color: #9ca3af; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="logo">Projeto ELLAS</span>
        </div>
        
        <div class="content">
            <h2>Olá, {{ $solicitacao->mentora->name }}! 👋</h2>
            
            <p>Você acabou de receber uma nova solicitação de mentoria.</p>
            
            <p><strong>Quem solicitou:</strong> {{ $solicitacao->aluna->name }}</p>
            <p><strong>E-mail de contato:</strong> {{ $solicitacao->aluna->email }}</p>
            <p><strong>Área de Interesse:</strong> {{ $solicitacao->aluna->area_atuacao ?? 'Não informada' }}</p>
            
            <p>Acesse o painel para aceitar ou recusar este pedido.</p>
            
            <div style="text-align: center;">
                <a href="{{ route('solicitacoes.index') }}" class="button">Gerenciar Pedidos</a>
            </div>
        </div>

        <div class="footer">
            © {{ date('Y') }} Projeto ELLAS. Todos os direitos reservados.
        </div>
    </div>
</body>
</html>