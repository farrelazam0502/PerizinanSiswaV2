        <div class="glass rounded-[4rem] overflow-hidden shadow-[0_60px_120px_rgba(0,0,0,0.9)] border border-white/5">
            <div class="px-12 py-12 border-b border-white/5 bg-white/[0.01] flex items-center justify-between">
                <div>
                    <h3 class="text-3xl font-black text-white tracking-tighter">Live Queue</h3>
                    <p class="text-[11px] text-gray-600 font-black uppercase tracking-[0.4em] mt-2 italic">Student Traffic - Realtime Decryption</p>
                </div>
                <div class="flex gap-3">
                    <div class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_15px_#10b981]"></div>
                    <div class="w-3 h-3 rounded-full bg-blue-500 animate-pulse delay-150 shadow-[0_0_15px_#3b82f6]"></div>
                    <div class="w-3 h-3 rounded-full bg-indigo-500 animate-pulse delay-300 shadow-[0_0_15px_#6366f1]"></div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-700 uppercase tracking-[0.5em] bg-white/[0.01]">
                            <th class="px-12 py-8 text-left">Subject Identity</th>
                            <th class="px-12 py-8 text-left">Request Core</th>
                            <th class="px-12 py-8 text-center">Validation Timeline</th>
                            <th class="px-12 py-8 text-right">Decision</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.03]">
                        @forelse($permits as $permit)
                            <tr class="group hover:bg-white/[0.02] transition-colors duration-500">
                                <td class="px-12 py-10">
                                    <div class="flex items-center gap-6">
                                        <div class="relative">
                                            <div class="w-16 h-16 rounded-[1.5rem] bg-gradient-to-br from-white/10 to-transparent border border-white/10 flex items-center justify-center text-white font-black text-xl shadow-2xl group-hover:scale-110 transition-transform duration-500">
                                                {{ substr($permit->user->name, 0, 1) }}
                                            </div>
                                            @if($permit->created_at->isToday())
                                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-indigo-500 rounded-full border-4 border-[#0a0a0a] shadow-[0_0_10px_#6366f1]"></div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-lg font-black text-white tracking-tighter mb-1">{{ $permit->user->name }}</div>
                                            <div class="text-[10px] text-gray-600 font-black uppercase tracking-[0.2em]">{{ $permit->user->student_id ?? 'NIS UNVERIFIED' }}</div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-12 py-10">
                                    <div class="flex flex-col gap-4">
                                        <div class="flex items-center gap-3">
                                            @if($permit->type == 'Sakit')
                                                <div class="px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-[9px] font-black text-blue-500 uppercase tracking-[0.2em]">Medical Protocol</div>
                                            @else
                                                <div class="px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20 text-[9px] font-black text-purple-500 uppercase tracking-[0.2em]">Activity Protocol</div>
                                            @endif
                                            <span class="text-[10px] text-gray-700 font-bold tracking-widest uppercase italic">#{{ str_pad($permit->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                        <p class="text-[15px] text-gray-400 font-bold leading-relaxed max-w-sm line-clamp-2 border-l-2 border-white/5 pl-4 group-hover:text-white transition-colors duration-500">
                                            "{{ $permit->reason }}"
                                        </p>
                                    </div>
                                </td>
                                
                                <td class="px-12 py-10 text-center">
                                    <div class="inline-flex flex-col items-center gap-3">
                                        <div class="flex items-center gap-4">
                                            <span class="text-[16px] font-black text-white tracking-widest">{{ \Carbon\Carbon::parse($permit->start_date)->format('d.m') }}</span>
                                            <div class="w-10 h-[1px] bg-white/10"></div>
                                            <span class="text-[16px] font-black text-white tracking-widest">{{ \Carbon\Carbon::parse($permit->end_date)->format('d.m') }}</span>
                                        </div>
                                        <span class="text-[10px] text-gray-600 font-black uppercase tracking-[0.3em]">Duration: {{ \Carbon\Carbon::parse($permit->start_date)->diffInDays($permit->end_date) + 1 }} Cycles</span>
                                    </div>
                                </td>
                                
                                <td class="px-12 py-10 text-right">
                                    @if($permit->status == 'pending')
                                        <div class="flex items-center justify-end gap-5">
                                            <form action="{{ route('admin.permits.update_status', $permit) }}" method="POST" class="contents">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="w-14 h-14 rounded-2xl bg-white/5 border border-white/5 text-gray-600 hover:bg-rose-500 hover:border-rose-500 hover:text-white hover:scale-110 transition-all duration-500 flex items-center justify-center group/btn shadow-xl">
                                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.permits.update_status', $permit) }}" method="POST" class="contents">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="px-10 py-4 bg-white text-black hover:bg-neutral-200 rounded-2xl transition-all duration-500 font-black text-[12px] uppercase tracking-[0.25em] shadow-[0_20px_40px_rgba(255,255,255,0.1)] hover:scale-105 active:scale-95 group/btn">
                                                    Validate Core
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="flex flex-col items-end gap-2">
                                            <div class="flex items-center gap-3">
                                                @if($permit->status == 'approved')
                                                    <span class="text-[11px] font-black text-emerald-500 uppercase tracking-[0.3em]">Authorized</span>
                                                    <div class="w-3 h-3 rounded-full bg-emerald-500 shadow-[0_0_10px_#10b981]"></div>
                                                @else
                                                    <span class="text-[11px] font-black text-rose-500 uppercase tracking-[0.3em]">Restricted</span>
                                                    <div class="w-3 h-3 rounded-full bg-rose-500 shadow-[0_0_10px_#f43f5e]"></div>
                                                @endif
                                            </div>
                                            <span class="text-[10px] text-gray-700 font-black uppercase tracking-widest italic">{{ $permit->updated_at->format('H:i:s') }} PROTOCOL</span>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-12 py-40 text-center">
                                    <div class="w-32 h-32 mx-auto mb-12 bg-white/5 rounded-[3rem] border border-white/10 flex items-center justify-center text-gray-800 shadow-3xl relative group">
                                         <div class="absolute inset-0 bg-gradient-to-tr from-emerald-500/10 to-transparent rounded-[3rem]"></div>
                                         <svg class="w-14 h-14 relative z-10 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04M12 2.944V21m0-18.056c4.912 1.29 7.636 6.07 6.574 11.491M12 2.944c-4.912 1.29-7.636 6.07-6.574 11.491M12 21c4.912-1.29 7.636-6.07 6.574-11.491M12 21c-4.912-1.29-7.636-6.07-6.574-11.491"></path></svg>
                                    </div>
                                    <h4 class="text-4xl font-black text-white tracking-tighter mb-4 italic opacity-20">No Communication Handshake.</h4>
                                    <p class="text-gray-600 text-[12px] font-black uppercase tracking-[0.5em] max-w-sm mx-auto leading-relaxed">System standby. Waiting for incoming data stream from student terminals.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
