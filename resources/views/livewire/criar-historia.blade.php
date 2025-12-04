<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8 transition duration-300">
            
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Escrever Nova História</h2>

            <form wire:submit.prevent="salvar">
                
                <!-- Título -->
                <div class="mb-4">
                    <label class="block font-bold text-gray-700 dark:text-gray-300 mb-2">Título Impactante</label>
                    <input type="text" wire:model="titulo" placeholder="Ex: Como migrei de Arquitetura para TI" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500">
                    @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Subtítulo -->
                <div class="mb-4">
                    <label class="block font-bold text-gray-700 dark:text-gray-300 mb-2">Subtítulo (Resumo Curto)</label>
                    <input type="text" wire:model="subtitulo" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500">
                    @error('subtitulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Capa (URL) -->
                <div class="mb-4">
                    <label class="block font-bold text-gray-700 dark:text-gray-300 mb-2">Link da Imagem de Capa (Opcional)</label>
                    <input type="url" wire:model="imagem_capa" placeholder="https://..." class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Cole aqui um link de imagem do Unsplash ou similar.</p>
                </div>

                <!-- Conteúdo -->
                <div class="mb-6">
                    <label class="block font-bold text-gray-700 dark:text-gray-300 mb-2">Sua História</label>
                    <textarea wire:model="conteudo" rows="10" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500" placeholder="Escreva aqui..."></textarea>
                    @error('conteudo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-pink-600 hover:bg-pink-700 dark:bg-pink-500 dark:hover:bg-pink-600 text-white font-bold py-2 px-6 rounded-lg transition">
                    Publicar História 🚀
                </button>
            </form>

        </div>
    </div>
</div>