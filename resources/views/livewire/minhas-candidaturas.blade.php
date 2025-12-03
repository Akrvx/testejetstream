<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Minhas Solicitações de Mentoria</h2>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            @if($candidaturas->isEmpty())
                <div class="p-6 text-center text-gray-500">
                    Você ainda não solicitou nenhuma mentoria. 
                    <a href="{{ route('mentoras.index') }}" class="text-indigo-600 font-bold hover:underline">Buscar Mentora</a>
                </div>
            @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mentora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data do Pedido</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Contato</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($candidaturas as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $item->mentora->profile_photo_url }}" alt="" />
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->mentora->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $item->mentora->area_atuacao }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->status === 'pendente')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Aguardando
                                    </span>
                                @elseif($item->status === 'aceito')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Aceito! 🎉
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Não foi possível
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @if($item->status === 'aceito')
                                    <a href="mailto:{{ $item->mentora->email }}" class="text-indigo-600 hover:text-indigo-900 font-bold bg-indigo-50 px-3 py-1 rounded">
                                        📧 Enviar E-mail
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs">Disponível após aceite</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>