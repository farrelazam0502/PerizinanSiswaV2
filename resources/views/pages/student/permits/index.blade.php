@php
    $stats = [
        'total' => $permits->count(),
        'pending' => $permits->where('status', 'pending')->count(),
        'approved' => $permits->where('status', 'approved')->count(),
        'rejected' => $permits->where('status', 'rejected')->count(),
    ];
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] animate-pulse">
                        Sistem Validasi Aktif
                    </div>
                </div>
                <h2 class="text-4xl sm:text-5xl font-black text-white tracking-tighter leading-none">
                    Overview <br>
                    <span class="text-gray-500">Permit Station.</span>
                </h2>
            </div>
            
            <a href="{{ route('student.permits.create') }}" class="group relative px-8 py-4 bg-white text-black hover:bg-neutral-200 rounded-2xl transition-all duration-300 font-black text-sm uppercase tracking-widest shadow-[0_20px_40px_rgba(255,255,255,0.1)] flex items-center gap-3 active:scale-95">
                <svg class="w-5 h-5 transition-transform group-hover:rotate-90 duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> 
                <span>Submit New Ticket</span>
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 space-y-10 pb-20">
        
        @include('sections.permits.stats')

        @include('sections.permits.list')
        
    </div>
</x-app-layout>
