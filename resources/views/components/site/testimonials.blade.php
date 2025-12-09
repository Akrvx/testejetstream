<section id="depoimentos" class="py-20 bg-ellas-card relative overflow-hidden">
    <!-- Efeito de fundo -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-ellas-purple/10 rounded-full blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h5 class="font-orbitron text-center text-white/50 tracking-widest uppercase text-sm mb-2">Comunidade</h5>
        <h2 class="font-orbitron text-center text-4xl font-bold text-white mb-12">Histórias que Inspiram</h2>

        <!-- Verifica se a variável $testimonials existe e não está vazia -->
        @if(isset($testimonials) && $testimonials->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                @foreach($testimonials as $item)
                <div class="bg-ellas-dark p-8 rounded-2xl border border-ellas-nav hover:-translate-y-1 transition-transform duration-300 flex flex-col h-full">
                    <!-- Ícone de aspas -->
                    <i class="fas fa-quote-left text-3xl text-ellas-purple mb-4"></i>
                    
                    <!-- Texto do Depoimento -->
                    <p class="font-biorhyme text-gray-300 italic mb-6 flex-1">
                        "{{ $item->content }}"
                    </p>
                    
                    <!-- Rodapé do Card (Foto e Nome) -->
                    <div class="flex items-center gap-4 border-t border-ellas-nav pt-4 mt-auto">
                        @if($item->photo_url)
                            <img src="{{ $item->photo_url }}" class="w-12 h-12 rounded-full border-2 border-ellas-purple object-cover" alt="{{ $item->name }}">
                        @else
                            <!-- Placeholder com a inicial se não tiver foto -->
                            <div class="w-12 h-12 rounded-full border-2 border-ellas-purple bg-ellas-card flex items-center justify-center text-white font-bold text-lg">
                                {{ substr($item->name, 0, 1) }}
                            </div>
                        @endif
                        
                        <div>
                            <p class="font-orbitron text-white font-bold">{{ $item->name }}</p>
                            <p class="text-xs text-ellas-pink">{{ $item->role }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        @else
            <!-- Estado Vazio (Caso não tenha nada cadastrado ainda) -->
            <div class="text-center py-12 bg-ellas-dark/50 rounded-2xl border border-dashed border-ellas-nav">
                <i class="far fa-comment-dots text-4xl text-gray-600 mb-4"></i>
                <p class="font-biorhyme text-gray-400 text-lg">Em breve, compartilharemos histórias incríveis da nossa comunidade aqui.</p>
            </div>
        @endif
    </div>
</section>