<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portal Perizinan') }}</title>

        <!-- Fonts: Inter for Professional SaaS Look -->
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
                overflow-x: hidden;
            }
            .noise-bg {
                position: fixed; inset: 0; z-index: -1; pointer-events: none; opacity: 0.03;
                background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            }
            .spotlight {
                position: fixed; top: -20%; left: 50%; transform: translateX(-50%);
                width: 60vw; height: 40vw; background: radial-gradient(ellipse, rgba(255,255,255,0.03) 0%, transparent 60%);
                pointer-events: none; z-index: -1;
            }
            .border-ultra-thin {
                border-bottom: 1px solid var(--app-border);
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-200 selection:bg-white/20 selection:text-white">
        
        <div class="noise-bg"></div>
        <div class="spotlight"></div>

        <div class="min-h-screen relative">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="border-ultra-thin bg-black/40 backdrop-blur-xl sticky top-0 z-40">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="relative z-10 pt-8 pb-16">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
