<x-app-layout>
    <x-slot name="header">
        <!-- Alterado de dark:text-gray-200 para dark:text-indigo-400 para combinar com o tema -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-indigo-400 leading-tight">
            {{ __('Painel Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-8 transition duration-300">
                <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-6 mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Olá, {{ Auth::user()->name }}! 👋
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">
                            Bem-vinda à nossa comunidade. Você está acessando como: 
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 capitalize">
                                {{ Auth::user()->role ?? 'Aluna' }}
                            </span>
                        </p>
                    </div>
                </div>

                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-4">O que você deseja fazer?</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <!-- Botão 1: Mentoras -->
                    <a href="{{ route('mentoras.index') }}" class="group block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md hover:border-indigo-300 dark:hover:border-indigo-500 transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-lg text-purple-600 dark:text-purple-400 group-hover:bg-purple-600 group-hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h4 class="ml-3 text-lg font-semibold text-gray-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400">Buscar Mentoria</h4>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Explore nossa lista de mulheres incríveis prontas para te ajudar.</p>
                    </a>

                    <!-- Botão 2: Perfil -->
                    <a href="{{ route('completar-perfil') }}" class="group block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md hover:border-blue-300 dark:hover:border-blue-500 transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-lg text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <h4 class="ml-3 text-lg font-semibold text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400">Editar Perfil</h4>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Mantenha sua bio, LinkedIn e área de atuação sempre atualizados.</p>
                    </a>

                    <!-- Botão 3: Eventos -->
                    <a href="{{ route('eventos.index') }}" class="group block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md hover:border-green-300 dark:hover:border-green-500 transition duration-200">
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-lg text-green-600 dark:text-green-400 group-hover:bg-green-600 group-hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h4 class="ml-3 text-lg font-semibold text-gray-800 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400">Eventos e Workshops</h4>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Inscreva-se em encontros exclusivos e aprenda ao vivo.</p>
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>