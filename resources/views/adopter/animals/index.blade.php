@extends('layouts.adopter')
 
@section('title', 'Cari Hewan — PawHome')
 
@section('content')
 
{{-- Page Header --}}
<div class="mb-6 mt-6">
    <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-3">
        🐾 Semua hewan tersedia
    </div>
    <h1 class="font-brand font-black text-2xl text-surface-dark">Cari Hewan</h1>
    <p class="text-sm text-surface-muted mt-1">Temukan sahabat berbulu yang tepat untukmu.</p>
</div>
 
{{-- Layout Split --}}
<div class="flex gap-5 items-start">
 
    {{-- ══════════════════════════════════════
         SIDEBAR FILTER (sticky)
    ══════════════════════════════════════ --}}
    <aside class="w-64 flex-shrink-0 sticky top-20">
        <form method="GET" action="{{ route('adopter.animals.index') }}" id="filter-form">
 
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
 
                {{-- Header sidebar --}}
                <div class="px-5 py-4 border-b border-surface-border flex items-center justify-between">
                    <p class="text-sm font-bold text-surface-dark">Filter Hewan</p>
                    @if(request()->hasAny(['search', 'species_id', 'gender', 'age']))
                    <a href="{{ route('adopter.animals.index') }}"
                       class="text-xs font-semibold text-status-rejected-text hover:underline">
                        Reset
                    </a>
                    @endif
                </div>
 
                <div class="p-5 space-y-5">
 
                    {{-- Search --}}
                    <div>
                        <label class="block text-xs font-bold text-surface-dark mb-2">Nama Hewan</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-surface-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                            </svg>
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari nama..."
                                   class="w-full pl-9 pr-4 py-2.5 text-sm bg-surface-alt border border-surface-border rounded-xl
                                          text-surface-dark placeholder-surface-muted
                                          focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent transition-all">
                        </div>
                    </div>
 
                    {{-- Spesies --}}
                    <div>
                        <label class="block text-xs font-bold text-surface-dark mb-2">Spesies</label>
                        <div class="space-y-1.5">
                            <label class="flex items-center gap-2.5 cursor-pointer group">
                                <input type="radio" name="species_id" value=""
                                       @checked(!request('species_id'))
                                       class="accent-brand-primary"
                                       onchange="this.form.submit()">
                                <span class="text-sm text-surface-muted group-hover:text-surface-dark transition-colors">Semua spesies</span>
                            </label>
                            @foreach($species as $s)
                            <label class="flex items-center gap-2.5 cursor-pointer group">
                                <input type="radio" name="species_id" value="{{ $s->id }}"
                                       @checked(request('species_id') == $s->id)
                                       class="accent-brand-primary"
                                       onchange="this.form.submit()">
                                <span class="text-sm text-surface-muted group-hover:text-surface-dark transition-colors">{{ $s->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
 
                    {{-- Gender --}}
                    <div>
                        <label class="block text-xs font-bold text-surface-dark mb-2">Gender</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach([''=>'Semua', 'Jantan'=>'Jantan', 'Betina'=>'Betina'] as $val => $label)
                            <a href="{{ request()->fullUrlWithQuery(['gender' => $val]) }}"
                               class="text-xs font-semibold px-3 py-1.5 rounded-full border transition-all
                               {{ request('gender', '') === $val
                                    ? 'bg-brand-primary text-white border-brand-primary'
                                    : 'bg-surface-alt text-surface-muted border-surface-border hover:border-brand-light hover:text-brand-secondary' }}">
                                {{ $label }}
                            </a>
                            @endforeach
                        </div>
                    </div>
 
                    {{-- Umur --}}
                    <div>
                        <label class="block text-xs font-bold text-surface-dark mb-2">Umur</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['' => 'Semua', 'baby' => '< 6 bln', 'young' => '6–12 bln', 'adult' => '> 1 thn'] as $val => $label)
                            <a href="{{ request()->fullUrlWithQuery(['age' => $val]) }}"
                               class="text-xs font-semibold px-3 py-1.5 rounded-full border transition-all
                               {{ request('age', '') === $val
                                    ? 'bg-brand-primary text-white border-brand-primary'
                                    : 'bg-surface-alt text-surface-muted border-surface-border hover:border-brand-light hover:text-brand-secondary' }}">
                                {{ $label }}
                            </a>
                            @endforeach
                        </div>
                    </div>
 
                    {{-- Tombol filter (untuk search) --}}
                    <button type="submit"
                            class="w-full bg-brand-primary hover:bg-brand-secondary text-white
                                   font-bold text-sm py-2.5 rounded-xl transition-colors">
                        Terapkan Filter
                    </button>
 
                </div>
            </div>
 
        </form>
    </aside>
 
    {{-- ══════════════════════════════════════
         KONTEN KANAN: GRID HEWAN
    ══════════════════════════════════════ --}}
    <div class="flex-1 min-w-0">
 
        {{-- Info hasil --}}
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm text-surface-muted">
                Menampilkan <span class="font-bold text-surface-dark">{{ $animals->total() }}</span> hewan tersedia
                @if(request('search'))
                    untuk "<span class="font-bold text-brand-secondary">{{ request('search') }}</span>"
                @endif
            </p>
        </div>
 
        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
            @forelse($animals as $animal)
 
            <a href="{{ route('adopter.animals.show', $animal) }}"
               class="group bg-surface-white border border-surface-border rounded-2xl overflow-hidden
                      hover:border-brand-light hover:shadow-lg hover:shadow-brand-primary/10
                      hover:-translate-y-1 transition-all duration-300 block">
 
                {{-- Foto --}}
                <div class="h-52 bg-brand-soft overflow-hidden relative">
                    @if($animal->photo)
                        <img src="{{ asset('storage/' . $animal->photo) }}"
                             alt="{{ $animal->name }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-5xl
                                    transition-transform duration-500 group-hover:scale-110">
                            @switch($animal->species?->name)
                                @case('Kucing') 🐱 @break
                                @case('Anjing') 🐶 @break
                                @case('Kelinci') 🐰 @break
                                @case('Hamster') 🐹 @break
                                @default 🐾
                            @endswitch
                        </div>
                    @endif
 
                    {{-- Badge spesies --}}
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm
                                 text-surface-dark text-xs font-semibold px-2.5 py-1 rounded-full
                                 border border-surface-border/50 shadow-sm">
                        {{ $animal->species?->name ?? '—' }}
                    </span>
 
                    {{-- Badge gender --}}
                    <span class="absolute top-3 right-3 text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm
                        {{ $animal->gender === 'Jantan'
                            ? 'bg-status-adopted-bg text-status-adopted-text'
                            : 'bg-status-rejected-bg text-status-rejected-text' }}">
                        {{ $animal->gender }}
                    </span>
 
                    {{-- Overlay hover --}}
                    <div class="absolute inset-0 bg-brand-primary/0 group-hover:bg-brand-primary/8
                                transition-colors duration-500 pointer-events-none"></div>
                </div>
 
                {{-- Info --}}
                <div class="p-4">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="font-bold text-surface-dark text-base group-hover:text-brand-secondary transition-colors">
                            {{ $animal->name }}
                        </h3>
                        <span class="text-xs text-surface-muted bg-surface-alt px-2 py-0.5 rounded-full">
                            {{ $animal->age_months }} bln
                        </span>
                    </div>
                    <p class="text-xs text-surface-muted leading-relaxed mb-4">
                        {{ Str::limit($animal->description, 70) ?: 'Tidak ada deskripsi.' }}
                    </p>
 
                    {{-- CTA --}}
                    <div class="flex items-center justify-center gap-1.5 text-xs font-semibold
                                bg-brand-soft group-hover:bg-brand-primary
                                text-brand-secondary group-hover:text-white
                                py-2 rounded-xl transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Lihat Detail
                    </div>
                </div>
            </a>
 
            @empty
            <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                <span class="text-5xl mb-4">🔍</span>
                <p class="text-surface-dark font-bold mb-1">Hewan tidak ditemukan</p>
                <p class="text-sm text-surface-muted mb-4">Coba ubah filter pencarianmu.</p>
                <a href="{{ route('adopter.animals.index') }}"
                   class="text-xs font-bold text-brand-secondary hover:text-brand-primary transition-colors">
                    Reset semua filter →
                </a>
            </div>
            @endforelse
        </div>
 
        {{-- Pagination --}}
        @if($animals->hasPages())
        <div class="mt-8">
            {{ $animals->withQueryString()->links() }}
        </div>
        @endif
 
    </div>
 
</div>
 
@endsection