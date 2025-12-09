@extends('layouts.site')

@section('content')
    <div class="pt-20">
        <!-- Título da Página (Opcional, pois o componente já tem título, mas ajuda na estrutura) -->
        <section class="bg-ellas-card/50 py-12 border-b border-ellas-nav">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="font-orbitron text-4xl md:text-5xl font-bold text-white mb-4">Comunidade & Impacto</h1>
                <p class="font-biorhyme text-gray-400 max-w-2xl mx-auto">
                    Veja como estamos transformando vidas e carreiras através da tecnologia.
                </p>
            </div>
        </section>

        <!-- Inclui o componente visual dos depoimentos -->
        @include('components.site.testimonials')
    </div>
@endsection