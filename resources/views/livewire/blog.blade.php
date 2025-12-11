<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Histórias Inspiradoras</h2>
                <p class="text-gray-600 dark:text-gray-400">Mulheres reais, trajetórias incríveis.</p>
            </div>

            <!-- Só mostra botão de escrever se for Admin/Mentora -->
            @if(in_array(Auth::user()->role, ['admin', 'mentora']))
                <a href="{{ route('blog.criar') }}" class="bg-pink-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-pink-700 shadow transition">
                    + Escrever História
                </a>
            @endif
        </div>

          <div class="flex items-center justify-end">
    <a href="{{ route('dashboard') }}" 
       class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition inline-block text-center">
        Voltar à página inicial
    </a>
</div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($historias as $historia)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col h-full hover:shadow-xl transition duration-300">
                
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
                    <div class="text-xs font-bold text-pink-600 dark:text-pink-400 uppercase mb-2">
                        Por {{ $historia->autor->name }} • {{ $historia->created_at->format('d/m/Y') }}
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $historia->titulo }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 flex-1">
                        {{ $historia->subtitulo }}
                    </p>

                    <a href="{{ route('blog.show', $historia->id) }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:text-indigo-800 dark:hover:text-indigo-300 mt-auto block transition">
                        Ler completo →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        @if($historias->isEmpty())
            <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <p class="text-gray-500 dark:text-gray-300 text-lg">Ainda não temos histórias publicadas.</p>
                <p class="text-gray-400 dark:text-gray-500">Seja a primeira a inspirar!</p>
            </div>
        @endif

    </div>
</div>