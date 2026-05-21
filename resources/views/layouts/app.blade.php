<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PawHome Banjarmasin')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind via Vite. Jika asset belum di-build saat development, pakai CDN fallback agar halaman auth tetap bisa tampil. --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    {{-- jQuery via CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

@auth
{{-- ============================================================
     LAYOUT DENGAN SIDEBAR (halaman yang butuh login)
     ============================================================ --}}
<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-slate-900 fixed top-0 left-0 h-full z-50 flex flex-col">

        {{-- Brand --}}
        <div class="px-5 py-5 border-b border-slate-700/60">
            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('adopter.dashboard') }}"
               class="flex items-center gap-2">
                <span class="text-2xl">🐾</span>
                <div>
                    <p class="text-white font-bold text-base leading-tight">PawHome</p>
                    <p class="text-slate-400 text-xs">Banjarmasin</p>
                </div>
            </a>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">

            @if(auth()->user()->role === 'admin')
            {{-- ====== MENU ADMIN ====== --}}
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest px-3 pt-1 pb-2">
                Admin Panel
            </p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('admin.dashboard') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">📊</span> Dashboard
            </a>

            <a href="{{ route('admin.species.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('admin.species.*') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">🏷️</span> Kelola Spesies
            </a>

            <a href="{{ route('admin.animals.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('admin.animals.*') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">🐱</span> Kelola Hewan
            </a>

            <a href="{{ route('admin.adoptions.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('admin.adoptions.*') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">📋</span> Pengajuan Adopsi
            </a>

            @else
            {{-- ====== MENU ADOPTER ====== --}}
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest px-3 pt-1 pb-2">
                Menu Adopter
            </p>

            <a href="{{ route('adopter.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('adopter.dashboard') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">📊</span> Dashboard
            </a>

            <a href="{{ route('adopter.animals.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('adopter.animals.*') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">🔍</span> Cari Hewan
            </a>

            <a href="{{ route('adopter.adoptions.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs('adopter.adoptions.*') 
                         ? 'bg-pink-600 text-white shadow-md shadow-pink-900/30' 
                         : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="text-base">📝</span> Pengajuan Saya
            </a>

            @endif
        </nav>

        {{-- User info + Logout --}}
        <div class="px-3 py-4 border-t border-slate-700/60">
            <div class="flex items-center gap-3 px-3 mb-3">
                <div class="w-8 h-8 rounded-full bg-pink-500 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                    <p class="text-slate-400 text-xs capitalize">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
                               text-slate-400 hover:bg-red-600 hover:text-white
                               transition-all duration-150">
                    <span class="text-base">🚪</span> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- KONTEN UTAMA --}}
    <main class="ml-60 flex-1 min-w-0">
        {{-- Top bar --}}
        <div class="bg-white border-b border-gray-100 px-8 py-3.5 flex items-center justify-between sticky top-0 z-40">
            <div class="text-sm text-gray-500">
                @yield('breadcrumb', '<span class="text-gray-400">Selamat datang</span>')
            </div>
            <span class="text-xs text-slate-400">
                {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
            </span>
        </div>

        {{-- Flash messages --}}
        <div class="px-8 pt-6">
            @if(session('success'))
                <div id="flash-success"
                     class="flex items-center gap-3 bg-green-50 border border-green-200
                            text-green-800 px-4 py-3 rounded-xl text-sm mb-4">
                    <span class="text-lg">✅</span>
                    <span>{{ session('success') }}</span>
                    <button onclick="$('#flash-success').fadeOut(200)"
                            class="ml-auto text-green-500 hover:text-green-700 text-lg leading-none">×</button>
                </div>
            @endif

            @if(session('error'))
                <div id="flash-error"
                     class="flex items-center gap-3 bg-red-50 border border-red-200
                            text-red-800 px-4 py-3 rounded-xl text-sm mb-4">
                    <span class="text-lg">❌</span>
                    <span>{{ session('error') }}</span>
                    <button onclick="$('#flash-error').fadeOut(200)"
                            class="ml-auto text-red-500 hover:text-red-700 text-lg leading-none">×</button>
                </div>
            @endif
        </div>

        {{-- Page content --}}
        <div class="px-8 pb-10 pt-2">
            @yield('content')
        </div>
    </main>
</div>

@else
{{-- ============================================================
     LAYOUT PUBLIK (halaman yang tidak butuh login)
     ============================================================ --}}
@yield('content')
@endauth

@stack('scripts')
<script>
    // Auto-hide flash messages setelah 4 detik
    setTimeout(function () {
        $('#flash-success, #flash-error').fadeOut(500);
    }, 4000);
</script>
</body>
</html>