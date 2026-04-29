<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'AI Sales Generator') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body { background-color: #030712; }
        .glow { box-shadow: 0 0 80px 20px rgba(99, 102, 241, 0.15); }
        .grid-bg {
            background-image: linear-gradient(rgba(99,102,241,0.05) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(99,102,241,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.6s ease forwards; }
        .fade-up-2 { animation: fadeUp 0.6s ease 0.15s forwards; opacity: 0; }
        .fade-up-3 { animation: fadeUp 0.6s ease 0.3s forwards; opacity: 0; }
        .fade-up-4 { animation: fadeUp 0.6s ease 0.45s forwards; opacity: 0; }
    </style>
</head>
<body class="font-sans antialiased text-white" style="font-family: 'Figtree', sans-serif;">

    <div class="min-h-screen grid-bg relative overflow-hidden">

        {{-- Glow Effect --}}
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 glow rounded-full pointer-events-none"></div>

        {{-- Navbar --}}
        <nav class="relative z-10 flex items-center justify-between px-6 py-5 max-w-5xl mx-auto">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="font-bold text-white text-sm tracking-tight">AI Sales Generator</span>
            </div>

            @if (Route::has('login'))
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-400 hover:text-white transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm bg-indigo-600 hover:bg-indigo-500 text-white font-medium px-4 py-2 rounded-xl transition">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

        {{-- Hero --}}
        <main class="relative z-10 flex flex-col items-center justify-center text-center px-4 pt-20 pb-32">

            <div class="fade-up inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-6">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
                Powered by AI
            </div>

            <h1 class="fade-up-2 text-5xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight max-w-3xl">
                Generate High-Converting
                <span class="text-indigo-400"> Sales Pages</span>
                in Seconds
            </h1>

            <p class="fade-up-3 mt-6 text-gray-400 text-lg max-w-xl leading-relaxed">
                Describe your product, and let AI craft a compelling, professional sales page — complete with headlines, benefits, and a call to action.
            </p>

            <div class="fade-up-4 flex items-center gap-4 mt-10">
                @auth
                    <a href="{{ url('/generate') }}" class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-3 rounded-xl transition shadow-lg shadow-indigo-500/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Start Generating
                    </a>
                @else
                    <a href="{{ route('register') }}" class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-3 rounded-xl transition shadow-lg shadow-indigo-500/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Get Started Free
                    </a>
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">
                        Already have an account →
                    </a>
                @endauth
            </div>

            {{-- Feature Pills --}}
            <div class="fade-up-4 flex flex-wrap items-center justify-center gap-3 mt-12">
                @foreach(['AI-Powered', 'Instant Results', 'Copy & Use', 'Save History'] as $feature)
                <span class="flex items-center gap-1.5 bg-gray-900 border border-gray-800 text-gray-400 text-xs px-3 py-1.5 rounded-full">
                    <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
                    {{ $feature }}
                </span>
                @endforeach
            </div>

            {{-- Preview Card --}}
            <div class="fade-up-4 mt-16 w-full max-w-2xl bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden shadow-2xl text-left">
                <div class="flex items-center gap-2 px-5 py-3 border-b border-gray-800">
                    <div class="w-2.5 h-2.5 rounded-full bg-red-500/70"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/70"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-green-500/70"></div>
                    <span class="ml-2 text-xs text-gray-600 font-mono">sales-page-result.md</span>
                </div>
                <div class="p-6 font-mono text-xs text-gray-400 leading-relaxed space-y-2">
                    <p class="text-indigo-400 font-semibold">**Headline**</p>
                    <p class="text-white">Unleash the Beast: Upgrade Your Ride with the Legendary 2JZ-GTE</p>
                    <p class="text-indigo-400 font-semibold mt-3">**Benefits**</p>
                    <p>✓ Unmatched Performance — 0-60mph in just 4.6 seconds</p>
                    <p>✓ Reliability & Durability — Built to withstand high-performance demands</p>
                    <p>✓ Tuning Potential — Extensive aftermarket support</p>
                    <p class="text-indigo-400 font-semibold mt-3">**Call to Action**</p>
                    <p class="text-green-400">Order Now — Limited Time Offer, use code "SUPRA15" for 15% off</p>
                </div>
            </div>

        </main>
    </div>

</body>
</html>