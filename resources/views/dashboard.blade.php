<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-white tracking-tight leading-none mb-1">
            {{ __('Overview') }}
        </h2>
        <span class="text-[11px] text-gray-500 uppercase tracking-widest font-medium mt-1">System Connected</span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a0a] rounded-2xl overflow-hidden border border-[#222] shadow-sm relative">

                <div class="p-8 md:p-12 relative z-10 flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-10">
                    
                    <div class="w-24 h-24 rounded-full bg-[#111] border border-[#333] flex items-center justify-center shrink-0 overflow-hidden relative group">
                        <span class="text-3xl font-bold text-white group-hover:text-gray-300 transition-colors">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>

                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold text-white mb-2 tracking-tight">Welcome back, {{ Auth::user()->name }}.</h3>
                        <p class="text-gray-400 text-sm leading-relaxed max-w-2xl mb-6">You have successfully authenticated into the SMKTI Airlangga Central Permit Portal. Use the navigation to submit new requests, monitor ongoing approvals, and manage your administrative tasks securely.</p>
                        
                        <div class="flex items-center gap-4">
                            @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-white text-black hover:bg-gray-200 font-medium text-sm rounded-md transition-colors focus:ring-2 focus:ring-white/20 focus:outline-none">
                                Open Admin Console
                            </a>
                            @else
                            <a href="{{ route('permits.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-white text-black hover:bg-gray-200 font-medium text-sm rounded-md transition-colors focus:ring-2 focus:ring-white/20 focus:outline-none">
                                View My Documents
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
