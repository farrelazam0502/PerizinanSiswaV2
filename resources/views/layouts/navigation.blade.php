<nav x-data="{ open: false }" class="bg-black border-b border-[#111]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group transition-opacity hover:opacity-80">
                        <div class="w-7 h-7 rounded border border-white/20 bg-white/10 flex items-center justify-center text-white font-bold text-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div class="font-semibold text-white tracking-tight hidden sm:block text-[15px]">SMKTI<span class="text-gray-500 ml-1">Portal</span></div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400 hover:text-white transition-colors text-[14px]">
                        {{ __('Overview') }}
                    </x-nav-link>

                    @if(Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-gray-400 hover:text-white transition-colors text-[14px]">
                            {{ __('Permits') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('student.permits.index')" :active="request()->routeIs('student.permits.index') || request()->routeIs('student.permits.create')" class="text-gray-400 hover:text-white transition-colors text-[14px]">
                            {{ __('My Permits') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-full bg-white text-black flex items-center justify-center font-bold text-[10px] uppercase">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-[13px] font-medium">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#0a0a0a] border border-[#222] rounded-md shadow-2xl overflow-hidden mt-1 py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="text-[13px] text-gray-300 hover:bg-[#1a1a1a] hover:text-white focus:bg-[#1a1a1a]">
                                {{ __('Profile Settings') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-[13px] text-gray-400 hover:bg-[#1a1a1a] hover:text-white focus:bg-[#1a1a1a]">
                                    {{ __('Log out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-[#111] focus:outline-none focus:bg-[#111] focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0a0a0a] border-b border-[#222]">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400 hover:text-white text-sm">
                {{ __('Overview') }}
            </x-responsive-nav-link>

            @if(Auth::user()->is_admin)
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-gray-400 hover:text-white text-sm">
                    {{ __('Permits') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('student.permits.index')" :active="request()->routeIs('student.permits.index') || request()->routeIs('student.permits.create')" class="text-gray-400 hover:text-white text-sm">
                    {{ __('My Permits') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#222]">
            <div class="px-4 py-2">
                <div class="font-medium text-sm text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-[13px] text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-400 hover:text-white hover:bg-[#111] text-sm">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-gray-400 hover:text-white hover:bg-[#111] text-sm">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
