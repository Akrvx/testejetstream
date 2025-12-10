<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config; // <--- Importante

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Força HTTPS no Railway
        if($this->app->environment('production')) {
            URL::forceScheme('https');

            // 2. FORÇA A CONFIGURAÇÃO DO RESEND (Correção do Erro de Email)
            // Isso sobrescreve qualquer arquivo de config que esteja errado
            Config::set('mail.default', 'smtp');
            Config::set('mail.mailers.smtp', [
                'transport' => 'smtp',
                'host' => 'smtp.resend.com',
                'port' => 2525,
                'encryption' => 'tls', // <--- Aqui está a correção vital!
                'username' => 'resend',
                'password' => env('MAIL_PASSWORD'), // Pega a senha das variáveis
                'timeout' => null,
                'local_domain' => env('MAIL_EHLO_DOMAIN'),
            ]);
            
            // Força o remetente
            Config::set('mail.from', [
                'address' => 'onboarding@resend.dev',
                'name' => 'Projeto ELLAS',
            ]);
        }
    }
}