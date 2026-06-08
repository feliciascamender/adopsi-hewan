@extends('layouts.app')

@section('title', 'Dashboard Admin — PawHome')

@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <span class="font-bold text-surface-dark">Dashboard</span>
@endsection

@section('content')
<div class="space-y-6">

    {{-- ══════════════════════════════════════
         HEADER
    ══════════════════════════════════════ --}}
    <div class="relative overflow-hidden rounded-3xl bg-brand-primary px-8 py-8">

        {{-- Decorative --}}
        <div class="absolute -top-12 -right-12 w-56 h-56 rounded-full bg-brand-secondary opacity-50 pointer-events-none"></div>
        <div class="absolute -bottom-8 right-40 w-36 h-36 rounded-full bg-brand-light opacity-15 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 right-0 pointer-events-none">
            <svg viewBox="0 0 1440 60" class="w-full opacity-10" preserveAspectRatio="none">
                <path d="M0 30 C360 60 1080 0 1440 30 L1440 60 L0 60 Z" fill="white"/>
            </svg>
        </div>

        <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-1.5 bg-white/10 border border-white/15
                            text-white/70 text-xs font-semibold px-3 py-1.5 rounded-full mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-status-available-text animate-pulse"></span>
                    {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                </div>
                <h1 class="font-brand font-black text-white text-2xl sm:text-3xl leading-tight mb-1">
                    Selamat datang, Admin! 👋
                </h1>
                <p class="text-white/55 text-sm">
                    Ringkasan aktivitas adopsi dan data hewan PawHome Banjarmasin.
                </p>
            </div>

            <a href="{{ route('admin.animals.create') }}"
               class="flex-shrink-0 inline-flex items-center gap-2 bg-accent-base hover:bg-accent-strong
                      text-surface-dark font-bold text-sm px-6 py-3 rounded-xl
                      hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-black/20">
                + Tambah Hewan
            </a>
        </div>
    </div>

    {{-- ══════════════════════════════════════
         STAT CARDS
    ══════════════════════════════════════ --}}
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">

        {{-- Total Hewan --}}
        <div class="group relative rounded-[22px] bg-brand-soft p-5 sm:p-6 overflow-hidden min-h-[160px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-brand-primary/15">
            <div class="absolute right-[-40px] bottom-[-40px] w-[180px] h-[180px] rounded-full bg-brand-light opacity-[0.25] group-hover:opacity-[0.35] transition-opacity"></div>
            <div class="absolute right-[-10px] bottom-[-10px] w-[120px] h-[120px] rounded-full bg-brand-secondary opacity-[0.12] group-hover:opacity-[0.18] transition-opacity"></div>
            <div class="flex items-center gap-2 relative z-10">
                <div class="w-8 h-8 rounded-[10px] bg-brand-primary/10 flex items-center justify-center text-sm">🐾</div>
                <span class="text-xs font-bold text-brand-secondary">Total Hewan</span>
            </div>
            <div class="relative z-10">
                <p class="font-brand text-[42px] font-black text-brand-primary leading-none">{{ $stats['total_animals'] }}</p>
                <span class="inline-block mt-2 text-[10px] font-bold px-2.5 py-1 rounded-full bg-brand-primary/10 text-brand-primary">{{ $stats['total_species'] }} spesies</span>
            </div>
            <div class="absolute right-2 bottom-0 text-[64px] z-20 drop-shadow-lg opacity-70 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🐾</div>
        </div>

        {{-- Tersedia --}}
        <div class="group relative rounded-[22px] bg-brand-primary p-5 sm:p-6 overflow-hidden min-h-[160px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-brand-primary/40">
            <div class="absolute right-[-40px] bottom-[-40px] w-[180px] h-[180px] rounded-full bg-brand-light opacity-[0.15] group-hover:opacity-[0.22] transition-opacity"></div>
            <div class="absolute right-[-10px] bottom-[-10px] w-[120px] h-[120px] rounded-full bg-white opacity-[0.07] group-hover:opacity-[0.12] transition-opacity"></div>
            <div class="flex items-center gap-2 relative z-10">
                <div class="w-8 h-8 rounded-[10px] bg-white/15 flex items-center justify-center text-sm">✅</div>
                <span class="text-xs font-bold text-white/70">Siap Diadopsi</span>
            </div>
            <div class="relative z-10">
                <p class="font-brand text-[42px] font-black text-white leading-none">{{ $stats['available'] }}</p>
                <span class="inline-block mt-2 text-[10px] font-bold px-2.5 py-1 rounded-full bg-white/15 text-white">Tersedia sekarang</span>
            </div>
            <div class="absolute right-2 bottom-0 text-[64px] z-20 drop-shadow-lg opacity-60 group-hover:opacity-85 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🏠</div>
        </div>

        {{-- Pending Pengajuan --}}
        <div class="group relative rounded-[22px] bg-status-pending-bg p-5 sm:p-6 overflow-hidden min-h-[160px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-status-pending-text/20">
            <div class="absolute right-[-40px] bottom-[-40px] w-[180px] h-[180px] rounded-full bg-status-pending-text opacity-[0.2] group-hover:opacity-[0.28] transition-opacity"></div>
            <div class="absolute right-[-10px] bottom-[-10px] w-[120px] h-[120px] rounded-full bg-status-pending-text opacity-[0.1] group-hover:opacity-[0.15] transition-opacity"></div>
            <div class="flex items-center gap-2 relative z-10">
                <div class="w-8 h-8 rounded-[10px] bg-status-pending-text/15 flex items-center justify-center text-sm">⏳</div>
                <span class="text-xs font-bold text-status-pending-text">Menunggu Review</span>
            </div>
            <div class="relative z-10">
                <p class="font-brand text-[42px] font-black text-status-pending-text leading-none">{{ $stats['pending_adoptions'] }}</p>
               <a href="{{ route('admin.adoptions.index', ['status' => 'pending']) }}"
                class="inline-flex items-center gap-1 mt-2 text-[14px] font-bold px-2.5 py-1 rounded-full
                        bg-accent-base text-surface-dark
                        hover:bg-accent-strong hover:text-white
                        shadow-sm hover:shadow-md
                        transition-all duration-200 hover:-translate-y-0.5">
                    Tinjau sekarang →
                </a>
            </div>
            <div class="absolute right-2 bottom-0 text-[64px] z-20 drop-shadow-lg opacity-70 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300 origin-bottom-right">📋</div>
        </div>

        {{-- Total Adopter --}}
        <div class="group relative rounded-[22px] bg-accent-soft p-5 sm:p-6 overflow-hidden min-h-[160px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-accent-base/25">
            <div class="absolute right-[-40px] bottom-[-40px] w-[180px] h-[180px] rounded-full bg-accent-base opacity-[0.3] group-hover:opacity-[0.4] transition-opacity"></div>
            <div class="absolute right-[-10px] bottom-[-10px] w-[120px] h-[120px] rounded-full bg-accent-strong opacity-[0.15] group-hover:opacity-[0.2] transition-opacity"></div>
            <div class="flex items-center gap-2 relative z-10">
                <div class="w-8 h-8 rounded-[10px] bg-accent-base/25 flex items-center justify-center text-sm">👥</div>
                <span class="text-xs font-bold text-accent-strong">Total Adopter</span>
            </div>
            <div class="relative z-10">
                <p class="font-brand text-[42px] font-black text-accent-strong leading-none">{{ $stats['total_adopters'] }}</p>
                <span class="inline-block mt-2 text-[10px] font-bold px-2.5 py-1 rounded-full bg-accent-base/25 text-accent-strong">Pengguna terdaftar</span>
            </div>
            <div class="absolute right-2 bottom-0 text-[64px] z-20 drop-shadow-lg opacity-70 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🎀</div>
        </div>

    </div>

    {{-- ══════════════════════════════════════
         STAT SEKUNDER
    ══════════════════════════════════════ --}}
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-surface-white border border-surface-border rounded-2xl px-5 py-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-status-available-bg flex items-center justify-center text-lg flex-shrink-0">✅</div>
            <div>
                <p class="text-xs text-surface-muted font-semibold">Adopsi Disetujui</p>
                <p class="font-brand font-black text-2xl text-status-available-text">{{ $stats['approved'] }}</p>
            </div>
        </div>
        <div class="bg-surface-white border border-surface-border rounded-2xl px-5 py-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-status-adopted-bg flex items-center justify-center text-lg flex-shrink-0">💜</div>
            <div>
                <p class="text-xs text-surface-muted font-semibold">Sedang Ditinjau</p>
                <p class="font-brand font-black text-2xl text-status-adopted-text">{{ $stats['pending_adoptions'] }}</p> 
            </div>
        </div>
        <div class="bg-surface-white border border-surface-border rounded-2xl px-5 py-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-status-rejected-bg flex items-center justify-center text-lg flex-shrink-0">❌</div>
            <div>
                <p class="text-xs text-surface-muted font-semibold">Adopsi Ditolak</p>
                <p class="font-brand font-black text-2xl text-status-rejected-text">{{ $stats['rejected'] }}</p>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════
         2 KOLOM: PENGAJUAN + HEWAN
    ══════════════════════════════════════ --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

        {{-- Pengajuan Terbaru --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-surface-border">
                <div>
                    <h2 class="font-bold text-surface-dark text-sm">Pengajuan Terbaru</h2>
                    <p class="text-xs text-surface-muted mt-0.5">Pengajuan adopter yang baru masuk</p>
                </div>
                <a href="{{ route('admin.adoptions.index') }}"
                   class="text-xs font-semibold text-brand-secondary hover:text-brand-primary flex items-center gap-1 transition-colors">
                    Lihat semua
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <div class="divide-y divide-surface-border">
                @forelse($latestAdoptions as $adoption)
                <a href="{{ route('admin.adoptions.show', $adoption) }}"
                   class="flex items-center gap-4 px-6 py-4 hover:bg-brand-soft/40 transition-colors group">

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

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-surface-dark group-hover:text-brand-secondary transition-colors truncate">
                            {{ $adoption->full_name }}
                        </p>
                        <p class="text-xs text-surface-muted mt-0.5 truncate">
                            {{ $adoption->user?->email }} · {{ $adoption->created_at->format('d M Y') }}
                        </p>
                    </div>

                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-full flex-shrink-0
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
                    <p class="text-sm text-surface-muted">Belum ada pengajuan masuk.</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Hewan Terbaru --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-surface-border">
                <div>
                    <h2 class="font-bold text-surface-dark text-sm">Hewan Terbaru</h2>
                    <p class="text-xs text-surface-muted mt-0.5">Data hewan yang baru ditambahkan</p>
                </div>
                <a href="{{ route('admin.animals.index') }}"
                   class="text-xs font-semibold text-brand-secondary hover:text-brand-primary flex items-center gap-1 transition-colors">
                    Kelola hewan
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <div class="divide-y divide-surface-border">
                @forelse($latestAnimals as $animal)
                <a href="{{ route('admin.animals.show', $animal) }}"
                   class="flex items-center gap-4 px-6 py-4 hover:bg-brand-soft/40 transition-colors group">

                    {{-- Foto/emoji --}}
                    <div class="w-10 h-10 rounded-xl bg-brand-soft flex items-center justify-center flex-shrink-0 overflow-hidden border border-surface-border group-hover:border-brand-light transition-colors">
                        @if($animal->photo)
                            <img src="{{ asset('storage/' . $animal->photo) }}"
                                 alt="{{ $animal->name }}"
                                 class="w-full h-full object-cover">
                        @else
                            <span class="text-lg">
                                @switch($animal->species?->name)
                                    @case('Kucing') 🐱 @break
                                    @case('Anjing') 🐶 @break
                                    @case('Kelinci') 🐰 @break
                                    @default 🐾
                                @endswitch
                            </span>
                        @endif
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-surface-dark group-hover:text-brand-secondary transition-colors truncate">
                            {{ $animal->name }}
                        </p>
                        <p class="text-xs text-surface-muted mt-0.5">
                            {{ $animal->species?->name }} · {{ $animal->age_months }} bulan · {{ $animal->gender }}
                        </p>
                    </div>

                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-full flex-shrink-0
                        @switch($animal->status)
                            @case('available') bg-status-available-bg text-status-available-text @break
                            @case('adopted') bg-status-adopted-bg text-status-adopted-text @break
                            @default bg-status-pending-bg text-status-pending-text
                        @endswitch">
                        {{ $animal->status === 'available' ? 'Tersedia' : ($animal->status === 'adopted' ? 'Diadopsi' : 'Pending') }}
                    </span>
                </a>
                @empty
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <span class="text-4xl mb-3">🐾</span>
                    <p class="text-sm text-surface-muted">Belum ada data hewan.</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection