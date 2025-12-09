<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Administração do Sistema') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Resumo Rápido -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border-l-4 border-indigo-500 transition duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Total de Usuários</div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ \App\Models\User::count() }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border-l-4 border-green-500 transition duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Eventos Ativos</div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ \App\Models\Event::where('data_hora', '>=', now())->count() }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border-l-4 border-pink-500 transition duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Histórias Publicadas</div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ \App\Models\Story::count() }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border-l-4 border-yellow-500 transition duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Mentorias Pendentes</div>
                    <div class="text-2xl font-bold text-gray-800 dark:text-white">{{ \App\Models\Solicitacao::where('status', 'pendente')->count() }}</div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 transition duration-300">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Ações Rápidas</h3>
                
                <!-- Ajustei para grid-cols-5 para caberem todos na mesma linha em telas grandes -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <a href="{{ route('eventos.criar') }}" class="p-4 border border-gray-200 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-700 text-center transition group">
                        <span class="block text-2xl mb-2 group-hover:scale-110 transition-transform">📅</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Novo Evento</span>
                    </a>
                    
                    <a href="{{ route('blog.criar') }}" class="p-4 border border-gray-200 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-700 text-center transition group">
                        <span class="block text-2xl mb-2 group-hover:scale-110 transition-transform">✍️</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Nova História</span>
                    </a>
                    
                    <a href="{{ route('mentoras.index') }}" class="p-4 border border-gray-200 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-700 text-center transition group">
                        <span class="block text-2xl mb-2 group-hover:scale-110 transition-transform">👥</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Ver Usuários</span>
                    </a>
                    
                    <a href="{{ route('admin.aprovar') }}" class="p-4 border border-gray-200 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-700 text-center transition group">
                        <span class="block text-2xl mb-2 group-hover:scale-110 transition-transform">✅</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Aprovar Mentoras</span>
                    </a>

                    <!-- NOVO BOTÃO ADICIONADO AQUI -->
                    <a href="{{ route('admin.depoimentos') }}" class="p-4 border border-gray-200 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-700 text-center transition group">
                        <span class="block text-2xl mb-2 group-hover:scale-110 transition-transform">💬</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">Depoimentos</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>