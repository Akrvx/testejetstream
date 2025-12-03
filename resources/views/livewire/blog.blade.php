<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Histórias Inspiradoras</h2>
                <p class="text-gray-600">Mulheres reais, trajetórias incríveis.</p>
            </div>

            <!-- Só mostra botão de escrever se for Admin/Mentora -->
            @if(in_array(Auth::user()->role, ['admin', 'mentora']))
                <a href="{{ route('blog.criar') }}" class="bg-pink-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-pink-700 shadow">
                    + Escrever História
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($historias as $historia)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full hover:shadow-xl transition">
                
                <!-- Imagem (Se tiver) -->
                @if($historia->imagem_capa)
                    <img class="h-48 w-full object-cover" src="{{ $historia->imagem_capa }}" alt="Capa">
                @else
                    <!-- Placeholder colorido se não tiver imagem -->
                    <div class="h-48 w-full bg-gradient-to-r from-pink-500 to-purple-500 flex items-center justify-center">
                        <span class="text-white font-bold text-xl">Inspiração ✨</span>
                    </div>
                @endif

                <div class="p-6 flex-1 flex flex-col">
                    <div class="text-xs font-bold text-pink-600 uppercase mb-2">
                        Por {{ $historia->autor->name }} • {{ $historia->created_at->format('d/m/Y') }}
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $historia->titulo }}</h3>
                    <p class="text-gray-600 text-sm mb-4 flex-1">
                        {{ $historia->subtitulo }}
                    </p>

                    <a href="{{ route('blog.show', $historia->id) }}" class="text-indigo-600 font-bold hover:text-indigo-800 mt-auto block">
                        Ler completo →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        @if($historias->isEmpty())
            <div class="text-center py-12 bg-white rounded-lg shadow-sm">
                <p class="text-gray-500 text-lg">Ainda não temos histórias publicadas.</p>
                <p class="text-gray-400">Seja a primeira a inspirar!</p>
            </div>
        @endif

    </div>
</div>