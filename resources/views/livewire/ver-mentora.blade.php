<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            <div class="bg-indigo-600 p-6 sm:p-10 text-center sm:text-left sm:flex sm:items-center">
                <img class="h-24 w-24 rounded-full mx-auto sm:mx-0 border-4 border-white shadow-md" 
                     src="{{ $this->mentora->profile_photo_url }}" 
                     alt="{{ $this->mentora->name }}">
                
                <div class="mt-4 sm:mt-0 sm:ml-6 text-white">
                    <h1 class="text-3xl font-bold">{{ $this->mentora->name }}</h1>
                    <p class="text-indigo-200 text-lg">{{ $this->mentora->area_atuacao }}</p>
                </div>
            </div>

            <div class="p-6 sm:p-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Sobre a Mentora</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $this->mentora->bio ?? 'Esta mentora ainda não adicionou uma biografia.' }}
                        </p>
                    </div>

                    @if($this->mentora->linkedin_url)
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Redes Profissionais</h3>
                        <a href="{{ $this->mentora->linkedin_url }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                            🔗 Ver LinkedIn
                        </a>
                    </div>
                    @endif
                </div>

                <div class="bg-gray-50 p-6 rounded-lg h-fit border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4">Interessada na mentoria?</h3>
                    <p class="text-sm text-gray-500 mb-6">
                        Entre em contato para verificar a disponibilidade de agenda.
                    </p>
                    
                    <div class="mt-2">
                        @if($solicitacaoEnviada)
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Solicitação Enviada!</strong>
                                <span class="block sm:inline text-sm">Aguarde o contato.</span>
                            </div>
                            
                            <button disabled class="w-full bg-gray-400 text-white font-bold py-3 px-4 rounded-lg cursor-not-allowed shadow-none">
                                Solicitação Pendente
                            </button>
                        @else
                            <button 
                                wire:click="solicitarMentoria" 
                                wire:loading.attr="disabled"
                                class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 transition shadow-md flex justify-center items-center">
                                
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
                    
                    <p class="text-xs text-center text-gray-400 mt-4">
                        A solicitação será registrada no sistema.
                    </p>
                </div>

            </div>
        </div>
        
        <div class="mt-6">
            <a href="{{ route('mentoras.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                ← Voltar para a lista
            </a>
        </div>
    </div>
</div>