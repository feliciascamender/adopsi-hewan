@extends('layouts.adopter')

@section('show_footer', true)
 
@section('title', 'Dashboard — PawHome')
 
@section('content')
 
{{-- ══════════════════════════════════════════════════
     HERO GREETING
══════════════════════════════════════════════════ --}}
<div class="relative overflow-hidden rounded-3xl bg-brand-primary px-8 py-10 mt-6 mb-6">
 
    {{-- Decorative blobs --}}
    <div class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-brand-secondary opacity-50 pointer-events-none"></div>
    <div class="absolute -bottom-10 right-32 w-40 h-40 rounded-full bg-brand-light opacity-15 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none">
        <svg viewBox="0 0 1440 80" class="w-full opacity-10" preserveAspectRatio="none">
            <path d="M0 40 C360 80 1080 0 1440 40 L1440 80 L0 80 Z" fill="white"/>
        </svg>
    </div>
 
    <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
        <div>
            {{-- Badge waktu --}}
            <div class="inline-flex items-center gap-1.5 bg-white/10 border border-white/15
                        text-white/70 text-xs font-semibold px-3 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-status-available-text animate-pulse"></span>
                {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
            </div>
 
            <h1 class="font-brand font-black text-white text-2xl sm:text-3xl leading-tight mb-2">
                Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋
            </h1>
            <p class="text-white/55 text-sm max-w-md leading-relaxed">
                Temukan sahabat berbulu yang tepat untukmu. Yuk mulai perjalanan adopsimu hari ini.
            </p>
        </div>
 
        {{-- CTA --}}
        <a href="{{ route('adopter.animals.index') }}"
           class="flex-shrink-0 inline-flex items-center gap-2 bg-accent-base hover:bg-accent-strong
                  text-surface-dark font-bold text-sm px-6 py-3 rounded-xl
                  hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-black/20">
            Cari Hewan Sekarang
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
</div>
 
{{-- ══════════════════════════════════════════════════
     STAT CARDS
══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
 
    {{-- Total pengajuan --}}
    <div class="group relative bg-surface-white border border-surface-border rounded-2xl p-5 overflow-hidden
                hover:-translate-y-1 hover:border-brand-light hover:shadow-lg hover:shadow-brand-primary/10 transition-all duration-300">
        <div class="absolute right-[-20px] bottom-[-20px] w-24 h-24 rounded-full bg-brand-soft opacity-60 group-hover:opacity-80 transition-opacity"></div>
        <p class="text-xs font-semibold text-surface-muted mb-1 relative z-10">Total Pengajuan</p>
        <p class="font-brand font-black text-3xl text-brand-primary relative z-10">{{ $myAdoptions->count() }}</p>
        <span class="text-xl absolute right-4 bottom-3 opacity-60 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300">📋</span>
    </div>
 
    {{-- Pending --}}
    <div class="group relative bg-status-pending-bg border border-status-pending-text/20 rounded-2xl p-5 overflow-hidden
                hover:-translate-y-1 hover:shadow-lg hover:shadow-status-pending-text/15 transition-all duration-300">
        <div class="absolute right-[-20px] bottom-[-20px] w-24 h-24 rounded-full bg-status-pending-text/10 group-hover:bg-status-pending-text/15 transition-colors rounded-full"></div>
        <p class="text-xs font-semibold text-status-pending-text mb-1 relative z-10">Menunggu Review</p>
        <p class="font-brand font-black text-3xl text-status-pending-text relative z-10">
            {{ $myAdoptions->where('status', 'pending')->count() }}
        </p>
        <span class="text-xl absolute right-4 bottom-3 opacity-60 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300">⏳</span>
    </div>
 
    {{-- Disetujui --}}
    <div class="group relative bg-status-available-bg border border-status-available-text/20 rounded-2xl p-5 overflow-hidden
                hover:-translate-y-1 hover:shadow-lg hover:shadow-status-available-text/15 transition-all duration-300">
        <div class="absolute right-[-20px] bottom-[-20px] w-24 h-24 rounded-full bg-status-available-text/10 group-hover:bg-status-available-text/15 transition-colors rounded-full"></div>
        <p class="text-xs font-semibold text-status-available-text mb-1 relative z-10">Disetujui</p>
        <p class="font-brand font-black text-3xl text-status-available-text relative z-10">
            {{ $myAdoptions->where('status', 'approved')->count() }}
        </p>
        <span class="text-xl absolute right-4 bottom-3 opacity-60 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300">✅</span>
    </div>
 
    {{-- Ditolak --}}
    <div class="group relative bg-status-rejected-bg border border-status-rejected-text/20 rounded-2xl p-5 overflow-hidden
                hover:-translate-y-1 hover:shadow-lg hover:shadow-status-rejected-text/15 transition-all duration-300">
        <div class="absolute right-[-20px] bottom-[-20px] w-24 h-24 rounded-full bg-status-rejected-text/10 group-hover:bg-status-rejected-text/15 transition-colors rounded-full"></div>
        <p class="text-xs font-semibold text-status-rejected-text mb-1 relative z-10">Ditolak</p>
        <p class="font-brand font-black text-3xl text-status-rejected-text relative z-10">
            {{ $myAdoptions->where('status', 'rejected')->count() }}
        </p>
        <span class="text-xl absolute right-4 bottom-3 opacity-60 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300">❌</span>
    </div>
 
</div>
 
{{-- ══════════════════════════════════════════════════
     KONTEN UTAMA — 2 KOLOM
══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
 
    {{-- ── KIRI: Hewan Tersedia ── --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
 
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-surface-border">
            <div>
                <h2 class="font-bold text-surface-dark text-sm">Hewan Tersedia</h2>
                <p class="text-xs text-surface-muted mt-0.5">Siap untuk diadopsi sekarang</p>
            </div>
            <a href="{{ route('adopter.animals.index') }}"
               class="text-xs font-semibold text-brand-secondary hover:text-brand-primary
                      flex items-center gap-1 transition-colors">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
 
        {{-- List --}}
        <div class="divide-y divide-surface-border">
            @forelse($availableAnimals as $animal)
            <a href="{{ route('adopter.animals.show', $animal) }}"
               class="flex items-center gap-4 px-6 py-4 hover:bg-brand-soft/50 transition-colors group">
 
                {{-- Avatar foto/emoji --}}
                <div class="w-12 h-12 rounded-xl bg-brand-soft flex items-center justify-center flex-shrink-0 overflow-hidden border border-surface-border group-hover:border-brand-light transition-colors">
                    @if($animal->photo)
                        <img src="{{ asset('storage/' . $animal->photo) }}"
                             alt="{{ $animal->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <span class="text-xl">
                            @switch($animal->species?->name)
                                @case('Kucing') 🐱 @break
                                @case('Anjing') 🐶 @break
                                @case('Kelinci') 🐰 @break
                                @default 🐾
                            @endswitch
                        </span>
                    @endif
                </div>
 
                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-surface-dark group-hover:text-brand-secondary transition-colors truncate">
                        {{ $animal->name }}
                    </p>
                    <p class="text-xs text-surface-muted mt-0.5">
                        {{ $animal->species?->name }} · {{ $animal->age_months }} bulan · {{ $animal->gender }}
                    </p>
                </div>
 
                {{-- Badge --}}
                <span class="text-[10px] font-bold px-2.5 py-1 rounded-full flex-shrink-0
                             bg-status-available-bg text-status-available-text">
                    Tersedia
                </span>
            </a>
            @empty
            <div class="flex flex-col items-center justify-center py-12 text-center">
                <span class="text-4xl mb-3">🐾</span>
                <p class="text-sm text-surface-muted">Belum ada hewan tersedia saat ini.</p>
            </div>
            @endforelse
        </div>
 
    </div>
 
    {{-- ── KANAN: Pengajuan Terbaru ── --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
 
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-surface-border">
            <div>
                <h2 class="font-bold text-surface-dark text-sm">Pengajuan Terbaru</h2>
                <p class="text-xs text-surface-muted mt-0.5">Riwayat pengajuan adopsimu</p>
            </div>
            <a href="{{ route('adopter.adoptions.create') }}"
               class="inline-flex items-center gap-1.5 text-xs font-bold bg-brand-primary text-white
                      px-3 py-1.5 rounded-xl hover:bg-brand-secondary transition-colors">
                + Buat Baru
            </a>
        </div>
 
        {{-- List --}}
        <div class="divide-y divide-surface-border">
            @forelse($myAdoptions as $adoption)
            <a href="{{ route('adopter.adoptions.show', $adoption) }}"
               class="flex items-center gap-4 px-6 py-4 hover:bg-brand-soft/50 transition-colors group">
 
                {{-- Icon status --}}
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 text-lg
                    @switch($adoption->status)
                        @case('approved') bg-status-available-bg @break
                        @case('rejected') bg-status-rejected-bg @break
                        @default bg-status-pending-bg
                    @endswitch">
                    @switch($adoption->status)
                        @case('approved') ✅ @break
                        @case('rejected') ❌ @break
                        @default ⏳
                    @endswitch
                </div>
 
                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-surface-dark group-hover:text-brand-secondary transition-colors truncate">
                        {{ $adoption->full_name }}
                    </p>
                    <p class="text-xs text-surface-muted mt-0.5 truncate">
                        {{ $adoption->animals->pluck('name')->join(', ') ?: '—' }}
                        · {{ $adoption->created_at->format('d M Y') }}
                    </p>
                </div>
 
                {{-- Badge status --}}
                <span class="text-[10px] font-bold px-2.5 py-1 rounded-full capitalize flex-shrink-0
                    @switch($adoption->status)
                        @case('approved') bg-status-available-bg text-status-available-text @break
                        @case('rejected') bg-status-rejected-bg text-status-rejected-text @break
                        @default bg-status-pending-bg text-status-pending-text
                    @endswitch">
                    {{ $adoption->status === 'approved' ? 'Disetujui' : ($adoption->status === 'rejected' ? 'Ditolak' : 'Pending') }}
                </span>
            </a>
            @empty
            <div class="flex flex-col items-center justify-center py-12 text-center">
                <span class="text-4xl mb-3">📋</span>
                <p class="text-sm text-surface-muted mb-3">Kamu belum memiliki pengajuan adopsi.</p>
                <a href="{{ route('adopter.adoptions.create') }}"
                   class="text-xs font-bold text-brand-secondary hover:text-brand-primary transition-colors">
                    Buat pengajuan pertamamu →
                </a>
            </div>
            @endforelse
        </div>
 
    </div>
 
</div>
 
@endsection