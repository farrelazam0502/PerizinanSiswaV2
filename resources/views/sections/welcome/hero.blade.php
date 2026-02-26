    <main class="relative pt-32 lg:pt-0 min-h-screen flex items-center justify-center z-10 w-full overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- 1. Hero Content (Left) -->
            <div class="flex flex-col text-center lg:text-left z-20 xl:pr-10">
                <div class="reveal-up in-view inline-flex items-center justify-center lg:justify-start gap-3 mb-8 mx-auto lg:mx-0">
                    <div class="px-3 py-1.5 rounded-full border border-slate-700 bg-slate-800/50 backdrop-blur-md text-xs font-semibold text-slate-300 flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
                        </span>
                        Sistem Terpusat Operasional 2.0
                    </div>
                </div>
                
                <h1 class="reveal-up delay-100 in-view heading-font text-5xl sm:text-6xl md:text-7xl lg:text-[5rem] font-bold text-hero-gradient leading-[1.1] mb-8">
                    Smart Portal <br>
                    <span class="text-accent-gradient">Perizinan.</span>
                </h1>
                
                <p class="reveal-up delay-200 in-view text-lg text-slate-400 mb-12 max-w-xl mx-auto lg:mx-0 leading-relaxed font-light">
                    Solusi manajemen persetujuan izin digital kelas enterprise yang didesain eksklusif untuk staf pengajar dan siswa <b class="text-white font-medium">SMK TI Airlangga</b>. Efisien, rapi, dan instan.
                </p>
                
                <div class="reveal-up delay-300 in-view flex flex-col sm:flex-row gap-5 justify-center lg:justify-start">
                    <a href="{{ route('register') }}" class="btn-modern px-10 py-5 rounded-2xl text-lg font-bold flex items-center justify-center gap-3">
                        Buat Surat Izin Baru
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="{{ route('login') }}" class="px-10 py-5 rounded-2xl text-lg font-semibold text-white border border-slate-700 hover:bg-slate-800 transition-colors flex items-center justify-center">
                        Masuk Dasbor
                    </a>
                </div>
            </div>

            <!-- 2. Desktop High-End 3D Visual (Right) -->
            <div class="hidden lg:flex hero-graphics w-full h-[700px] items-center justify-center reveal-up delay-200 in-view z-10">
                
                <!-- Center Main UI Board -->
                <div class="floating-ui-1 w-[480px] h-[550px] relative p-8 flex flex-col">
                    <!-- Glass Status Bar -->
                    <div class="flex items-center justify-between border-b border-slate-700/50 pb-5 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center border border-slate-700">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <div class="text-white font-bold tracking-wide">Permit Review</div>
                                <div class="text-xs text-slate-400">Pusat Validasi</div>
                            </div>
                        </div>
                        <div class="w-8 h-8 rounded-full border border-slate-700 flex items-center justify-center">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                        </div>
                    </div>

                    <!-- Chart Line Simulation -->
                    <div class="w-full h-32 bg-slate-900/50 rounded-2xl border border-slate-800 mb-6 flex items-end p-4 gap-2 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-500/10 to-transparent"></div>
                        <div class="w-full h-[30%] bg-slate-700/50 rounded-t-sm"></div>
                        <div class="w-full h-[50%] bg-slate-700/50 rounded-t-sm"></div>
                        <div class="w-full h-[80%] bg-indigo-500/50 rounded-t-sm relative"><div class="absolute -top-3 left-1/2 transform -translate-x-1/2 w-2 h-2 rounded-full bg-indigo-400 ring-4 ring-indigo-400/30"></div></div>
                        <div class="w-full h-[40%] bg-slate-700/50 rounded-t-sm"></div>
                        <div class="w-full h-[60%] bg-slate-700/50 rounded-t-sm"></div>
                    </div>

                    <!-- Mock List -->
                    <div class="space-y-4 flex-grow">
                        <!-- Approved Item -->
                        <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-500/10 text-green-400 flex items-center justify-center border border-green-500/20">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="flex-grow">
                                <div class="h-3 w-1/2 bg-slate-300 rounded mb-2"></div>
                                <div class="h-2 w-1/3 bg-slate-600 rounded"></div>
                            </div>
                        </div>
                        <!-- Pending Item -->
                        <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-amber-500/10 text-amber-400 flex items-center justify-center border border-amber-500/20">
                                <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            </div>
                            <div class="flex-grow">
                                <div class="h-3 w-3/4 bg-slate-300 rounded mb-2"></div>
                                <div class="h-2 w-1/2 bg-slate-600 rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Floating Element 2 (Right Top Accent) -->
                <div class="floating-ui-2 p-6 w-64">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="font-bold text-sm">Respon Instan</div>
                            <div class="text-[11px] text-indigo-200">Wali Kelas Notified</div>
                        </div>
                    </div>
                    <div class="w-full bg-black/20 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-white w-[100%] h-full"></div>
                    </div>
                </div>

                <!-- Floating Element 3 (Left Bottom Accent) -->
                <div class="floating-ui-3 p-5 flex items-center gap-4 w-72">
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=ffffff&color=000&bold=true" class="w-12 h-12 rounded-full">
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-[#101010]"></div>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-white">Staf Tata Usaha</div>
                        <div class="text-xs text-slate-400">Siap melayani izin Anda</div>
                    </div>
                </div>

            </div>
        </div>
    </main>
