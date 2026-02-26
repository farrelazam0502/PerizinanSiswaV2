<nav x-data="{ open: false }" class="fixed top-0 w-full z-50 py-4 px-4 sm:px-6 lg:px-8 pointer-events-none">
    <div class="max-w-7xl mx-auto flex justify-center">
        <!-- Main Navigation Bar -->
        <div class="glass px-6 py-2.5 rounded-2xl flex items-center justify-between w-full shadow-[0_20px_50px_rgba(0,0,0,0.5)] pointer-events-auto transition-all duration-500 hover:border-white/20">
            <!-- Left: Branding & Links -->
            <div class="flex items-center gap-10">
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 group transition-all" title="Go to Landing Page">
                    <div class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-black font-black shadow-[0_0_20px_rgba(255,255,255,0.2)] group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <x-nav-link-modern :href="url('/')" :active="false" class="opacity-60 hover:opacity-100">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9-9c1.657 0 3 4.03 3 9s-1.343 9-3 9m0-18c-1.657 0-3 4.03-3 9s1.343 9 3 9m-9-9a9 9 0 019-9"></path></svg>
                        {{ __('View Website') }}
                    </x-nav-link-modern>

                    <div class="w-[1px] h-4 bg-white/10"></div>

                    @if(Auth::user()->is_admin)
                        <x-nav-link-modern :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">{{ __('Admin Console') }}</x-nav-link-modern>
                    @else
                        <x-nav-link-modern :href="route('student.permits.index')" :active="request()->routeIs('student.permits.index') || request()->routeIs('student.permits.create')">{{ __('Permit Station') }}</x-nav-link-modern>
                    @endif
                </div>
            </div>

            <!-- Right: Account -->
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex items-center gap-3 pr-4 border-r border-white/10 text-right">
                    <div class="flex flex-col">
                        <span class="text-[12px] font-bold text-white tracking-tight leading-none">{{ Auth::user()->name }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1">{{ Auth::user()->is_admin ? 'Authorized Admin' : 'Student Access' }}</span>
                    </div>
                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-all outline-none">
                            <div class="w-6 h-6 rounded bg-gradient-to-br from-indigo-500 to-cyan-500 text-white flex items-center justify-center text-[10px] font-black uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#0f0f0f] border border-white/10 rounded-xl shadow-3xl overflow-hidden mt-2 py-1 min-w-[200px]">
                            <x-dropdown-link :href="route('profile.edit')" class="text-[13px] font-medium text-gray-400 hover:text-white hover:bg-white/5 px-4 py-2.5 flex items-center gap-3">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                {{ __('Security Settings') }}
                            </x-dropdown-link>

                            <div class="h-[1px] bg-white/5 mx-2 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="text-[13px] font-bold text-rose-500 hover:bg-rose-500/10 px-4 py-2.5 flex items-center gap-3">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    {{ __('Sign Out System') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>

                <!-- Hamburger -->
                <button @click="open = ! open" class="md:hidden w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white transition-all">
                    <svg class="w-5 h-5 transition-transform duration-300" :class="{'rotate-90': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 8h16M4 16h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-10 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 -translate-y-10 scale-95"
         @click.away="open = false"
         class="md:hidden mt-4 mx-auto max-w-7xl px-4 pointer-events-auto">
        <div class="glass rounded-3xl p-6 shadow-[0_40px_80px_rgba(0,0,0,0.9)] border border-white/10 space-y-4">
            <div class="flex items-center gap-4 pb-6 border-b border-white/5">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-cyan-500 flex items-center justify-center text-white font-black text-lg shadow-2xl">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-[15px] font-black text-white tracking-tight">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">{{ Auth::user()->is_admin ? 'ADMINISTRATOR' : 'STUDENT TERMINAL' }}</p>
                </div>
            </div>

            <div class="space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-4 p-4 rounded-2xl text-gray-400 hover:bg-white/5 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9-9c1.657 0 3 4.03 3 9s-1.343 9-3 9m0-18c-1.657 0-3 4.03-3 9s1.343 9 3 9m-9-9a9 9 0 019-9"></path></svg>
                    <span class="text-sm font-black uppercase tracking-widest">{{ __('View Website') }}</span>
                </a>

                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black' : 'text-gray-400 hover:bg-white/5 hover:text-white' }} transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="text-sm font-black uppercase tracking-widest">{{ __('Admin Console') }}</span>
                    </a>
                @else
                    <a href="{{ route('student.permits.index') }}" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->routeIs('student.permits.index') || request()->routeIs('student.permits.create') ? 'bg-white text-black' : 'text-gray-400 hover:bg-white/5 hover:text-white' }} transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="text-sm font-black uppercase tracking-widest">{{ __('Permit Station') }}</span>
                    </a>
                @endif
                
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 p-4 rounded-2xl {{ request()->routeIs('profile.edit') ? 'bg-white text-black' : 'text-gray-400 hover:bg-white/5 hover:text-white' }} transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-sm font-black uppercase tracking-widest">{{ __('Security Settings') }}</span>
                </a>
            </div>

            <div class="pt-4 border-t border-white/5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-4 p-4 rounded-2xl text-rose-500 hover:bg-rose-500/10 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="text-sm font-black uppercase tracking-widest">{{ __('Sign Out System') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
