@php
    $stats = [
        'total' => $permits->count(),
        'pending' => $permits->where('status', 'pending')->count(),
        'approved' => $permits->where('status', 'approved')->count(),
        'rejected' => $permits->where('status', 'rejected')->count(),
    ];
    
    $todayCount = $permits->filter(fn($p) => \Carbon\Carbon::parse($p->created_at)->isToday())->count();
    $avgProcessTime = "Instant";
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-10">
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="px-3 py-1.5 rounded-2xl bg-white text-black text-[10px] font-black uppercase tracking-[0.3em] shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                        Level 4 Access
                    </div>
                </div>
                <h2 class="text-5xl sm:text-6xl font-black text-white tracking-tighter leading-none italic">
                    Command <br>
                    <span class="text-gray-600">Validation.</span>
                </h2>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex flex-col items-end">
                    <span class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em]">Network Load</span>
                    <div class="flex gap-1 mt-2">
                        @foreach(range(1, 5) as $i)
                            <div class="w-1.5 h-4 rounded-full {{ $i <= 2 ? 'bg-emerald-500' : 'bg-white/10' }}"></div>
                        @endforeach
                    </div>
                </div>
                <div class="w-[2px] h-12 bg-white/10"></div>
                <div class="text-right">
                    <span class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em]">Encryption</span>
                    <p class="text-white font-black text-sm uppercase mt-1">AES-256 Enabled</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 space-y-12 pb-32">
        
        @include('sections.dashboard.stats')

        @if(session('success'))
            <div class="glass p-5 rounded-[2rem] border-emerald-500/20 bg-emerald-500/5 flex items-center gap-6 animate-in fade-in zoom-in duration-700">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 text-emerald-500 flex items-center justify-center shadow-[0_0_30px_rgba(16,185,129,0.2)]">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h3 class="text-white font-black text-[15px] uppercase tracking-widest">Protocol Success</h3>
                    <p class="text-emerald-500/80 text-[13px] font-bold mt-1 uppercase tracking-wider">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @include('sections.dashboard.queue')
        
    </div>
</x-app-layout>
