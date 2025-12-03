<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        
        <article class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            <!-- Imagem de Capa (Se houver) -->
            @if($historia->imagem_capa)
                <div class="h-64 w-full relative">
                    <img src="{{ $historia->imagem_capa }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
            @endif

            <div class="p-8 sm:p-12">
                
                <!-- Cabeçalho do Post -->
                <div class="mb-8 border-b border-gray-100 pb-8">
                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <span class="font-bold text-pink-600 uppercase">Inspiração</span>
                        <span>•</span>
                        <span>{{ $historia->created_at->format('d de F, Y') }}</span>
                    </div>

                    <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                        {{ $historia->titulo }}
                    </h1>
                    
                    <p class="text-xl text-gray-600 font-light leading-relaxed">
                        {{ $historia->subtitulo }}
                    </p>

                    <!-- Autor -->
                    <div class="flex items-center mt-6">
                        <img class="h-10 w-10 rounded-full object-cover mr-3" src="{{ $historia->autor->profile_photo_url }}" alt="">
                        <div>
                            <p class="text-sm font-bold text-gray-900">{{ $historia->autor->name }}</p>
                            <p class="text-xs text-gray-500">Autora / Mentora</p>
                        </div>
                    </div>
                </div>

                <!-- Conteúdo do Texto -->
                <!-- nl2br transforma as quebras de linha do banco em <br> do HTML -->
                <div class="prose max-w-none text-gray-800 leading-relaxed text-lg space-y-6">
                    {!! nl2br(e($historia->conteudo)) !!}
                </div>

            </div>
        </article>

        <!-- Navegação -->
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-pink-600 font-bold flex items-center transition">
                ← Voltar para Histórias
            </a>
        </div>

    </div>
</div>