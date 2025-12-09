<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Gestão de Usuários</h2>

        <!-- Mensagem de Sucesso -->
        @if (session()->has('message'))
            <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded relative mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg transition duration-300">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nome / Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Perfil Profissional</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Data Cadastro</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($candidatas as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 dark:text-white font-bold">{{ $user->area_atuacao ?? 'Não informado' }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs" title="{{ $user->bio }}">
                                    {{ $user->bio ?? 'Sem biografia.' }}
                                </div>
                                @if($user->linkedin_url)
                                    <a href="{{ $user->linkedin_url }}" target="_blank" class="text-blue-600 dark:text-blue-400 text-xs hover:underline mt-1 block">Ver LinkedIn</a>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button 
                                    wire:click="aprovar({{ $user->id }})"
                                    onclick="confirm('Tem certeza que deseja tornar essa usuária uma Mentora?') || event.stopImmediatePropagation()"
                                    class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-white font-bold bg-indigo-50 dark:bg-indigo-900/50 px-3 py-2 rounded transition"
                                >
                                    Promover a Mentora
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Paginação -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                {{ $candidatas->links() }} 
            </div>
        </div>
    </div>
</div>