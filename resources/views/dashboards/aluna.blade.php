<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Painel da Aluna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                    Olá, {{ Auth::user()->name }}! 🚀
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Bem-vinda de volta. O que você quer aprender hoje?
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Botão Mentoras -->
                    <a href="{{ route('mentoras.index') }}" class="block p-6 bg-purple-50 dark:bg-purple-900/20 border border-purple-100 dark:border-purple-800 rounded-xl hover:shadow-md transition">
                        <div class="text-purple-600 dark:text-purple-400 mb-2 text-2xl">👩‍🏫</div>
                        <h3 class="font-bold text-gray-800 dark:text-white">Encontrar Mentora</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Busque orientação profissional.</p>
                    </a>

                    <!-- Botão Eventos -->
                    <a href="{{ route('eventos.index') }}" class="block p-6 bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 rounded-xl hover:shadow-md transition">
                        <div class="text-green-600 dark:text-green-400 mb-2 text-2xl">📅</div>
                        <h3 class="font-bold text-gray-800 dark:text-white">Eventos e Workshops</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Inscreva-se nas próximas aulas.</p>
                    </a>

                    <!-- Botão Histórias -->
                    <a href="{{ route('blog.index') }}" class="block p-6 bg-pink-50 dark:bg-pink-900/20 border border-pink-100 dark:border-pink-800 rounded-xl hover:shadow-md transition">
                        <div class="text-pink-600 dark:text-pink-400 mb-2 text-2xl">✨</div>
                        <h3 class="font-bold text-gray-800 dark:text-white">Ler Histórias</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Inspire-se com trajetórias reais.</p>
                    </a>
                </div>
                
                <!-- Atalho para inscrições -->
                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-4">Suas Atividades Recentes</h4>
                    <a href="{{ route('candidaturas.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline text-sm">Ver minhas solicitações de mentoria &rarr;</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>