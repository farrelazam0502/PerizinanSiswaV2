<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Perizinan Cerdas - SMKTI Airlangga</title>
    
    <!-- Google Fonts: Inter for UI, Syne for modern display headings -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --bg-body: #050505;
            --accent: #4338ca; /* Indigo 700 */
            --accent-glow: #6366f1; /* Indigo 500 */
            --accent-secondary: #06b6d4; /* Cyan 500 */
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-body); 
            color: #f8fafc;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }
        h1, h2, h3, .heading-font {
            font-family: 'Syne', sans-serif;
            letter-spacing: -0.03em;
        }

        /* --- PRELOADER --- */
        #preloader {
            position: fixed; inset: 0; background: var(--bg-body); z-index: 9999;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            transition: opacity 0.8s cubic-bezier(0.65, 0, 0.35, 1), visibility 0.8s;
        }
        .reveal-text {
            overflow: hidden;
            position: relative;
        }
        .reveal-text span {
            display: inline-block;
            transform: translateY(100%);
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .loader-bar {
            width: 200px; height: 2px; background: rgba(255,255,255,0.1); margin-top: 20px;
            position: relative; overflow: hidden; border-radius: 4px;
        }
        .loader-bar::after {
            content: ''; position: absolute; left: 0; top: 0; height: 100%; width: 40%;
            background: var(--accent-secondary); border-radius: 4px;
            animation: loadingBar 1.5s cubic-bezier(0.65, 0, 0.35, 1) forwards;
        }
        @keyframes slideUp { to { transform: translateY(0); } }
        @keyframes loadingBar { 0% { width: 0; left: -10%; } 100% { width: 100%; left: 100%; } }
        .preloader-hidden { opacity: 0; visibility: hidden; }

        /* --- IMMERSIVE BACKGROUND --- */
        .ambient-mesh {
            position: fixed; inset: -100px; z-index: -2; pointer-events: none;
            background: 
                radial-gradient(circle at 15% 50%, rgba(67, 56, 202, 0.15), transparent 40%),
                radial-gradient(circle at 85% 30%, rgba(6, 182, 212, 0.1), transparent 40%);
            animation: ambientShift 15s ease-in-out infinite alternate;
        }
        .grid-backdrop {
            position: fixed; inset: 0; z-index: -1; pointer-events: none;
            background-image: 
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 80px 80px;
            mask-image: radial-gradient(ellipse at center, black 20%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at top center, black 30%, transparent 80%);
        }
        @keyframes ambientShift {
            0% { transform: scale(1) translate(0, 0); }
            100% { transform: scale(1.1) translate(2% , 5%); }
        }

        /* --- NAVBAR --- */
        .nav-glass {
            background: rgba(5, 5, 5, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        /* --- CTA BUTTON --- */
        .btn-modern {
            position: relative;
            background: #ffffff;
            color: #050505;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease;
        }
        .btn-modern::before {
            content: ''; position: absolute; top: 0; left: -10%; width: 120%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1), transparent);
            transform: skewX(-20deg) translateX(-150%);
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(255, 255, 255, 0.15);
        }
        .btn-modern:hover::before { transform: skewX(-20deg) translateX(150%); }

        /* --- DESKTOP 3D HERO COMPOSITION --- */
        .hero-graphics {
            perspective: 2000px;
            transform-style: preserve-3d;
        }
        .floating-ui-1 {
            background: rgba(20, 20, 20, 0.8); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px; box-shadow: 0 30px 60px -15px rgba(0,0,0,0.8);
            transform: rotateX(10deg) rotateY(-20deg);
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            transform-style: preserve-3d;
        }
        .floating-ui-2 {
            position: absolute; right: -30px; top: -20px;
            background: linear-gradient(135deg, rgba(67, 56, 202, 0.9), rgba(6, 182, 212, 0.9));
            border: 1px solid rgba(255,255,255,0.2); border-radius: 20px;
            backdrop-filter: blur(10px); color: #fff;
            box-shadow: 0 20px 40px -10px rgba(67, 56, 202, 0.5);
            transform: rotateX(5deg) rotateY(-15deg) translateZ(80px);
            animation: float-slow 7s ease-in-out infinite;
        }
        .floating-ui-3 {
            position: absolute; left: -40px; bottom: 20px;
            background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(15px); border-radius: 16px;
            box-shadow: 0 20px 30px -5px rgba(0,0,0,0.5);
            transform: rotateX(15deg) rotateY(-10deg) translateZ(50px);
            animation: float-slow 8s ease-in-out infinite 2s;
        }
        .hero-graphics:hover .floating-ui-1 {
            transform: rotateX(5deg) rotateY(-10deg) translateY(-10px);
        }
        @keyframes float-slow {
            0%, 100% { transform: translateY(0) rotateX(5deg) rotateY(-15deg) translateZ(80px); }
            50% { transform: translateY(-15px) rotateX(5deg) rotateY(-15deg) translateZ(80px); }
        }

        /* Text Gradient Effect */
        .text-hero-gradient {
            background: linear-gradient(180deg, #FFFFFF 0%, #A1A1AA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-accent-gradient {
            background: linear-gradient(to right, #818cf8, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Reveal animations */
        .reveal-up { opacity: 0; transform: translateY(40px); transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal-up.in-view { opacity: 1; transform: translateY(0); }
        
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }

        /* BENTO GRID styling */
        .bento-box {
            background: rgba(20, 20, 20, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            transition: background 0.4s ease, border-color 0.4s ease;
        }
        .bento-box:hover {
            background: rgba(30, 30, 30, 0.6);
            border-color: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>
<body class="selection:bg-indigo-500/30 selection:text-indigo-200">

    <!-- PRELOADER -->
    <div id="preloader">
        <div class="reveal-text heading-font text-3xl font-bold tracking-tight text-white mb-2">
            <span>SMKTI AIRLANGGA</span>
        </div>
        <div class="text-xs text-slate-500 tracking-[0.3em] font-medium">SISTEM PERIZINAN</div>
        <div class="loader-bar"></div>
    </div>

    <!-- BACKGROUNDS -->
    <div class="ambient-mesh"></div>
    <div class="grid-backdrop"></div>

    <!-- HEADER -->
    <header class="fixed top-0 w-full z-50 nav-glass">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="flex items-center justify-between h-24">
                <!-- Branding -->
                <div class="group flex items-center gap-4 cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-white text-black flex items-center justify-center transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
                    </div>
                    <div>
                        <div class="heading-font text-xl font-bold tracking-tight text-white leading-none mb-1">SMKTI <span class="text-slate-400">Airlangga</span></div>
                        <div class="text-[10px] uppercase tracking-[0.2em] text-cyan-400 font-semibold">Portal Digital</div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-10">
                    <a href="#" class="text-sm font-medium text-slate-400 hover:text-white transition-colors">Platform</a>
                    <a href="#" class="text-sm font-medium text-slate-400 hover:text-white transition-colors">Alur Proses</a>
                    <a href="#" class="text-sm font-medium text-slate-400 hover:text-white transition-colors">Panduan</a>
                </nav>

                <!-- Auth Action -->
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-white hover:text-cyan-400 transition-colors mr-2 hidden sm:block">Akses Dasbor</a>
                            <a href="{{ route('profile.edit') }}" class="w-10 h-10 rounded-full border border-slate-700 bg-slate-900 flex items-center justify-center text-slate-300 hover:bg-slate-800 transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-slate-400 hover:text-white transition-colors hidden sm:block mr-4">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-modern px-6 py-3 rounded-full text-sm font-semibold hidden sm:flex items-center gap-2">
                                    Ajukan Izin <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                <!-- Mobile Icon CTA -->
                                <a href="{{ route('register') }}" class="btn-modern w-10 h-10 rounded-full sm:hidden flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION (DESKTOP OPTIMIZED) -->
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

    <!-- BENTO GRID FEATURES -->
    <section class="py-24 relative z-10 w-full bg-[#050505]">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            
            <div class="mb-16 text-center lg:text-left reveal-up">
                <h2 class="heading-font text-3xl md:text-5xl font-bold text-white mb-4">Solusi Cerdas, <br>Efisien Tanpa Kertas.</h2>
                <p class="text-slate-400 font-light text-lg">Infrastruktur perizinan digital untuk mendukung produktivitas.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[250px]">
                <!-- Wide Box -->
                <div class="bento-box md:col-span-2 p-8 reveal-up flex flex-col justify-end relative">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 blur-[50px] rounded-full"></div>
                    <div class="absolute top-8 right-8 w-16 h-16 rounded-2xl bg-slate-800/50 border border-slate-700 flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl heading-font font-bold text-white mb-2 relative z-10">Kecepatan Real-time</h3>
                    <p class="text-slate-400 max-w-sm relative z-10">Pengajuan izin diproses secara harafiah dalam hitungan detik menuju dasbor wali kelas dan admin TU sekolah.</p>
                </div>
                
                <!-- Square Box -->
                <div class="bento-box p-8 reveal-up delay-100 flex flex-col justify-center items-center text-center">
                    <div class="w-16 h-16 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl heading-font font-bold text-white mb-2">Aman & Terenkripsi</h3>
                    <p class="text-sm text-slate-400">Data siswa dijamin 100% aman diserver lokal sekolah.</p>
                </div>

                <!-- Square Box -->
                <div class="bento-box p-8 reveal-up delay-200 bg-gradient-to-br from-[#101010] to-[#0A0A0A]">
                    <div class="w-14 h-14 rounded-2xl bg-white text-black flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                    </div>
                    <h3 class="text-xl heading-font font-bold text-white mb-2">Arsip Absensi</h3>
                    <p class="text-sm text-slate-400">Integrasi langsung ke arsip rekapan database absensi bulanan sekolah.</p>
                </div>

                <!-- Wide Box -->
                <div class="bento-box md:col-span-2 p-8 reveal-up delay-300 flex flex-col justify-end overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Tech Background" class="absolute inset-0 w-full h-full object-cover opacity-10 group-hover:opacity-20 transition-opacity duration-700 mix-blend-luminosity">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#050505] via-[#050505]/80 to-transparent"></div>
                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl heading-font font-bold text-white mb-2">Akses Semua Perangkat</h3>
                            <p class="text-slate-400 max-w-sm border-l-2 border-indigo-500 pl-4 mt-4">Responsive untuk Handphone, Tablet, hingga Layar Komputer Lebar tanpa hambatan.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="border-t border-white/5 py-10 relative z-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="w-6 h-6 rounded-md bg-white text-black flex items-center justify-center font-bold text-[10px]">A</div>
                <span class="text-white font-semibold tracking-wide">SMKTI Airlangga</span>
            </div>
            <p class="text-sm text-slate-500 font-medium tracking-wide">
                &copy; {{ date('Y') }} Sistem Informasi Manajemen. Designed for Excellence.
            </p>
        </div>
    </footer>

    <!-- INTERACTION LOGIC -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Preloader Out
            setTimeout(() => {
                document.getElementById('preloader').classList.add('preloader-hidden');
                
                // Trigger initial hero reveal after preloader
                setTimeout(() => {
                    document.querySelectorAll('main .reveal-up').forEach(el => el.classList.add('in-view'));
                }, 100);
            }, 1800);

            // Scroll animations for Bento Box / Features
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        obs.unobserve(entry.target);
                    }
                });
            }, { 
                threshold: 0.15,
                rootMargin: "0px 0px -50px 0px"
            });

            document.querySelectorAll('section .reveal-up').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
