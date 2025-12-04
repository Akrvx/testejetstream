<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Próximos Eventos</h2>
            
            @if(in_array(Auth::user()->role, ['admin', 'mentora']))
                <a href="{{ route('eventos.criar') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-indigo-700 transition">
                    + Criar Evento
                </a>
            @endif
        </div>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6">
            @foreach($eventos as $evento)
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 flex flex-col md:flex-row justify-between items-center transition duration-300">
                    
                    <div class="flex-1">
                        <div class="text-sm text-indigo-600 dark:text-indigo-400 font-bold uppercase mb-1">
                            {{ $evento->data_hora->format('d/m/Y \à\s H:i') }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $evento->titulo }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $evento->descricao }}</p>
                        
                        <div class="mt-4 flex items-center text-sm text-gray-500 dark:text-gray-400 gap-4">
                            <span>📍 {{ $evento->local ?? 'Online' }}</span>
                            <span>👥 Inscritos: {{ $evento->participantes->count() }} 
                                @if($evento->limite_vagas > 0) / {{ $evento->limite_vagas }} @endif
                            </span>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-0 md:ml-6">
                        @php
                            // Verifica se o usuário logado está na lista de participantes desse evento
                            $estouInscrita = $evento->participantes->contains(Auth::id());
                        @endphp

                        @if($estouInscrita)
                            <button wire:click="sair({{ $evento->id }})" class="bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 px-6 py-2 rounded-lg font-bold hover:bg-red-200 dark:hover:bg-red-800 transition">
                                Cancelar Inscrição
                            </button>
                        @elseif($evento->estaLotado())
                            <button disabled class="bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-400 px-6 py-2 rounded-lg font-bold cursor-not-allowed">
                                Vagas Esgotadas
                            </button>
                        @else
                            <button wire:click="participar({{ $evento->id }})" class="bg-green-600 dark:bg-green-500 text-white px-6 py-2 rounded-lg font-bold hover:bg-green-700 dark:hover:bg-green-600 transition shadow">
                                Confirmar Presença
                            </button>
                        @endif
                    </div>

                </div>
            @endforeach

            @if($eventos->isEmpty())
                <p class="text-gray-500 dark:text-gray-400 text-center py-10">Nenhum evento agendado no momento.</p>
            @endif
        </div>

    </div>
</div>