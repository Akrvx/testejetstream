<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Cabeçalho com Botão de Limpar Filtros -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Encontre sua Mentora</h2>
            
            @if($search || $filtroArea || $filtroNivel)
                <button wire:click="limparFiltros" class="text-sm text-red-500 hover:text-red-700 dark:text-red-400 underline self-end md:self-auto transition">
                    Limpar Filtros
                </button>
            @endif
        </div>

        

        <!-- BARRA DE FILTROS -->
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm mb-8 border border-gray-100 dark:border-gray-700 transition duration-300">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <!-- Busca por Texto -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input 
                        wire:model.live.debounce.300ms="search" 
                        type="text" 
                        placeholder="Buscar por nome ou bio..." 
                        class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                    >
                </div>

                <!-- Filtro de Área -->
                <div>
                    <select wire:model.live="filtroArea" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                        <option value="">Todas as Áreas</option>
                        @foreach($areasDisponiveis as $area)
                            <option value="{{ $area }}">{{ $area }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro de Nível -->
                <div>
                    <select wire:model.live="filtroNivel" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                        <option value="">Todos os Níveis</option>
                        <option value="Iniciante">Iniciante / Estudante</option>
                        <option value="Júnior">Júnior</option>
                        <option value="Pleno">Pleno</option>
                        <option value="Sênior">Sênior</option>
                        <option value="Liderança">Liderança / Gestão</option>
                    </select>
                </div>

            </div>
        </div>

        <!-- GRID DE MENTORAS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            @forelse($mentoras as $mentora)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full border border-gray-100 dark:border-gray-700">
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <img class="h-12 w-12 rounded-full object-cover border-2 border-indigo-100 dark:border-gray-600" src="{{ $mentora->profile_photo_url }}" alt="{{ $mentora->name }}" />
                            <div class="ml-3">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white leading-tight">{{ $mentora->name }}</h3>
                                
                                <div class="flex flex-wrap gap-2 mt-1">
                                    <span class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30 px-2 py-0.5 rounded">
                                        {{ $mentora->area_atuacao ?? 'Tecnologia' }}
                                    </span>
                                    
                                    <!-- Badge de Nível -->
                                    @if($mentora->nivel_experiencia)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-600">
                                            {{ $mentora->nivel_experiencia }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Ícone GitHub -->
                        @if($mentora->github_url)
                            <a href="{{ $mentora->github_url }}" target="_blank" class="text-gray-400 hover:text-black dark:hover:text-white transition" title="Ver Portfólio/GitHub">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                        @endif
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 flex-1 line-clamp-3">
                        {{ $mentora->bio }}
                    </p>



                    
                    <a href="{{ route('mentoras.show', $mentora->id) }}" class="block text-center w-full bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded transition mt-auto shadow-md hover:shadow-lg">
                        Ver Perfil Completo
                    </a>
                </div>
            </div>
            @empty
            <!-- Estado Vazio (Busca sem resultados) -->
            <div class="col-span-1 md:col-span-3 text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Nenhuma mentora encontrada</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Tente ajustar seus filtros ou busca.</p>
                <button wire:click="limparFiltros" class="mt-4 text-indigo-600 dark:text-indigo-400 font-bold hover:underline">
                    Limpar todos os filtros
                </button>
            </div>
            
            @endforelse
 <div class="flex items-center justify-end">
    <a href="{{ route('dashboard') }}" 
       class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition inline-block text-center">
        Voltar à página inicial
    </a>
</div>


        </div>
    </div>
</div>