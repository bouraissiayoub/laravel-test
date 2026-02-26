<nav x-data="{ open: false }" class="border-b border-gray-200 bg-white/80 backdrop-blur">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center gap-8">
                <a href="{{ route('properties.index') }}" class="flex items-center gap-2">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-900" />
                    <span class="hidden sm:block font-semibold tracking-tight text-gray-900">
                        Gestion des réservations
                    </span>
                </a>

                <div class="hidden sm:flex items-center gap-6">
                    <a href="{{ route('properties.index') }}"
                       class="{{ request()->routeIs('properties.index') ? 'text-gray-900' : 'text-gray-600 hover:text-gray-900' }} text-sm font-medium">
                        Biens
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="{{ request()->routeIs('dashboard') ? 'text-gray-900' : 'text-gray-600 hover:text-gray-900' }} text-sm font-medium">
                            Tableau de bord
                        </a>

                        <a href="{{ url('/admin') }}"
                           class="text-sm font-medium text-gray-600 hover:text-gray-900">
                            Admin
                        </a>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                <span class="max-w-[160px] truncate">{{ auth()->user()?->name }}</span>
                                <svg class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 text-sm text-gray-600">
                                {{ auth()->user()?->email }}
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">
                                Mon profil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Déconnexion
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-sm font-semibold text-white bg-gray-900 hover:bg-gray-800 px-4 py-2 rounded-lg">
                        Inscription
                    </a>
                @endauth
            </div>

            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" x-transition class="sm:hidden pb-4">
            <div class="pt-2 space-y-1">
                <a href="{{ route('properties.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                    Biens
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                        Tableau de bord      
                    </a>

                    <a href="{{ url('/admin') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                        Admin         
                    </a> 

                    <div class="px-3 pt-2 text-sm text-gray-500">
                        {{ auth()->user()?->email }}
                    </div>

                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                        Mon profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="px-3">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                        Inscription
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>