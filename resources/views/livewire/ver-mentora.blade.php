<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg transition duration-300">
            
            <!-- Cabeçalho -->
            <div class="bg-indigo-600 dark:bg-indigo-700 p-6 sm:p-10 text-center sm:text-left sm:flex sm:items-center transition duration-300">
                <img class="h-24 w-24 rounded-full mx-auto sm:mx-0 border-4 border-white dark:border-gray-200 shadow-md object-cover" 
                     src="{{ $this->mentora->profile_photo_url }}" 
                     alt="{{ $this->mentora->name }}">
                
                <div class="mt-4 sm:mt-0 sm:ml-6 text-white">
                    <h1 class="text-3xl font-bold">{{ $this->mentora->name }}</h1>
                    
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 mt-1 justify-center sm:justify-start">
                        <p class="text-indigo-100 text-lg font-medium">{{ $this->mentora->area_atuacao }}</p>
                        
                        <!-- NOVO: Nível em destaque -->
                        @if($this->mentora->nivel_experiencia)
                            <span class="hidden sm:inline text-indigo-300">•</span>
                            <span class="inline-block px-3 py-0.5 bg-white/20 rounded-full text-sm backdrop-blur-sm border border-white/30">
                                {{ $this->mentora->nivel_experiencia }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Coluna Esquerda -->
                <div class="md:col-span-2 space-y-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 border-b dark:border-gray-700 pb-2">Sobre a Mentora</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {{ $this->mentora->bio ?? 'Esta mentora ainda não adicionou uma biografia.' }}
                        </p>
                    </div>

                    <!-- Redes Profissionais (ATUALIZADO COM GITHUB) -->
                    @if($this->mentora->linkedin_url || $this->mentora->github_url)
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 border-b dark:border-gray-700 pb-2">Conecte-se</h3>
                        <div class="flex flex-wrap gap-4">
                            @if($this->mentora->linkedin_url)
                                <a href="{{ $this->mentora->linkedin_url }}" target="_blank" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:underline bg-blue-50 dark:bg-blue-900/30 px-3 py-2 rounded-lg transition">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    LinkedIn
                                </a>
                            @endif

                            @if($this->mentora->github_url)
                                <a href="{{ $this->mentora->github_url }}" target="_blank" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white hover:underline bg-gray-100 dark:bg-gray-700 px-3 py-2 rounded-lg transition">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                    GitHub / Portfólio
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Coluna Direita (Ação) -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg h-fit border border-gray-100 dark:border-gray-600 transition duration-300">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-4">Interessada na mentoria?</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mb-6">
                        Entre em contato para verificar a disponibilidade de agenda.
                    </p>
                    
                    <div class="mt-2">
                        @if($solicitacaoEnviada)
                            <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Solicitação Enviada!</strong>
                                <span class="block sm:inline text-sm">Aguarde o contato.</span>
                            </div>
                            
                            <button disabled class="w-full bg-gray-400 dark:bg-gray-600 text-white font-bold py-3 px-4 rounded-lg cursor-not-allowed shadow-none">
                                Solicitação Pendente
                            </button>
                        @else
                            <button 
                                wire:click="solicitarMentoria" 
                                wire:loading.attr="disabled"
                                class="w-full bg-green-600 dark:bg-green-500 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition shadow-md flex justify-center items-center">
                                
                                <span wire:loading.remove>Solicitar Mentoria</span>
                                
                                <span wire:loading>
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Enviando...
                                </span>
                            </button>
                        @endif
                    </div>
                    
                    <p class="text-xs text-center text-gray-400 dark:text-gray-500 mt-4">
                        A solicitação será registrada no sistema.
                    </p>
                </div>

            </div>
        </div>
        
        <div class="mt-6">
            <a href="{{ route('mentoras.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white flex items-center transition">
                ← Voltar para a lista
            </a>
        </div>
    </div>
</div>