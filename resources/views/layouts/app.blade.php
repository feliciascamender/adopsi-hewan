{{-- Menu --}}
<nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
    @if(auth()->user()->role === 'admin')
        {{-- MENU ADMIN --}}
        <div class="text-xs text-slate-500 uppercase tracking-wider px-3 mb-2">Admin Panel</div>
        
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.dashboard') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            📊 Dashboard
        </a>
        
        <a href="{{ route('admin.species.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.species.*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            🏷️ Kelola Spesies
        </a>
        
        <a href="{{ route('admin.animals.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.animals.*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            🐱 Kelola Hewan
        </a>
        
        <a href="{{ route('admin.adoptions.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.adoptions.*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            📋 Pengajuan Adopsi
        </a>

    @else
        {{-- MENU ADOPTER --}}
        <div class="text-xs text-slate-500 uppercase tracking-wider px-3 mb-2">Menu Adopter</div>
        
        <a href="{{ route('adopter.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('adopter.dashboard') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            📊 Dashboard
        </a>
        
        <a href="{{ route('adopter.animals.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('adopter.animals.*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            🔍 Cari Hewan
        </a>
        
        <a href="{{ route('adopter.adoptions.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('adopter.adoptions.*') ? 'bg-pink-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                  transition-colors duration-150">
            📝 Pengajuan Saya
        </a>
    @endif
</nav>