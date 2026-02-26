<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <a href="{{ route('student.permits.index') }}" class="group w-14 h-14 rounded-2xl border border-white/5 bg-white/5 flex items-center justify-center text-gray-400 hover:text-white hover:bg-white/10 hover:border-white/20 transition-all duration-500 shadow-2xl">
                <svg class="w-6 h-6 group-hover:-translate-x-1.5 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-white tracking-tighter leading-none">
                    Digital <br>
                    <span class="text-gray-500">Submission Form.</span>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pb-32">
        <div class="relative group">
            <!-- Dynamic Aura Glow -->
            <div class="absolute -inset-1 bg-gradient-to-tr from-white/10 via-white/5 to-transparent rounded-[3.5rem] blur-2xl opacity-30 group-hover:opacity-50 transition duration-1000"></div>
            
            <div class="relative glass rounded-[3.5rem] border border-white/10 shadow-[0_50px_100px_rgba(0,0,0,0.8)] overflow-hidden">
                <div class="p-10 sm:p-16">
                    <!-- Form Identity Header -->
                    <div class="mb-16 flex items-start justify-between">
                        <div class="space-y-4">
                            <div class="w-16 h-16 rounded-3xl bg-white text-black flex items-center justify-center shadow-[0_0_30px_rgba(255,255,255,0.2)]">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-3xl font-black text-white tracking-tighter">Submit Permit</h3>
                                <p class="text-[14px] text-gray-500 font-bold uppercase tracking-widest mt-2">Protocol Version 2.0.4-B</p>
                            </div>
                        </div>
                        <div class="hidden sm:block pt-4">
                            <div class="px-5 py-2.5 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_#10b981]"></div>
                                <span class="text-[11px] font-black text-gray-400 uppercase tracking-widest leading-none">SECURE LINK ESTABLISHED</span>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('student.permits.store') }}" method="POST" class="space-y-12">
                        @csrf

                        <!-- Premium Category Toggle -->
                        <div class="space-y-6">
                            <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.3em] ml-2">Protocol Category</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <label class="relative cursor-pointer group/label">
                                    <input type="radio" name="type" value="Sakit" required class="peer sr-only">
                                    <div class="p-6 rounded-[2rem] bg-white/[0.02] border border-white/5 hover:border-white/20 peer-checked:bg-white/[0.05] peer-checked:border-white/30 peer-checked:shadow-[0_20px_40px_rgba(0,0,0,0.5)] transition-all duration-500">
                                        <div class="flex items-center gap-5">
                                            <div class="w-14 h-14 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 shadow-[0_0_20px_rgba(99,102,241,0.1)] group-hover/label:scale-110 transition-transform duration-500">
                                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                            </div>
                                            <div>
                                                <p class="text-[16px] font-black text-white tracking-tight leading-none mb-1.5">Medical Leave</p>
                                                <p class="text-[11px] text-gray-500 font-black uppercase tracking-widest">Health Emergency</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 rounded-[2rem] border-2 border-white/0 peer-checked:border-white/10 transition-all pointer-events-none"></div>
                                </label>

                                <label class="relative cursor-pointer group/label">
                                    <input type="radio" name="type" value="Dispensasi" required class="peer sr-only">
                                    <div class="p-6 rounded-[2rem] bg-white/[0.02] border border-white/5 hover:border-white/20 peer-checked:bg-white/[0.05] peer-checked:border-white/30 peer-checked:shadow-[0_20px_40px_rgba(0,0,0,0.5)] transition-all duration-500">
                                        <div class="flex items-center gap-5">
                                            <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shadow-[0_0_20px_rgba(6,182,212,0.1)] group-hover/label:scale-110 transition-transform duration-500">
                                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div>
                                                <p class="text-[16px] font-black text-white tracking-tight leading-none mb-1.5">Dispensation</p>
                                                <p class="text-[11px] text-gray-500 font-black uppercase tracking-widest">Official Activity</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 rounded-[2rem] border-2 border-white/0 peer-checked:border-white/10 transition-all pointer-events-none"></div>
                                </label>
                            </div>
                            @error('type') <span class="text-[11px] font-black text-rose-500 ml-2 tracking-widest uppercase">{{ $message }}</span> @enderror
                        </div>

                        <!-- Date Selection with Custom UI -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-6">
                                <label for="start_date" class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.3em] ml-2">Start Timestamp</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-gray-500">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="date" name="start_date" id="start_date" required class="block w-full bg-white/[0.03] border border-white/5 text-white rounded-2xl py-5 pl-14 pr-6 focus:ring-4 focus:ring-white/5 focus:border-white/20 focus:bg-white/[0.06] transition-all text-[15px] font-bold tracking-tight [color-scheme:dark]">
                                </div>
                                @error('start_date') <span class="text-[11px] font-black text-rose-500 ml-2 tracking-widest uppercase">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-6">
                                <label for="end_date" class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.3em] ml-2">End Timestamp</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-gray-500">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="date" name="end_date" id="end_date" required class="block w-full bg-white/[0.03] border border-white/5 text-white rounded-2xl py-5 pl-14 pr-6 focus:ring-4 focus:ring-white/5 focus:border-white/20 focus:bg-white/[0.06] transition-all text-[15px] font-bold tracking-tight [color-scheme:dark]">
                                </div>
                                @error('end_date') <span class="text-[11px] font-black text-rose-500 ml-2 tracking-widest uppercase">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Full-width Textarea with Focus Aura -->
                        <div class="space-y-6">
                            <label for="reason" class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.3em] ml-2">Justification & Details</label>
                            <div class="relative group/input">
                                <textarea name="reason" id="reason" rows="6" required placeholder="Describe your situation with clarity and honesty..." class="block w-full bg-white/[0.03] border border-white/5 text-white placeholder-gray-600 rounded-[2rem] py-8 px-8 focus:ring-8 focus:ring-white/[0.02] focus:border-white/20 focus:bg-white/[0.06] transition-all text-sm font-medium leading-relaxed resize-none"></textarea>
                            </div>
                            @error('reason') <span class="text-[11px] font-black text-rose-500 ml-2 tracking-widest uppercase">{{ $message }}</span> @enderror
                        </div>

                        <!-- Action Group -->
                        <div class="pt-10 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-10">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-500 shadow-[0_0_20px_rgba(16,185,129,0.1)]">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04M12 2.944V21m0-18.056c4.912 1.29 7.636 6.07 6.574 11.491M12 2.944c-4.912 1.29-7.636 6.07-6.574 11.491M12 21c4.912-1.29 7.636-6.07 6.574-11.491M12 21c-4.912-1.29-7.636-6.07-6.574-11.491"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[12px] font-black text-white uppercase tracking-widest leading-none mb-1">Authenticated</p>
                                    <p class="text-[11px] text-gray-500 font-bold uppercase tracking-[0.15em] leading-none text-nowrap">Valid Signature Required</p>
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full sm:w-auto px-12 py-5 bg-white text-black hover:bg-neutral-200 rounded-[2rem] transition-all duration-500 font-black text-sm uppercase tracking-[0.2em] shadow-[0_30px_60px_rgba(255,255,255,0.1)] flex items-center justify-center gap-4 group/btn active:scale-95">
                                <span>Sign & Transmit</span>
                                <svg class="w-5 h-5 group-hover/btn:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
