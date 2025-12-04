<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Solicitações de Mentoria</h2>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg transition duration-300">
            
            @if($solicitacoes->isEmpty())
                <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                    Você ainda não tem solicitações de mentoria.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aluna</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($solicitacoes as $pedido)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $pedido->aluna->name }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $pedido->aluna->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $pedido->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pedido->status === 'pendente')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                            Pendente
                                        </span>
                                    @elseif($pedido->status === 'aceito')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                            Aceito
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                            Recusado
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if($pedido->status === 'pendente')
                                        <button wire:click="aceitar({{ $pedido->id }})" class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300 mr-3 font-bold transition">Aceitar</button>
                                        <button wire:click="recusar({{ $pedido->id }})" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 transition">Recusar</button>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500">Respondido</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>