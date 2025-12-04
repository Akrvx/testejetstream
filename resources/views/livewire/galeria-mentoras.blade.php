<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Encontre sua Mentora</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            @foreach($mentoras as $mentora)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $mentora->profile_photo_url }}" alt="{{ $mentora->name }}" />
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $mentora->name }}</h3>
                            <span class="text-sm text-indigo-600 dark:text-indigo-400 font-semibold">{{ $mentora->area_atuacao ?? 'Tecnologia' }}</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        {{Str::limit($mentora->bio, 100) }}
                    </p>

                    <a href="{{ route('mentoras.show', $mentora->id) }}" class="block text-center w-full bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded transition">
                        Ver Perfil Completo
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        
        @if($mentoras->isEmpty())
            <div class="text-center text-gray-500 dark:text-gray-400 py-10">
                Nenhuma mentora encontrada no momento.
            </div>
        @endif

    </div>
</div>