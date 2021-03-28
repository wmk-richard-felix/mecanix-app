<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 nav-mecanix">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center div-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('/img/logo_horizontal.png') }}" class="d-block img-logo" id="logo" alt="Logo Mecanix">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('')" class="item-menu">
                        {{ __('Buscar profissionais') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('diagnostico') }}" :active="request()->routeIs('diagnostico')" class="item-menu">
                        {{ __('Diagnóstico') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('')" class="item-menu">
                        {{ __('Sobre nós') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('cadastrar-oficina') }}" :active="request()->routeIs('cadastrar-oficina')" class="item-menu">
                        {{ __('Seja um profissional') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 botao-perfil">

                                        <i data-feather="user"></i>

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            @auth
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Minha conta') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('dashboard') }}">
                                    {{ __('Meus Orçamentos') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-jet-dropdown-link>
                                </form>
                            @else
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Autenticação') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('login') }}">
                                    {{ __('Entrar') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('register') }}">
                                    {{ __('Cadastrar') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>
                            @endauth
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden menu-mobile">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ url('/') }}" :active="request()->routeIs('inicio')">
                {{ __('Início') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('')" class="item-menu">
                {{ __('Buscar profissionais') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('diagnostico') }}" :active="request()->routeIs('diagnostico')" class="item-menu">
                {{ __('Diagnóstico') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('')" class="item-menu">
                {{ __('Sobre nós') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('cadastrar-oficina') }}" :active="request()->routeIs('cadastrar-oficina')" class="item-menu">
                {{ __('Seja um profissional') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                    </div>
                @endif

                <div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                @auth
                    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Meus Orçamentos') }}
                    </x-jet-responsive-nav-link>
                    
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Perfil') }}
                    </x-jet-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-jet-responsive-nav-link>
                    </form>
                @else
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Entrar') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Cadastrar') }}
                    </x-jet-responsive-nav-link>
                @endauth
            </div>
        </div>
    </div>
</nav>
