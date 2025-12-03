<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CompletarPerfil;
use App\Livewire\GaleriaMentoras;
use App\Livewire\VerMentora;
use App\Livewire\MinhasSolicitacoes;
use App\Livewire\MinhasCandidaturas;
use App\Livewire\ListaEventos;
use App\Livewire\CriarEvento;
use App\Livewire\CriarHistoria;
use App\Livewire\Blog;
use App\LiveWire\LerHistoria;

/*
|--------------------------------------------------------------------------
| Rota Pública (A única que não precisa de login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rotas Protegidas (Precisa estar logada para acessar)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Painel Principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil
    Route::get('/completar-perfil', CompletarPerfil::class)->name('completar-perfil');
    
    // Mentoras
    Route::get('/mentoras', GaleriaMentoras::class)->name('mentoras.index');
    Route::get('/mentoras/{id}', VerMentora::class)->name('mentoras.show');
    
    // Solicitações
    Route::get('/minhas-solicitacoes', MinhasSolicitacoes::class)->name('solicitacoes.index');
    Route::get('/meus-pedidos', MinhasCandidaturas::class)->name('candidaturas.index');

    // Eventos
    Route::get('/eventos', ListaEventos::class)->name('eventos.index');
    Route::get('/eventos/criar', CriarEvento::class)->name('eventos.criar');

    // Blog
    Route::get('/blog', Blog::class)->name('blog.index');
    Route::get('/blog/escrever', CriarHistoria::class)->name('blog.criar');

    // Ler História
    Route::get('/blog/{id}', LerHistoria::class)->name('blog.show');

}); 
// Fim do grupo de proteção