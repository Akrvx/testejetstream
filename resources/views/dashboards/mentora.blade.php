<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Área da Mentora') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8 transition duration-300">
                
                <!-- Cabeçalho de Boas-vindas -->
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Olá, Mentora {{ Auth::user()->name }}! 🎓
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">Obrigada por compartilhar seu conhecimento com a comunidade.</p>
                    </div>
                    <a href="{{ route('completar-perfil') }}" class="text-sm bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 py-2 px-4 rounded-full hover:bg-indigo-200 dark:hover:bg-indigo-800 transition font-bold">
                        Editar Perfil Público
                    </a>
                </div>

                <hr class="my-6 border-gray-100 dark:border-gray-700">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Card 1: Gestão de Pedidos (Amarelo) -->
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-6 rounded-xl border border-yellow-100 dark:border-yellow-800 hover:shadow-md transition duration-300">
                        <div class="flex items-center mb-3">
                            <span class="text-2xl mr-3">📬</span>
                            <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-200">Solicitações de Alunas</h3>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 min-h-[40px]">
                            Verifique quem pediu sua ajuda recentemente e aceite novos mentorados.
                        </p>
                        <a href="{{ route('solicitacoes.index') }}" class="inline-block w-full text-center bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-3 rounded-lg font-bold transition shadow-sm">
                            Gerenciar Pedidos
                        </a>
                    </div>

                    <!-- Card 2: Minhas Aulas e Eventos (Rosa) -->
                    <div class="bg-pink-50 dark:bg-pink-900/20 p-6 rounded-xl border border-pink-100 dark:border-pink-800 hover:shadow-md transition duration-300">
                        <div class="flex items-center mb-3">
                            <span class="text-2xl mr-3">📚</span>
                            <h3 class="text-lg font-bold text-pink-800 dark:text-pink-200">Minhas Aulas</h3>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 min-h-[40px]">
                            Gerencie materiais, links e veja a lista de presença dos seus eventos.
                        </p>
                        
                        <div class="flex gap-3">
                            <!-- Botão Principal: Gerenciar -->
                            <a href="{{ route('aulas.index') }}" class="flex-1 text-center bg-pink-600 hover:bg-pink-700 text-white px-4 py-3 rounded-lg font-bold transition shadow-sm">
                                Gerenciar Aulas
                            </a>
                            
                            <!-- Botão Secundário: Criar -->
                            <a href="{{ route('eventos.criar') }}" class="flex-none bg-white dark:bg-gray-800 text-pink-600 dark:text-pink-400 px-4 py-3 rounded-lg font-bold border border-pink-200 dark:border-pink-700 hover:bg-pink-50 dark:hover:bg-gray-700 transition" title="Criar Novo Evento">
                                +
                            </a>
                        </div>
                    </div>

                </div>
                
                <!-- Rodapé do Card: Atalho para Blog -->
                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-3">Outras Ações</h4>
                    <a href="{{ route('blog.criar') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition group">
                        <span class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg mr-3 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/50 transition">✍️</span>
                        Escrever um novo artigo para o Blog
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>