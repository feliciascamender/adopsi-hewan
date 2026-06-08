<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'PawHome Banjarmasin')</title>

    {{-- Favicon Logo PawHome --}}
    <link rel="icon" type="image/png" href="{{ asset('images/Logopurple.png') }}">

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

<div class="min-h-screen bg-surface-alt">
    <aside class="fixed left-0 top-0 z-50 flex h-full w-72 flex-col bg-brand-primary">
        <div class="border-b border-white/10 px-6 py-6">
            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('adopter.dashboard') }}"
               class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl overflow-hidden">
                    <img src="{{ asset('images/Logopurple.png') }}"
                        alt="PawHome Logo"
                        class="h-full w-full object-contain">
                </div>
                <div>
                    <p class="font-brand text-lg font-extrabold leading-tight text-white">PawHome</p>
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
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📊</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.species.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('admin.species.*')
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">🏷️</span>
                    <span>Kelola Spesies</span>
                </a>

                <a href="{{ route('admin.animals.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs(['admin.animals.*', 'admin.medical.*'])
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">🐱</span>
                    <span>Kelola Hewan</span>
                </a>

                <a href="{{ route('admin.adoptions.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('admin.adoptions.*')
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
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
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📊</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('adopter.animals.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('adopter.animals.*')
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">🔍</span>
                    <span>Cari Hewan</span>
                </a>

                <a href="{{ route('adopter.adoptions.index') }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold transition
                   {{ request()->routeIs('adopter.adoptions.*')
                        ? 'bg-brand-secondary text-white shadow-lg shadow-purple-950/20'
                        : 'text-white/65 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">📝</span>
                    <span>Pengajuan Saya</span>
                </a>
            @endif
        </nav>

        <div class="border-t border-white/10 px-4 py-5">
            <div class="mb-4 flex items-center gap-3 rounded-2xl bg-white/5 px-4 py-3">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-accent-base text-sm font-extrabold text-surface-dark">
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
                  class="flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-sm font-bold text-white/55 transition hover:bg-status-rejected-bg hover:text-status-rejected-text">
                    <span class="text-lg">🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="ml-72 min-h-screen">
        <header class="sticky top-0 z-40 border-b border-surface-border bg-white/85 px-8 py-4 backdrop-blur-xl">
            <div class="flex items-center justify-between">
                <div class="text-sm text-surface-muted">
                    @yield('breadcrumb', '<span class="text-surface-muted">Selamat datang</span>')
                </div>

                <div class="flex items-center gap-3">
                    <span class="hidden text-xs font-semibold text-surface-muted sm:inline">
                        {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                    </span>

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-soft text-sm font-extrabold text-brand-primary">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')
<script>
    setTimeout(function () {
        $('#flash-success, #flash-error').fadeOut(500);
    }, 4000);
</script>
</body>
</html>