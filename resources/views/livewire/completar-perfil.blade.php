<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8 transition duration-300">
            
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Complete seu Perfil</h2>

            <!-- Mensagem de Sucesso -->
            @if (session()->has('message'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded relative mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="salvar">
                
                <!-- Info Box com Status e Botão de Candidatura -->
                <div class="mb-6 p-4 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-700/50">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Seu Perfil Atual:</label>
                    
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="p-3 bg-white dark:bg-gray-600 rounded text-gray-600 dark:text-gray-200 font-bold shadow-sm inline-block">
                            @if($role === 'mentora')
                                🎓 Mentora Verificada
                            @else
                                👩‍💻 Aluna / Entusiasta
                            @endif
                        </div>

                        <!-- Lógica do Botão de Candidatura -->
                        @if($role === 'aluna')
                            @if($solicitou_mentoria)
                                <div class="flex items-center text-yellow-600 dark:text-yellow-400 font-bold text-sm bg-yellow-100 dark:bg-yellow-900/30 px-3 py-2 rounded border border-yellow-200 dark:border-yellow-700">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Análise Pendente
                                </div>
                            @else
                                <button type="button" wire:click="pedirParaSerMentora" class="text-sm text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 px-4 py-2 rounded-lg transition shadow">
                                    Quero me candidatar a Mentora
                                </button>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Campo Área de Atuação -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Área de Atuação / Interesse</label>
                    <input 
                        type="text" 
                        wire:model="area_atuacao" 
                        placeholder="Ex: Backend, UX Design, Data Science" 
                        class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline focus:ring-blue-500"
                    >
                    @error('area_atuacao') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Campo LinkedIn -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">LinkedIn (URL)</label>
                    <input 
                        type="text" 
                        wire:model="linkedin_url" 
                        placeholder="https://linkedin.com/in/voce" 
                        class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline focus:ring-blue-500"
                    >
                </div>

                      <!-- Nível de Experiência -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nível de Experiência</label>
                    <select wire:model="nivel_experiencia" class="shadow border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline focus:ring-blue-500">
                        <option value="">Selecione...</option>
                        <option value="Iniciante">Iniciante / Estudante</option>
                        <option value="Júnior">Júnior</option>
                        <option value="Pleno">Pleno</option>
                        <option value="Sênior">Sênior</option>
                        <option value="Liderança">Liderança / Gestão</option>
                    </select>
                </div>

                <!-- GitHub -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">GitHub / Portfólio (URL)</label>
                    <input type="text" wire:model="github_url" placeholder="https://github.com/voce" class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline focus:ring-blue-500">
                </div>

                <!-- Campo Bio -->
                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Sobre Mim</label>
                    <textarea 
                        wire:model="bio" 
                        rows="4" 
                        class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline focus:ring-blue-500"
                    ></textarea>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition">
                        Salvar Perfil
                    </button>
                </div>

                 <div class="flex items-center justify-end">
    <a href="{{ route('dashboard') }}" 
       class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition inline-block text-center">
        Voltar à página inicial
    </a>
</div>

          

            </form>
        </div>
    </div>
</div>