<nav x-data="{ open: false }"
     class="bg-[#101010] border-b border-gray-800">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="bg-[#C90024] px-3 py-2 rounded-lg">
                        <span class="text-white font-black text-xl italic">PC</span>
                    </div>

                    <div>
                        <div class="text-white font-extrabold tracking-wider text-lg">
                            PORSCHE CUP
                        </div>
                        <div class="text-red-500 text-xs tracking-[3px] font-bold">
                            MANAGEMENT SYSTEM
                        </div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden sm:flex items-center gap-6">

                <a href="{{ route('dashboard') }}"
                   class="font-semibold transition {{ request()->routeIs('dashboard') ? 'text-red-500' : 'text-gray-300 hover:text-red-500' }}">
                    Dashboard
                </a>

                <a href="{{ route('cars.index') }}"
                   class="font-semibold transition {{ request()->routeIs('cars.*') ? 'text-red-500' : 'text-gray-300 hover:text-red-500' }}">
                    Cars
                </a>

                <a href="{{ route('drivers.index') }}"
                   class="font-semibold transition {{ request()->routeIs('drivers.*') ? 'text-red-500' : 'text-gray-300 hover:text-red-500' }}">
                    Drivers
                </a>

                <a href="{{ route('teams.index') }}"
                   class="font-semibold transition {{ request()->routeIs('teams.*') ? 'text-red-500' : 'text-gray-300 hover:text-red-500' }}">
                    Teams
                </a>

                <!-- Circuits -->
                <a href="{{ route('circuits.index') }}"
                   class="font-semibold transition {{ request()->routeIs('circuits.*') ? 'text-red-500' : 'text-gray-300 hover:text-red-500' }}">
                    Circuits
                </a>

            </div>

            <!-- Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 px-4 py-2 rounded-lg bg-[#252525] hover:bg-[#303030] transition">

                            <div class="w-9 h-9 rounded-full bg-red-700 flex items-center justify-center font-bold text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div class="text-left">
                                <div class="text-sm font-bold text-white">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-xs text-gray-400">
                                    Administrator
                                </div>
                            </div>

                            <svg class="w-4 h-4 text-gray-400"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>

                </x-dropdown>
            </div>

            <!-- Mobile Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="text-gray-300 hover:text-red-500">

                    <svg class="w-7 h-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path x-show="!open"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>

                        <path x-show="open"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open"
         x-transition
         class="sm:hidden bg-[#181818] border-t border-gray-800">

        <div class="px-4 py-4 space-y-3">

            <a href="{{ route('dashboard') }}"
               class="block py-2 font-semibold {{ request()->routeIs('dashboard') ? 'text-red-500' : 'text-gray-300' }}">
                Dashboard
            </a>

            <a href="{{ route('cars.index') }}"
               class="block py-2 font-semibold {{ request()->routeIs('cars.*') ? 'text-red-500' : 'text-gray-300' }}">
                Cars
            </a>

            <a href="{{ route('drivers.index') }}"
               class="block py-2 font-semibold {{ request()->routeIs('drivers.*') ? 'text-red-500' : 'text-gray-300' }}">
                Drivers
            </a>

            <a href="{{ route('teams.index') }}"
               class="block py-2 font-semibold {{ request()->routeIs('teams.*') ? 'text-red-500' : 'text-gray-300' }}">
                Teams
            </a>

            <a href="{{ route('circuits.index') }}"
               class="block py-2 font-semibold {{ request()->routeIs('circuits.*') ? 'text-red-500' : 'text-gray-300' }}">
                Circuits
            </a>

            <a href="{{ route('profile.edit') }}"
               class="block py-2 font-semibold text-gray-300">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="text-red-500 font-semibold py-2">
                    Logout
                </button>
            </form>

        </div>
    </div>

</nav>