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
            --accent: #4338ca; 
            --accent-glow: #6366f1; 
            --accent-secondary: #06b6d4; 
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

        #preloader {
            position: fixed; inset: 0; background: var(--bg-body); z-index: 9999;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            transition: opacity 0.8s cubic-bezier(0.65, 0, 0.35, 1), visibility 0.8s;
        }
        .reveal-text { overflow: hidden; position: relative; }
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

        .nav-glass {
            background: rgba(5, 5, 5, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

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

        .hero-graphics { perspective: 2000px; transform-style: preserve-3d; }
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

        .text-hero-gradient {
            background: linear-gradient(180deg, #FFFFFF 0%, #A1A1AA 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-accent-gradient {
            background: linear-gradient(to right, #818cf8, #22d3ee);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .reveal-up { opacity: 0; transform: translateY(40px); transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal-up.in-view { opacity: 1; transform: translateY(0); }
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }

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
                <div class="group flex items-center gap-4 cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-white text-black flex items-center justify-center transition-transform duration-500 group-hover:rotate-12 group-hover:scale-110">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
                    </div>
                    <div>
                        <div class="heading-font text-xl font-bold tracking-tight text-white leading-none mb-1">SMKTI <span class="text-slate-400">Airlangga</span></div>
                        <div class="text-[10px] uppercase tracking-[0.2em] text-cyan-400 font-semibold">Portal Digital</div>
                    </div>
                </div>

                <nav class="hidden md:flex items-center gap-10">
                    <a href="#" class="text-sm font-medium text-slate-400 hover:text-white transition-colors">Platform</a>
                    <a href="#" class="text-sm font-medium text-slate-400 hover:text-white transition-colors">Alur Proses</a>
                    <a href="#" class="text-sm font-medium text-slate-400 hover:text-white transition-colors">Panduan</a>
                </nav>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-white hover:text-cyan-400 transition-colors mr-2 hidden sm:block">Akses Dasbor</a>
                            <a href="{{ route('profile.edit') }}" class="w-10 h-10 rounded-full border border-slate-700 bg-slate-900 flex items-center justify-center text-slate-300 hover:bg-slate-800 transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-slate-400 hover:text-white transition-colors hidden sm:block mr-4">Log in</a>
                            <a href="{{ route('register') }}" class="btn-modern px-6 py-3 rounded-full text-sm font-semibold hidden sm:flex items-center gap-2">
                                Ajukan Izin <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- CONTENT SECTIONS -->
    @include('sections.welcome.hero')
    @include('sections.welcome.features')

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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {
                document.getElementById('preloader').classList.add('preloader-hidden');
                setTimeout(() => {
                    document.querySelectorAll('main .reveal-up').forEach(el => el.classList.add('in-view'));
                }, 100);
            }, 1800);

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: "0px 0px -50px 0px" });

            document.querySelectorAll('section .reveal-up').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
