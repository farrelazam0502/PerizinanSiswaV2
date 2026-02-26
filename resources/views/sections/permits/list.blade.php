        <!-- History Table with Premium Design -->
        <div class="glass rounded-[3rem] overflow-hidden shadow-[0_40px_100px_rgba(0,0,0,0.8)] border border-white/5">
            <div class="px-10 py-10 flex items-center justify-between border-b border-white/5 bg-white/[0.01]">
                <div>
                    <h3 class="text-2xl font-black text-white tracking-tight">Active Stream</h3>
                    <p class="text-gray-500 font-bold text-[12px] uppercase tracking-widest mt-1">Live Permit Transaction Logs</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-white">
                    <svg class="w-6 h-6 animate-spin-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-600 uppercase tracking-[0.3em] bg-white/[0.01]">
                            <th class="px-10 py-6 text-left">Timeline Protocol</th>
                            <th class="px-10 py-6 text-left">Data Information</th>
                            <th class="px-10 py-6 text-center">Validation State</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.03]">
                        @forelse($permits as $permit)
                            <tr class="group hover:bg-white/[0.01] transition-all">
                                <td class="px-10 py-8">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-3">
                                            <div class="w-2 h-2 rounded-full bg-indigo-500 shadow-[0_0_10px_#6366f1]"></div>
                                            <span class="text-[16px] font-black text-white tracking-tight">{{ \Carbon\Carbon::parse($permit->start_date)->format('M d') }}</span>
                                            <svg class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                            <span class="text-[16px] font-black text-white tracking-tight">{{ \Carbon\Carbon::parse($permit->end_date)->format('M d') }}</span>
                                        </div>
                                        <span class="text-[11px] text-gray-600 font-black uppercase tracking-widest pl-5">{{ \Carbon\Carbon::parse($permit->created_at)->diffForHumans() }}</span>
                                    </div>
                                </td>
                                <td class="px-10 py-8">
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-2">
                                            @if($permit->type == 'Sakit')
                                                <span class="px-3 py-1 rounded-xl bg-blue-500/10 border border-blue-500/20 text-[10px] font-black text-blue-400 uppercase tracking-[0.2em] shadow-[0_0_15px_rgba(59,130,246,0.1)]">Medical Pass</span>
                                            @else
                                                <span class="px-3 py-1 rounded-xl bg-purple-500/10 border border-purple-500/20 text-[10px] font-black text-purple-400 uppercase tracking-[0.2em] shadow-[0_0_15px_rgba(168,85,247,0.1)]">Institutional Pass</span>
                                            @endif
                                            <span class="w-1.5 h-1.5 rounded-full bg-white/10"></span>
                                            <span class="text-[11px] text-gray-400 font-bold uppercase tracking-widest">ID: #{{ str_pad($permit->id, 4, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                        <p class="text-[14px] text-gray-400 font-medium leading-relaxed max-w-md line-clamp-2 italic group-hover:text-white transition-colors duration-500">
                                            "{{ $permit->reason }}"
                                        </p>
                                    </div>
                                </td>
                                <td class="px-10 py-8 text-center">
                                    @if($permit->status == 'pending')
                                        <div class="flex items-center justify-center gap-4">
                                            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-2xl bg-amber-500/5 border border-amber-500/10 text-[11px] font-black text-amber-500 tracking-widest uppercase">
                                                <span class="relative w-2 h-2">
                                                    <span class="animate-ping absolute inset-0 rounded-full bg-amber-400 opacity-75"></span>
                                                    <span class="relative inline-block w-2 h-2 rounded-full bg-amber-500"></span>
                                                </span>
                                                In Validation
                                            </div>

                                            <!-- Cancel Button -->
                                            <form action="{{ route('student.permits.destroy', $permit) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan permohonan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-10 h-10 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-500 flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all duration-300 shadow-lg group/cancel" title="Cancel Request">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    @elseif($permit->status == 'approved')
                                        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-2xl bg-emerald-500/5 border border-emerald-500/10 text-[11px] font-black text-emerald-500 tracking-widest uppercase">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path></svg>
                                            Authorized
                                        </div>
                                    @else
                                        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-2xl bg-rose-500/5 border border-rose-500/10 text-[11px] font-black text-rose-500 tracking-widest uppercase">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            Restricted
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-10 py-32 text-center">
                                    <div class="w-24 h-24 mx-auto mb-8 bg-white/5 rounded-[2rem] border border-white/10 flex items-center justify-center text-gray-700 shadow-2xl overflow-hidden relative group">
                                         <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/10 to-transparent"></div>
                                         <svg class="w-10 h-10 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    </div>
                                    <h4 class="text-3xl font-black text-white tracking-tighter mb-2 italic">Database Clear.</h4>
                                    <p class="text-gray-500 text-sm font-bold uppercase tracking-widest max-w-sm mx-auto">Vault is currently empty. Start submitting requests.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
