@extends('layouts.site')

@section('content')
    <div class="pt-20">
        <!-- Título e Introdução da Página -->
        <section class="bg-ellas-dark py-12">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="font-orbitron text-4xl md:text-5xl font-bold text-white mb-4">Nossos Serviços</h1>
                <p class="font-biorhyme text-gray-400 max-w-2xl mx-auto">
                    Conheça em detalhes como podemos impulsionar sua carreira na tecnologia através de nossas iniciativas.
                </p>
            </div>
        </section>

        <!-- A Lista de Serviços (O Componente que faltava) -->
        @include('components.site.services-list')
    </div>
@endsection