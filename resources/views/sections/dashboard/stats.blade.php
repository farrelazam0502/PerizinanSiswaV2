        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $metrics = [
                    ['label' => 'Total Transactions', 'val' => $stats['total'], 'trend' => 'Cumulative', 'color' => 'white'],
                    ['label' => 'Awaiting Protocol', 'val' => $stats['pending'], 'trend' => $todayCount . ' Today', 'color' => 'amber-500'],
                    ['label' => 'Verified Passes', 'val' => $stats['approved'], 'trend' => 'Institutional', 'color' => 'emerald-500'],
                    ['label' => 'Restricted Logs', 'val' => $stats['rejected'], 'trend' => 'Security', 'color' => 'rose-500'],
                ];
            @endphp

            @foreach($metrics as $m)
                <div class="glass p-8 rounded-[3rem] relative group overflow-hidden transition-all duration-700 hover:border-white/20">
                    <div class="absolute -right-4 -bottom-4 opacity-[0.03] transform rotate-12 group-hover:rotate-0 transition-all duration-1000">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    </div>
                    <div class="relative z-10 space-y-8">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-black text-gray-500 uppercase tracking-[0.3em]">{{ $m['label'] }}</span>
                            <span class="text-[10px] font-bold text-{{ $m['color'] }} uppercase tracking-widest">{{ $m['trend'] }}</span>
                        </div>
                        <h4 class="text-5xl font-black text-white tracking-tighter">{{ $m['val'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
