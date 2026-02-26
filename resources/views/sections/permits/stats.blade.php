        <!-- Stats with Depth -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $metrics = [
                    ['label' => 'Historical Logs', 'val' => $stats['total'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'white'], 
                    ['label' => 'In Validation', 'val' => $stats['pending'], 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'blue-500'],
                    ['label' => 'Success Rate', 'val' => ($stats['total'] > 0 ? round(($stats['approved']/$stats['total'])*100) : 0) . '%', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'emerald-500'],
                    ['label' => 'Security Rejection', 'val' => $stats['rejected'], 'icon' => 'M6 18L18 6M6 6l12 12', 'color' => 'rose-500']
                ];
            @endphp

            @foreach($metrics as $m)
                <div class="glass p-7 rounded-[2.5rem] relative group overflow-hidden hover:border-white/20 transition-all duration-500">
                    <div class="relative z-10">
                        <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">{{ $m['label'] }}</span>
                        <div class="flex items-center gap-4 mt-6">
                            <h4 class="text-4xl font-black text-white tracking-tighter">{{ $m['val'] }}</h4>
                            <div class="w-10 h-10 rounded-2xl bg-{{ $m['color'] }}/10 border border-{{ $m['color'] }}/20 flex items-center justify-center text-{{ $m['color'] }} group-hover:scale-110 transition-transform duration-500 shadow-[0_0_20px_rgba(var(--{{ $m['color'] }}),0.1)]">
                                <svg class="w-5 h-5 text-{{ $m['color'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="{{ $m['icon'] }}"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
