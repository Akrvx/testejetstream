<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Minha Agenda de Estudos</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-8">Acompanhe seus compromissos e mentorias ativas.</p>

        <!-- SEÇÃO 1: EVENTOS E WORKSHOPS -->
        <div class="mb-12">
            <h3 class="text-xl font-bold text-indigo-600 dark:text-indigo-400 mb-4 flex items-center">
                <span class="bg-indigo-100 dark:bg-indigo-900/30 p-2 rounded-lg mr-3">📅</span>
                Próximos Eventos Confirmados
            </h3>

            @if($eventos->isEmpty())
                <div class="bg-white dark:bg-gray-800 rounded-lg p-8 text-center border border-dashed border-gray-300 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400">Você não tem eventos agendados.</p>
                    <a href="{{ route('eventos.index') }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline mt-2 inline-block">
                        Explorar Eventos Disponíveis
                    </a>
                </div>
            @else
                <div class="grid gap-4">
                    @foreach($eventos as $evento)
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border-l-4 border-indigo-500 flex flex-col md:flex-row justify-between items-center transition hover:shadow-md">
                            <div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase mb-1">
                                    {{ $evento->data_hora->format('d \d\e F \à\s H:i') }}
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 dark:text-white">{{ $evento->titulo }}</h4>
                                <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $evento->local ?? 'Link será enviado por e-mail' }}</p>
                            </div>
                            
                            <div class="mt-4 md:mt-0">
                                @if($evento->local && filter_var($evento->local, FILTER_VALIDATE_URL))
                                    <a href="{{ $evento->local }}" target="_blank" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-indigo-700 transition">
                                        Acessar Link
                                    </a>
                                @else
                                    <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-4 py-2 rounded-lg font-bold text-sm">
                                        Confirmado
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- SEÇÃO 2: MENTORIAS ATIVAS -->
        <div>
            <h3 class="text-xl font-bold text-pink-600 dark:text-pink-400 mb-4 flex items-center">
                <span class="bg-pink-100 dark:bg-pink-900/30 p-2 rounded-lg mr-3">👩‍🏫</span>
                Acompanhamento de Mentorias
            </h3>

            @if($mentorias->isEmpty())
                <div class="bg-white dark:bg-gray-800 rounded-lg p-8 text-center border border-dashed border-gray-300 dark:border-gray-700">
                    <p class="text-gray-500 dark:text-gray-400">Nenhuma mentoria ativa no momento.</p>
                    <a href="{{ route('mentoras.index') }}" class="text-pink-600 dark:text-pink-400 font-bold hover:underline mt-2 inline-block">
                        Encontrar uma Mentora
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($mentorias as $solicitacao)
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
                            <img class="h-16 w-16 rounded-full object-cover border-2 border-pink-200 dark:border-pink-900" src="{{ $solicitacao->mentora->profile_photo_url }}" alt="">
                            
                            <div class="flex-1">
                                <h4 class="text-lg font-bold text-gray-800 dark:text-white">{{ $solicitacao->mentora->name }}</h4>
                                <p class="text-sm text-pink-600 dark:text-pink-400 font-bold">Mentora Ativa</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Iniciado em {{ $solicitacao->updated_at->format('d/m/Y') }}</p>
                            </div>

                            <div>
                                <a href="mailto:{{ $solicitacao->mentora->email }}" class="flex flex-col items-center justify-center text-gray-500 hover:text-pink-600 dark:hover:text-pink-400 transition" title="Enviar E-mail">
                                    <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-full mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                    </div>
                                    <span class="text-[10px] font-bold">Agendar</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>