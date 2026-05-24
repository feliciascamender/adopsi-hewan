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
<div class="min-h-screen bg-[#FFFDF8]">
    <aside class="fixed left-0 top-0 z-50 flex h-full w-72 flex-col bg-[#2B2523]">
        <div class="border-b border-white/10 px-6 py-6">
            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('adopter.dashboard') }}"
               class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#F7931A] text-2xl shadow-lg shadow-orange-900/20">
                    🐾
                </div>

                <div>
                    <p class="text-lg font-extrabold leading-tight text-white">PawBanjar</p>
                    <p class="text-xs font-semibold text-white/50">Adoption Center</p>
                </div>
            </a>
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto px-4 py-5">
            @if(auth()->user()->role === 'admin')
                <p class="px-3 pb-3 pt-1 text-xs font-extrabold uppercase tracking-[0.2em] text-white/35">
                    Admin Panel
                </p>

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('admin.dashboard')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📊</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.species.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('admin.species.*')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">🏷️</span>
                    <span>Kelola Spesies</span>
                </a>

                <a href="{{ route('admin.animals.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('admin.animals.*')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">🐱</span>
                    <span>Kelola Hewan</span>
                </a>

                <a href="{{ route('admin.adoptions.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('admin.adoptions.*')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📋</span>
                    <span>Pengajuan Adopsi</span>
                </a>
            @else
                <p class="px-3 pb-3 pt-1 text-xs font-extrabold uppercase tracking-[0.2em] text-white/35">
                    Menu Adopter
                </p>

                <a href="{{ route('adopter.dashboard') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('adopter.dashboard')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📊</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('adopter.animals.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('adopter.animals.*')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">🔍</span>
                    <span>Cari Hewan</span>
                </a>

                <a href="{{ route('adopter.adoptions.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('adopter.adoptions.*')
                        ? 'bg-[#E76F2E] text-white shadow-lg shadow-orange-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📝</span>
                    <span>Pengajuan Saya</span>
                </a>
            @endif
        </nav>

        <div class="border-t border-white/10 px-4 py-5">
            <div class="mb-4 flex items-center gap-3 rounded-2xl bg-white/5 px-4 py-3">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-[#F7931A] text-sm font-extrabold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="truncate text-sm font-bold text-white">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs font-semibold capitalize text-white/45">
                        {{ auth()->user()->role }}
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold text-white/55 transition hover:bg-red-600 hover:text-white">
                    <span class="text-lg">🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="ml-72 min-h-screen">
        <header class="sticky top-0 z-40 border-b border-[#F1E7DD] bg-white/85 px-8 py-4 backdrop-blur-xl">
            <div class="flex items-center justify-between">
                <div class="text-sm text-[#6F625D]">
                    @yield('breadcrumb', '<span class="text-[#A89991]">Selamat datang</span>')
                </div>

                <div class="flex items-center gap-3">
                    <span class="hidden text-xs font-semibold text-[#A89991] sm:inline">
                        {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                    </span>

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#FFF3E4] text-sm font-extrabold text-[#E76F2E]">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>
        </header>

        <div class="px-8 pt-6">
            @if(session('success'))
                <div id="flash-success"
                     class="mb-4 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
                    <span class="text-lg">✅</span>
                    <span>{{ session('success') }}</span>
                    <button onclick="$('#flash-success').fadeOut(200)"
                            class="ml-auto text-lg leading-none text-green-500 hover:text-green-700">
                        ×
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div id="flash-error"
                     class="mb-4 flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">
                    <span class="text-lg">❌</span>
                    <span>{{ session('error') }}</span>
                    <button onclick="$('#flash-error').fadeOut(200)"
                            class="ml-auto text-lg leading-none text-red-500 hover:text-red-700">
                        ×
                    </button>
                </div>
            @endif
        </div>

        <div class="px-8 pb-10 pt-2">
            @yield('content')
        </div>
    </main>
</div>
@else
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