<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>@yield('title', 'PawHome — Adopter')</title>
 
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
 
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
 
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .font-brand { font-family: 'Inter', sans-serif; }
    </style>
 
    @stack('styles')
</head>
<body class="bg-surface-alt text-surface-dark antialiased">
 
{{-- ══════════════════════════════════════════════════
     TOP NAVBAR
══════════════════════════════════════════════════ --}}
<nav class="sticky top-0 z-50 bg-brand-primary/95 backdrop-blur-xl border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
 
        {{-- Logo --}}
        <a href="{{ route('adopter.dashboard') }}" class="flex items-center gap-2.5 flex-shrink-0">
            <img src="{{ asset('images/logoPurple.png') }}"
                 alt="PawHome"
                 class="h-9 w-auto brightness-0 invert">
            <span class="font-brand font-extrabold text-lg text-white hidden sm:block">PawHome</span>
        </a>
 
        {{-- Tab navigasi tengah --}}
        <div class="flex items-center gap-1 bg-white/10 rounded-2xl p-1">
            <a href="{{ route('adopter.dashboard') }}"
               class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200
               {{ request()->routeIs('adopter.dashboard')
                    ? 'bg-white text-brand-primary shadow-sm'
                    : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <span class="text-base">🏠</span>
                <span class="hidden sm:block">Beranda</span>
            </a>
            <a href="{{ route('adopter.animals.index') }}"
               class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200
               {{ request()->routeIs('adopter.animals.*')
                    ? 'bg-white text-brand-primary shadow-sm'
                    : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <span class="text-base">🐾</span>
                <span class="hidden sm:block">Cari Hewan</span>
            </a>
            <a href="{{ route('adopter.adoptions.index') }}"
               class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200
               {{ request()->routeIs('adopter.adoptions.*')
                    ? 'bg-white text-brand-primary shadow-sm'
                    : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                <span class="text-base">📋</span>
                <span class="hidden sm:block">Pengajuan</span>
            </a>
        </div>
 
        {{-- User info + logout --}}
        <div class="flex items-center gap-3 flex-shrink-0">
            {{-- Avatar + nama --}}
            <div class="hidden sm:flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-full bg-accent-base flex items-center justify-center text-xs font-extrabold text-surface-dark flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold text-white leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-white/45 capitalize">Adopter</p>
                </div>
            </div>
 
            {{-- Divider --}}
            <div class="hidden sm:block w-px h-6 bg-white/15"></div>
 
            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center gap-1.5 text-xs font-semibold text-white/55
                               hover:text-status-rejected-text hover:bg-status-rejected-bg
                               px-3 py-2 rounded-xl transition-all duration-200">
                    <span class="text-sm">🚪</span>
                    <span class="hidden sm:block">Keluar</span>
                </button>
            </form>
        </div>
 
    </div>
</nav>
 
{{-- ══════════════════════════════════════════════════
     FLASH MESSAGES
══════════════════════════════════════════════════ --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 pt-4">
    @if(session('success'))
        <div id="flash-success"
             class="flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50
                    px-4 py-3 text-sm font-semibold text-green-800 mb-2">
            <span>✅</span>
            <span>{{ session('success') }}</span>
            <button onclick="$('#flash-success').fadeOut(200)" class="ml-auto text-green-400 hover:text-green-700 text-lg leading-none">×</button>
        </div>
    @endif
    @if(session('error'))
        <div id="flash-error"
             class="flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50
                    px-4 py-3 text-sm font-semibold text-red-800 mb-2">
            <span>❌</span>
            <span>{{ session('error') }}</span>
            <button onclick="$('#flash-error').fadeOut(200)" class="ml-auto text-red-400 hover:text-red-700 text-lg leading-none">×</button>
        </div>
    @endif
</div>
 
{{-- ══════════════════════════════════════════════════
     MAIN CONTENT
══════════════════════════════════════════════════ --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 pb-16 pt-2">
    @yield('content')
</main>
 
@stack('scripts')
<script>
    setTimeout(function () {
        $('#flash-success, #flash-error').fadeOut(500);
    }, 4000);
</script>
</body>
</html>