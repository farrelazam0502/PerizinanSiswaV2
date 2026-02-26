<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portal Perizinan') }}</title>

        <!-- Fonts: Inter & Outfit for Premium Typography -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --app-bg: #030303;
                --app-surface: #0a0a0a;
                --app-accent: #ffffff;
                --app-border: rgba(255, 255, 255, 0.08);
                --app-glow: rgba(255, 255, 255, 0.05);
            }

            body { 
                font-family: 'Inter', sans-serif; 
                background-color: var(--app-bg);
                color: #fafafa;
                overflow-x: hidden;
                -webkit-font-smoothing: antialiased;
            }

            h1, h2, h3, h4, .font-heading {
                font-family: 'Outfit', sans-serif;
            }

            /* Custom Premium Scrollbar */
            ::-webkit-scrollbar { width: 6px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 10px; }
            ::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.2); }

            /* Advanced Background System */
            .bg-layers {
                position: fixed; inset: 0; z-index: -1; pointer-events: none;
            }
            .grid-overlay {
                position: absolute; inset: 0;
                background-image: 
                    linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
                background-size: 50px 50px;
                mask-image: radial-gradient(circle at center, black 10%, transparent 80%);
            }
            .glow-orb {
                position: absolute; border-radius: 50%; 
                opacity: 0.2; filter: blur(120px);
                animation: float 20s infinite alternate;
            }
            @keyframes float {
                from { transform: translate(0, 0) scale(1); }
                to { transform: translate(5%, 5%) scale(1.1); }
            }

            /* Glass Effect Class */
            .glass {
                background: rgba(10, 10, 10, 0.6);
                backdrop-filter: blur(20px);
                border: 1px solid var(--app-border);
            }

            /* Animation keyframes */
            .fade-in { animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-layers">
            <div class="grid-overlay"></div>
            <div class="glow-orb" style="width: 50vw; height: 50vw; top: -10%; left: -10%; background: #22c55e;"></div>
            <div class="glow-orb" style="width: 40vw; height: 40vw; bottom: -10%; right: -10%; background: #3b82f6;"></div>
        </div>

        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="pt-20 pb-4">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="fade-in">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="fade-in" style="animation-delay: 0.2s;">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
