<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portal - Akses Autentikasi') }}</title>

        <!-- Fonts: Professional Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --app-bg: #000000;
                --app-card: #0a0a0a;
                --app-border: rgba(255, 255, 255, 0.08);
            }
            body { 
                font-family: 'Inter', sans-serif; 
                background-color: var(--app-bg);
                color: #ededed;
            }
            .noise-bg {
                position: fixed; inset: 0; z-index: -1; pointer-events: none; opacity: 0.03;
                background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            }
            .auth-card {
                background: var(--app-card); 
                border: 1px solid var(--app-border);
                border-radius: 16px; 
                box-shadow: 0 4px 6px -1px rgba(0,0,0,0.5), 0 24px 48px -12px rgba(0,0,0,1);
            }
        </style>
    </head>
    <body class="font-sans antialiased min-h-screen relative flex items-center justify-center selection:bg-white/20 selection:text-white">
        
        <div class="noise-bg"></div>

        <div class="w-full flex flex-col sm:justify-center items-center py-10 px-4 sm:px-6 relative z-10 w-full max-w-md">
            
            <a href="/" class="mb-10 flex flex-col items-center justify-center gap-4 group transition-opacity hover:opacity-80">
                <div class="w-12 h-12 rounded-xl border border-white/20 bg-white/5 flex items-center justify-center text-white shadow-sm font-bold text-xl">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <div class="text-center">
                    <div class="font-bold text-white tracking-tight text-lg">SMKTI <span class="font-normal text-gray-400">Airlangga</span></div>
                </div>
            </a>

            <div class="w-full sm:max-w-md px-8 py-10 auth-card">
                {{ $slot }}
            </div>
            
            <p class="mt-8 text-xs text-gray-600 font-medium tracking-wide">&copy; {{ date('Y') }} Sistem Akses Terpadu.</p>
        </div>
    </body>
</html>
