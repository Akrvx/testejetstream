<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-ellas-card/90 backdrop-blur-md border-b border-ellas-nav shadow-lg shadow-black/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="font-orbitron font-bold text-2xl tracking-wider text-white hover:scale-105 transition-transform">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="font-orbitron text-white hover:text-ellas-cyan">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('completar-perfil') }}" :active="request()->routeIs('completar-perfil')" class="font-orbitron text-white hover:text-ellas-cyan">
                        {{ __('Meu Perfil') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('blog.index') }}" :active="request()->routeIs('blog.*')" class="font-orbitron text-white hover:text-ellas-cyan">
                        {{ __('Histórias') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('eventos.index') }}" :active="request()->routeIs('eventos.*')" class="font-orbitron text-white hover:text-ellas-cyan">
                        {{ __('Eventos') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('candidaturas.index') }}" :active="request()->routeIs('candidaturas.index')" class="font-orbitron text-white hover:text-ellas-cyan">
                        {{ __('Minhas Inscrições') }}
                    </x-nav-link>

                    @if(Auth::user()->role === 'mentora' || Auth::user()->role === 'admin')
                        <x-nav-link href="{{ route('solicitacoes.index') }}" :active="request()->routeIs('solicitacoes.index')" class="font-orbitron text-ellas-pink font-bold hover:text-ellas-purple">
                            {{ __('Gerenciar Pedidos') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6 gap-4">
                
                 <div class="flex items-center">
                    <button type="button" class="text-gray-400 hover:text-white focus:outline-none transition"
                        x-data="{ isDark: localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
                        @click="isDark = !isDark; if (isDark) { document.documentElement.classList.add('dark'); localStorage.setItem('color-theme', 'dark'); } else { document.documentElement.classList.remove('dark'); localStorage.setItem('color-theme', 'light'); }">
                        <svg x-show="!isDark" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg x-show="isDark" style="display: none;" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->role != 'aluna')
                    <div class="relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-ellas-card hover:bg-white/10 transition">
                                        {{ Auth::user()->currentTeam ? Auth::user()->currentTeam->name : 'Sem Time' }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4 text-ellas-cyan" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60 bg-ellas-card border border-ellas-nav rounded-md">
                                    <div class="block px-4 py-2 text-xs text-gray-400 font-orbitron">
                                        {{ __('Gerenciar Time') }}
                                    </div>
                                    @if(Auth::user()->currentTeam)
                                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="text-white hover:bg-ellas-nav hover:text-ellas-pink">
                                            {{ __('Configurações') }}
                                        </x-dropdown-link>
                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}" class="text-white hover:bg-ellas-nav hover:text-ellas-pink">
                                                {{ __('Criar Novo Time') }}
                                            </x-dropdown-link>
                                        @endcan
                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-ellas-nav"></div>
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Trocar Time') }}
                                            </div>
                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" />
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-ellas-purple rounded-full focus:outline-none focus:border-ellas-cyan transition shadow-[0_0_10px_rgba(165,4,170,0.5)]">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-ellas-card hover:bg-white/10 transition">
                                        {{ Auth::user()->name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4 text-ellas-cyan" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400 font-orbitron">
                                {{ __('Minha Conta') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}" class="text-white hover:bg-ellas-nav hover:text-ellas-pink">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}" class="text-white hover:bg-ellas-nav hover:text-ellas-pink">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif
                            <div class="border-t border-ellas-nav"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-red-400 hover:bg-ellas-nav hover:text-red-300">
                                    {{ __('Sair') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-ellas-nav focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-ellas-card border-t border-ellas-nav">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white hover:text-ellas-cyan border-l-4 border-transparent hover:border-ellas-pink hover:bg-ellas-nav">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('completar-perfil') }}" :active="request()->routeIs('completar-perfil')" class="text-white hover:text-ellas-cyan border-l-4 border-transparent hover:border-ellas-pink hover:bg-ellas-nav">
                {{ __('Meu Perfil') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('blog.index') }}" :active="request()->routeIs('blog.*')" class="text-white hover:text-ellas-cyan border-l-4 border-transparent hover:border-ellas-pink hover:bg-ellas-nav">
                {{ __('Histórias') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('eventos.index') }}" :active="request()->routeIs('eventos.*')" class="text-white hover:text-ellas-cyan border-l-4 border-transparent hover:border-ellas-pink hover:bg-ellas-nav">
                {{ __('Eventos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('candidaturas.index') }}" :active="request()->routeIs('candidaturas.index')" class="text-white hover:text-ellas-cyan border-l-4 border-transparent hover:border-ellas-pink hover:bg-ellas-nav">
                {{ __('Minhas Inscrições') }}
            </x-responsive-nav-link>

             @if(Auth::user()->role === 'mentora' || Auth::user()->role === 'admin')
                <x-responsive-nav-link href="{{ route('solicitacoes.index') }}" :active="request()->routeIs('solicitacoes.index')" class="text-ellas-pink font-bold hover:bg-ellas-nav">
                    {{ __('Gerenciar Pedidos') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-ellas-nav bg-ellas-dark">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover border border-ellas-purple" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
                <div>
                    <div class="font-medium text-base text-white font-orbitron">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400 font-biorhyme">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" class="text-gray-300 hover:text-ellas-cyan hover:bg-ellas-nav">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-red-400 hover:text-red-300 hover:bg-ellas-nav">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>