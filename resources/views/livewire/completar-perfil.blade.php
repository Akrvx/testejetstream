<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8 transition duration-300">
            
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Complete seu Perfil</h2>

            <form wire:submit.prevent="salvar">
                
                <!-- Info Box -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Seu Perfil Atual:</label>
                    <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded text-gray-600 dark:text-gray-200">
                        @if($role === 'mentora')
                            🎓 Mentora Verificada
                        @else
                            👩‍💻 Aluna / Entusiasta
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        Deseja ser uma mentora? <a href="#" class="text-blue-500 dark:text-blue-400 underline">Aplique aqui futuramente.</a>
                    </p>
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

            </form>
        </div>
    </div>
</div>