<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PawHome Banjarmasin')</title>

    {{-- Tailwind + app CSS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- jQuery via CDN (tetap dipakai) --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900">

@auth
<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-slate-900 fixed top-0 left-0 h-full z-50 flex flex-col">
        {{-- Brand --}}
        <div class="px-5 py-5 border-b border-slate-700">
            <span class="text-white font-bold text-lg flex items-center gap-2">
                🐾 PawHome BJM
            </span>
            <span class="text-slate-400 text-xs mt-1 block">Adopsi Hewan Banjarmasin</span>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('admin/dashboard') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.species.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('admin/species*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    🏷️ Spesies
                </a>
                <a href="{{ route('admin.animals.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('admin/animals*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    🐱 Hewan
                </a>
                <a href="{{ route('admin.adoptions.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('admin/adoptions*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    📋 Pengajuan Adopsi
                </a>
            @else
                <a href="{{ route('adopter.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('adopter/dashboard') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    📊 Dashboard
                </a>
                <a href="{{ route('animals.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('animals*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    🔍 Cari Hewan
                </a>
                <a href="{{ route('adopter.adoptions.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                          {{ request()->is('adopter/adoptions*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                          transition-colors duration-150">
                    📝 Pengajuan Saya
                </a>
            @endif
        </nav>

        {{-- User info + Logout --}}
        <div class="px-3 py-4 border-t border-slate-700">
            <div class="px-3 mb-3">
                <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                <p class="text-slate-400 text-xs capitalize">{{ auth()->user()->role }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                               text-slate-300 hover:bg-red-600 hover:text-white
                               transition-colors duration-150">
                    🚪 Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- KONTEN UTAMA --}}
    <main class="ml-60 flex-1 p-8">
        {{-- Flash message --}}
        @if(session('success'))
            <div id="flash-success"
                 class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200
                        text-green-800 px-4 py-3 rounded-lg text-sm">
                ✅ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div id="flash-error"
                 class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200
                        text-red-800 px-4 py-3 rounded-lg text-sm">
                ❌ {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</div>
@else
    {{-- Halaman publik (belum login) tidak pakai sidebar --}}
    @yield('content')
@endauth

@stack('scripts')
<script>
    // Auto-hide flash message setelah 4 detik
    setTimeout(() => {
        $('#flash-success, #flash-error').fadeOut(500);
    }, 4000);
</script>
</body>
</html>