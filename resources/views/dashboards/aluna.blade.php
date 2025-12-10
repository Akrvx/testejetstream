<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Painel da Aluna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8 transition duration-300">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                    Olá, {{ Auth::user()->name }}! 🚀
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mb-8">
                    Bem-vinda de volta. Organize seus estudos e conecte-se.
                </p>

                <!-- Grid de Ações (Agora com 4 itens: 2 colunas em telas médias, 4 em grandes) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- 1. Minha Agenda (NOVO DESTAQUE) -->
                    <a href="{{ route('agenda.index') }}" class="block p-6 bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-100 dark:border-indigo-800 rounded-xl hover:shadow-md hover:scale-[1.02] transition transform">
                        <div class="text-indigo-600 dark:text-indigo-400 mb-3 text-3xl">🗓️</div>
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white">Minha Agenda</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Veja suas aulas e mentorias confirmadas.</p>
                    </a>

                    <!-- 2. Encontrar Mentora -->
                    <a href="{{ route('mentoras.index') }}" class="block p-6 bg-purple-50 dark:bg-purple-900/20 border border-purple-100 dark:border-purple-800 rounded-xl hover:shadow-md hover:scale-[1.02] transition transform">
                        <div class="text-purple-600 dark:text-purple-400 mb-3 text-3xl">👩‍🏫</div>
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white">Buscar Mentora</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Encontre profissionais para te orientar.</p>
                    </a>

                    <!-- 3. Eventos -->
                    <a href="{{ route('eventos.index') }}" class="block p-6 bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 rounded-xl hover:shadow-md hover:scale-[1.02] transition transform">
                        <div class="text-green-600 dark:text-green-400 mb-3 text-3xl">🚀</div>
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white">Workshops</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Inscreva-se em eventos ao vivo.</p>
                    </a>

                    <!-- 4. Histórias -->
                    <a href="{{ route('blog.index') }}" class="block p-6 bg-pink-50 dark:bg-pink-900/20 border border-pink-100 dark:border-pink-800 rounded-xl hover:shadow-md hover:scale-[1.02] transition transform">
                        <div class="text-pink-600 dark:text-pink-400 mb-3 text-3xl">✨</div>
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white">Ler Histórias</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Inspire-se com trajetórias reais.</p>
                    </a>

                </div>
                
                <!-- Links Úteis Secundários -->
                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row gap-6">
                    <a href="{{ route('candidaturas.index') }}" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 text-sm font-medium transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        Histórico de Solicitações
                    </a>
                    
                    <a href="{{ route('completar-perfil') }}" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 text-sm font-medium transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Atualizar meu Perfil
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>