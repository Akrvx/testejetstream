<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Área da Mentora') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Olá, Mentora {{ Auth::user()->name }}! 🎓
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">Obrigada por compartilhar seu conhecimento.</p>
                    </div>
                    <a href="{{ route('completar-perfil') }}" class="text-sm bg-indigo-100 text-indigo-700 py-2 px-4 rounded-full hover:bg-indigo-200">Editar Perfil Público</a>
                </div>

                <hr class="my-6 border-gray-100 dark:border-gray-700">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Card de Solicitações -->
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-6 rounded-xl border border-yellow-100 dark:border-yellow-800">
                        <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-200 mb-2">Solicitações de Alunas</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Verifique quem pediu sua ajuda recentemente.</p>
                        <a href="{{ route('solicitacoes.index') }}" class="inline-block bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">
                            Gerenciar Pedidos
                        </a>
                    </div>

                    <!-- Card de Conteúdo -->
                    <div class="bg-pink-50 dark:bg-pink-900/20 p-6 rounded-xl border border-pink-100 dark:border-pink-800">
                        <h3 class="text-lg font-bold text-pink-800 dark:text-pink-200 mb-2">Compartilhar Conhecimento</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Escreva um artigo ou crie um evento.</p>
                        <div class="flex gap-2">
                            <a href="{{ route('blog.criar') }}" class="text-sm bg-white dark:bg-gray-700 text-pink-600 dark:text-pink-300 px-3 py-2 rounded border border-pink-200 dark:border-pink-700 hover:bg-pink-50">Escrever Artigo</a>
                            <a href="{{ route('eventos.criar') }}" class="text-sm bg-white dark:bg-gray-700 text-pink-600 dark:text-pink-300 px-3 py-2 rounded border border-pink-200 dark:border-pink-700 hover:bg-pink-50">Criar Evento</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>