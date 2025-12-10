<x-guest-layout>
    <div class="flex min-h-screen bg-ellas-dark">
        
        <!-- LADO ESQUERDO: Formulário -->
        <div class="w-full md:w-1/2 flex flex-col justify-center px-8 md:px-16 lg:px-24 py-12 relative z-10">
            
            <!-- Botão Voltar (Canto Superior) -->
            <div class="absolute top-8 left-8">
                <a href="/" class="text-gray-400 hover:text-white flex items-center text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Voltar
                </a>
            </div>

            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-orbitron font-bold text-transparent bg-clip-text bg-gradient-to-r from-ellas-purple to-ellas-pink mb-2">
                    Projeto ELLAS
                </h1>
                <h2 class="text-2xl font-bold text-white mb-2">Bem-vinda de volta!</h2>
                <p class="text-gray-400 text-sm font-biorhyme">Insira seus dados para acessar sua conta.</p>
            </div>

            <!-- Abas de Login/Cadastro (Visual) -->
            <div class="flex gap-6 mb-8 border-b border-gray-700 pb-1">
                <a href="{{ route('login') }}" class="text-ellas-pink font-bold border-b-2 border-ellas-pink pb-1">Login</a>
                <a href="{{ route('register') }}" class="text-gray-500 hover:text-white transition">Cadastro</a>
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label class="block font-medium text-sm text-gray-300 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-ellas-purple" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input id="email" class="block w-full pl-10 bg-transparent border border-ellas-purple/50 rounded-lg text-white focus:border-ellas-pink focus:ring focus:ring-ellas-pink/20 py-3 transition" type="email" name="email" :value="old('email')" required autofocus placeholder="seu@email.com" />
                    </div>
                </div>

                <div class="mt-4">
                    <div class="flex justify-between items-center mb-1">
                        <label class="block font-medium text-sm text-gray-300">Senha</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-ellas-cyan hover:text-white transition" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-ellas-purple" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input id="password" class="block w-full pl-10 bg-transparent border border-ellas-purple/50 rounded-lg text-white focus:border-ellas-pink focus:ring focus:ring-ellas-pink/20 py-3 transition" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    </div>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center cursor-pointer">
                        <x-checkbox id="remember_me" name="remember" class="bg-transparent border-gray-600 text-ellas-pink focus:ring-ellas-pink" />
                        <span class="ml-2 text-sm text-gray-400">{{ __('Lembrar de mim') }}</span>
                    </label>
                </div>

                <div class="mt-8">
                    <button class="w-full py-3 px-4 bg-gradient-to-r from-ellas-purple to-ellas-pink text-white font-bold rounded-lg shadow-[0_0_20px_rgba(236,72,153,0.5)] hover:shadow-[0_0_30px_rgba(236,72,153,0.7)] hover:scale-[1.02] transition-all transform uppercase tracking-wider font-orbitron">
                        {{ __('Acessar Conta ->') }}
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-xs text-gray-600">© {{ date('Y') }} Conectada com Ellas.</p>
            </div>
        </div>

        <!-- LADO DIREITO: Imagem -->
        <div class="hidden md:block md:w-1/2 relative">
            <div class="absolute inset-0 bg-gradient-to-l from-transparent to-ellas-dark"></div>
            <!-- Certifique-se que o caminho está 'img' minúsculo -->
            <img src="{{ asset('img/página de login.jpg') }}" alt="Login" class="w-full h-full object-cover">
        </div>

    </div>
</x-guest-layout>