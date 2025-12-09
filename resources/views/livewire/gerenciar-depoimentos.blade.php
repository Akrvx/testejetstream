<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Gerenciar Depoimentos</h2>

        <!-- Formulário de Cadastro -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-8 border border-gray-100 dark:border-gray-700 transition duration-300">
            <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4">Adicionar Novo</h3>
            
            @if (session()->has('message'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 p-3 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="salvar" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Nome da Pessoa</label>
                    <input type="text" wire:model="name" class="w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Cargo / Função</label>
                    <input type="text" wire:model="role" placeholder="Ex: Desenvolvedora Jr" class="w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                    @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Foto (URL)</label>
                    <input type="text" wire:model="photo_url" placeholder="https://..." class="w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Cole um link de imagem (ex: LinkedIn ou GitHub da pessoa).</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Depoimento</label>
                    <textarea wire:model="content" rows="3" class="w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="md:col-span-2 text-right">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-bold px-4 py-2 rounded transition">
                        Salvar Depoimento
                    </button>
                </div>
            </form>
        </div>

        <!-- Lista de Depoimentos Existentes -->
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Depoimentos Ativos</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($depoimentos as $item)
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow flex justify-between items-start border border-gray-100 dark:border-gray-700 transition duration-300">
                <div class="flex items-center">
                    @if($item->photo_url)
                        <img src="{{ $item->photo_url }}" class="w-12 h-12 rounded-full object-cover mr-4 border border-gray-200 dark:border-gray-600">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 mr-4 flex items-center justify-center text-xl text-gray-500 dark:text-gray-300">💬</div>
                    @endif
                    <div>
                        <h4 class="font-bold text-gray-800 dark:text-white">{{ $item->name }}</h4>
                        <p class="text-xs text-indigo-600 dark:text-indigo-400 font-bold">{{ $item->role }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 line-clamp-2">"{{ $item->content }}"</p>
                    </div>
                </div>
                <button 
                    wire:click="deletar({{ $item->id }})" 
                    class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 p-2 hover:bg-red-50 dark:hover:bg-red-900/30 rounded transition"
                    title="Excluir"
                    onclick="confirm('Tem certeza que deseja excluir este depoimento?') || event.stopImmediatePropagation()"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            @endforeach

            @if($depoimentos->isEmpty())
                <div class="col-span-1 md:col-span-2 text-center py-8 text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 rounded-lg border border-dashed border-gray-300 dark:border-gray-700">
                    Nenhum depoimento cadastrado ainda.
                </div>
            @endif
        </div>

    </div>
</div>