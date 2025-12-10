<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Gestão de Aulas e Presença</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded relative mb-6">
                {{ session('message') }}
            </div>
        @endif

        <div class="space-y-8">
            @forelse($aulas as $aula)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-100 dark:border-gray-700 transition duration-300">
                    
                    <!-- Cabeçalho da Aula -->
                    <div class="p-6 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <div class="text-sm text-indigo-600 dark:text-indigo-400 font-bold uppercase tracking-wide">
                                {{ $aula->data_hora->format('d/m/Y \à\s H:i') }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mt-1">{{ $aula->titulo }}</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Local: {{ $aula->local }}</p>
                        </div>
                        <div class="mt-4 md:mt-0 flex items-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $aula->participantes->count() > 0 ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-600 text-gray-800 dark:text-gray-300' }}">
                                {{ $aula->participantes->count() }} Alunas Inscritas
                            </span>
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-8">
                        
                        <!-- Coluna 1: Material de Apoio -->
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                                <span class="text-xl mr-2">📚</span> Material da Aula
                            </h4>
                            <div class="flex gap-2">
                                <input 
                                    type="text" 
                                    wire:model="materialLinks.{{ $aula->id }}" 
                                    placeholder="Cole aqui o link (Drive, PDF, Slide)..." 
                                    class="flex-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                                >
                                <button 
                                    wire:click="salvarMaterial({{ $aula->id }})"
                                    class="bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold transition shadow-md"
                                >
                                    Salvar
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                Ao salvar, este link ficará disponível para as alunas na agenda delas.
                            </p>
                        </div>

                        <!-- Coluna 2: Lista de Presença -->
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                                <span class="text-xl mr-2">📋</span> Lista de Inscritas
                            </h4>
                            
                            @if($aula->participantes->isEmpty())
                                <div class="p-4 bg-gray-50 dark:bg-gray-900/30 rounded-lg text-center border border-dashed border-gray-300 dark:border-gray-600">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm italic">Nenhuma inscrição ainda.</p>
                                </div>
                            @else
                                <div class="max-h-40 overflow-y-auto pr-2 space-y-2 custom-scrollbar">
                                    @foreach($aula->participantes as $aluna)
                                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-100 dark:border-gray-600">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full object-cover mr-3 border border-gray-200 dark:border-gray-500" src="{{ $aluna->profile_photo_url }}" alt="">
                                                <div>
                                                    <p class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $aluna->name }}</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $aluna->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-dashed border-gray-300 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400 text-lg mb-2">Você ainda não criou nenhuma aula.</p>
                    <a href="{{ route('eventos.criar') }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline">
                        Criar meu primeiro evento agora
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</div>