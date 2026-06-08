<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>@yield('title', 'PawHome — Adopter')</title>

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

@if($__env->hasSection('show_footer'))

    {{-- ============================================================
         TENTANG KAMI
         ============================================================ --}}
    <section class="py-20 bg-surface-alt overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-10">

            <div class="bg-white rounded-3xl border border-surface-border shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[360px]">

                    {{-- KIRI: Konten --}}
                    <div class="p-8 sm:p-10 flex flex-col justify-center">
                        <h2 class="font-brand font-extrabold text-2xl sm:text-3xl text-surface-dark leading-tight mb-3">
                            Lahir dari <span class="text-brand-secondary">Kepedulian,</span><br>
                            Tumbuh dari <span class="text-accent-strong">Kepercayaan.</span>
                        </h2>
        
    
                        <div class="flex items-center gap-3 pt-4 border-t border-surface-border">
                            <div class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                                <span class="text-white text-xs font-bold">🖤</span>
                            </div>
                            <p class="text-surface-muted text-xs leading-relaxed">
                                Dikelola oleh tim relawan dan shelter hewan lokal Banjarmasin,
                                <span class="text-brand-secondary font-medium">karena setiap hewan berhak pulang ke rumah yang hangat.</span>
                            </p>
                        </div>
                    </div>

                    {{-- KANAN: GIF --}}
                    <div class="relative hidden lg:flex items-center justify-center bg-white/30 overflow-hidden">
                        <div class="absolute top-[-60px] right-[-60px] w-[150px] h-[150px] rounded-full bg-brand-light opacity-20 pointer-events-none"></div>
                        <div class="absolute bottom-[-40px] left-[-40px] w-[150px] h-[150px] rounded-full bg-accent-base opacity-10 pointer-events-none"></div>
                        <div class="relative z-10 flex flex-col items-center gap-2">
                            <img src="{{ asset('images/Gif2.gif') }}"
                                 alt="PawHome mascot animation"
                                 class="w-[150px] h-auto">
                            <div class="inline-flex items-center gap-1.5 bg-white/80 backdrop-blur-sm border border-surface-border rounded-full px-4 py-2">
                                <span class="w-2 h-2 rounded-full bg-status-available-text animate-pulse flex-shrink-0"></span>
                                <span class="text-[11px] font-medium text-surface-dark">Shelter aktif melayani adopsi</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         FOOTER ADOPTER — Compact Version
         ============================================================ --}}
    <footer class="bg-[#54346b] relative overflow-hidden">

        <div class="absolute top-[-60px] left-[-60px] w-[240px] h-[120px] rounded-full bg-white opacity-[0.04] pointer-events-none"></div>
        <div class="absolute bottom-[-40px] right-[-40px] w-[180px] h-[120px] rounded-full bg-white opacity-[0.04] pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10 py-5">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">

                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logoPurple.png') }}"
                         alt="PawHome Logo"
                         class="h-10 w-auto"
                         style="filter: brightness(0) invert(1) opacity(0.9);">
                    <div>
                        <p class="text-white font-bold text-sm leading-tight">PawHome Banjarmasin</p>
                        <p class="text-white/40 text-xs mt-0.5">Platform adopsi hewan peliharaan</p>
                    </div>
                </div>

                <div class="hidden sm:flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-white/10 border border-white/20 flex items-center justify-center">
                            <img src="{{ asset('images/certified1.webp') }}" class="w-4 h-4 object-contain">
                        </div>
                        <span class="text-white/50 text-xs">Verified Healthy</span>
                    </div>
                    <div class="w-px h-4 bg-white/10"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-white/10 border border-white/20 flex items-center justify-center">
                            <img src="{{ asset('images/certified2.webp') }}" class="w-4 h-4 object-contain">
                        </div>
                        <span class="text-white/50 text-xs">100% Transparent</span>
                    </div>
                    <div class="w-px h-4 bg-white/10"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-white/10 border border-white/20 flex items-center justify-center">
                            <img src="{{ asset('images/certified3.png') }}" class="w-4 h-4 object-contain">
                        </div>
                        <span class="text-white/50 text-xs">Local Shelter</span>
                    </div>
                </div>

                <div class="text-center sm:text-right">
                    <p class="text-white/40 text-xs">Kalimantan Selatan, Indonesia</p>
                    <p class="text-white/20 text-xs mt-0.5">© {{ date('Y') }} PawHome. All rights reserved.</p>
                </div>

            </div>
        </div>

        <div class="relative z-10 overflow-hidden">
            <h2 class="font-brand font-black text-white select-none pointer-events-none leading-none text-center w-full"
                style="opacity: 0.07; font-size: clamp(2rem, 11vw, 11rem); line-height: 0.85;">
                PawHome
            </h2>
        </div>

    </footer>
@endif


@stack('scripts')
<script>
    setTimeout(function () {
        $('#flash-success, #flash-error').fadeOut(500);
    }, 4000);
</script>
</body>
</html>