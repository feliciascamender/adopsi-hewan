@extends('layouts.adopter')
 
@section('title', '{{ $animal->name }} — PawHome')
 
@section('content')
 
{{-- Breadcrumb --}}
<div class="flex items-center gap-2 text-xs text-surface-muted mt-6 mb-6">
    <a href="{{ route('adopter.dashboard') }}" class="hover:text-brand-secondary transition-colors">Beranda</a>
    <span>/</span>
    <a href="{{ route('adopter.animals.index') }}" class="hover:text-brand-secondary transition-colors">Cari Hewan</a>
    <span>/</span>
    <span class="font-semibold text-surface-dark">{{ $animal->name }}</span>
</div>
 
{{-- Layout 2 kolom --}}
<div class="grid grid-cols-1 lg:grid-cols-[420px_1fr] gap-6">
 
    {{-- ══════════════════════════════════════
         KIRI: Foto + Info Singkat
    ══════════════════════════════════════ --}}
    <div class="space-y-4">
 
        {{-- Foto --}}
        <div class="relative rounded-3xl overflow-hidden bg-brand-soft border border-surface-border aspect-square">
            @if($animal->photo)
                <img src="{{ asset('storage/' . $animal->photo) }}"
                     alt="{{ $animal->name }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-8xl">
                    @switch($animal->species?->name)
                        @case('Kucing') 🐱 @break
                        @case('Anjing') 🐶 @break
                        @case('Kelinci') 🐰 @break
                        @case('Hamster') 🐹 @break
                        @default 🐾
                    @endswitch
                </div>
            @endif
 
            {{-- Badge status --}}
            <div class="absolute top-4 left-4">
                <span class="text-xs font-bold px-3 py-1.5 rounded-full shadow-sm backdrop-blur-sm
                    {{ $animal->status === 'available'
                        ? 'bg-status-available-bg text-status-available-text'
                        : 'bg-status-adopted-bg text-status-adopted-text' }}">
                    {{ $animal->status === 'available' ? '✅ Tersedia' : '💜 Sudah Diadopsi' }}
                </span>
            </div>
 
            {{-- Badge gender --}}
            <div class="absolute top-4 right-4">
                <span class="text-xs font-bold px-3 py-1.5 rounded-full shadow-sm backdrop-blur-sm
                    {{ $animal->gender === 'Jantan'
                        ? 'bg-status-adopted-bg text-status-adopted-text'
                        : 'bg-status-rejected-bg text-status-rejected-text' }}">
                    {{ $animal->gender }}
                </span>
            </div>
        </div>
 
        {{-- Quick info card --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl p-5">
            <p class="text-xs font-bold text-surface-muted uppercase tracking-wider mb-4">Informasi Singkat</p>
            <div class="grid grid-cols-2 gap-3">
 
                <div class="bg-surface-alt rounded-xl p-3">
                    <p class="text-[10px] font-semibold text-surface-muted mb-1">Spesies</p>
                    <p class="text-sm font-bold text-surface-dark">{{ $animal->species?->name ?? '—' }}</p>
                </div>
 
                <div class="bg-surface-alt rounded-xl p-3">
                    <p class="text-[10px] font-semibold text-surface-muted mb-1">Gender</p>
                    <p class="text-sm font-bold text-surface-dark">{{ $animal->gender }}</p>
                </div>
 
                <div class="bg-surface-alt rounded-xl p-3">
                    <p class="text-[10px] font-semibold text-surface-muted mb-1">Umur</p>
                    <p class="text-sm font-bold text-surface-dark">
                        @if($animal->age_months < 12)
                            {{ $animal->age_months }} bulan
                        @else
                            {{ floor($animal->age_months / 12) }} thn
                            @if($animal->age_months % 12 > 0)
                                {{ $animal->age_months % 12 }} bln
                            @endif
                        @endif
                    </p>
                </div>
 
                <div class="bg-surface-alt rounded-xl p-3">
                    <p class="text-[10px] font-semibold text-surface-muted mb-1">Status</p>
                    <p class="text-sm font-bold
                        {{ $animal->status === 'available' ? 'text-status-available-text' : 'text-status-adopted-text' }}">
                        {{ $animal->status === 'available' ? 'Tersedia' : 'Diadopsi' }}
                    </p>
                </div>
 
            </div>
        </div>
 
    </div>
 
    {{-- ══════════════════════════════════════
         KANAN: Detail + Medis + CTA
    ══════════════════════════════════════ --}}
    <div class="space-y-5">
 
        {{-- Nama + deskripsi --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl p-6">
 
            <div class="flex items-start justify-between gap-4 mb-4">
                <div>
                    <h1 class="font-brand font-black text-3xl text-surface-dark leading-tight">
                        {{ $animal->name }}
                    </h1>
                    <p class="text-sm text-surface-muted mt-1">
                        {{ $animal->species?->name }} ·
                        {{ $animal->gender }} ·
                        {{ $animal->age_months }} bulan
                    </p>
                </div>
            </div>
 
            {{-- Divider --}}
            <div class="border-t border-surface-border my-4"></div>
 
            <p class="text-xs font-bold text-surface-muted uppercase tracking-wider mb-3">Tentang {{ $animal->name }}</p>
            <p class="text-sm text-surface-muted leading-relaxed">
                {{ $animal->description ?: 'Belum ada deskripsi untuk hewan ini.' }}
            </p>
 
        </div>
 
        {{-- Riwayat Medis --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
 
            {{-- Header --}}
            <div class="px-6 py-4 border-b border-surface-border flex items-center gap-2">
                <span class="text-base">🩺</span>
                <div>
                    <p class="text-sm font-bold text-surface-dark">Riwayat Medis</p>
                    <p class="text-xs text-surface-muted">Catatan kesehatan & vaksinasi</p>
                </div>
            </div>
 
            {{-- List rekam medis --}}
            <div class="divide-y divide-surface-border">
                @forelse($animal->medicalRecords->sortByDesc('record_date') as $record)
                <div class="px-6 py-4 flex items-start gap-4">
 
                    {{-- Tanggal --}}
                    <div class="flex-shrink-0 text-center bg-brand-soft border border-brand-light rounded-xl px-3 py-2 min-w-[56px]">
                        <p class="text-[10px] font-bold text-brand-secondary uppercase">
                            {{ $record->record_date->format('M') }}
                        </p>
                        <p class="font-brand font-black text-lg text-brand-primary leading-none">
                            {{ $record->record_date->format('d') }}
                        </p>
                        <p class="text-[10px] text-brand-secondary">
                            {{ $record->record_date->format('Y') }}
                        </p>
                    </div>
 
                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-surface-dark mb-1">{{ $record->title }}</p>
                        @if($record->notes)
                            <p class="text-xs text-surface-muted leading-relaxed">{{ $record->notes }}</p>
                        @endif
                    </div>
 
                </div>
                @empty
                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <span class="text-3xl mb-2">📋</span>
                    <p class="text-sm text-surface-muted">Belum ada riwayat medis tercatat.</p>
                </div>
                @endforelse
            </div>
 
        </div>
 
        {{-- CTA Adopsi --}}
        @if($animal->status === 'available')
        <div class="relative overflow-hidden bg-brand-primary rounded-2xl px-6 py-6">
 
            {{-- Decorative --}}
            <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full bg-brand-secondary opacity-40 pointer-events-none"></div>
            <div class="absolute -bottom-6 right-16 w-20 h-20 rounded-full bg-brand-light opacity-15 pointer-events-none"></div>
 
            <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <p class="font-bold text-white text-base mb-1">
                        Tertarik mengadopsi {{ $animal->name }}? 🐾
                    </p>
                    <p class="text-white/55 text-xs leading-relaxed max-w-sm">
                        Isi formulir adopsi dan tim shelter kami akan menghubungimu setelah proses review selesai.
                    </p>
                </div>
                <a href="{{ route('adopter.adoptions.create') }}"
                   class="flex-shrink-0 inline-flex items-center gap-2 bg-accent-base hover:bg-accent-strong
                          text-surface-dark font-bold text-sm px-6 py-3 rounded-xl
                          hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-black/20 whitespace-nowrap">
                    Ajukan Adopsi →
                </a>
            </div>
        </div>
        @else
        <div class="bg-status-adopted-bg border border-status-adopted-text/20 rounded-2xl px-6 py-5 text-center">
            <span class="text-2xl">💜</span>
            <p class="font-bold text-status-adopted-text mt-2">{{ $animal->name }} sudah diadopsi</p>
            <p class="text-xs text-status-adopted-text/70 mt-1 mb-4">Hewan ini sudah menemukan rumahnya.</p>
            <a href="{{ route('adopter.animals.index') }}"
               class="inline-flex items-center gap-1.5 text-xs font-bold text-status-adopted-text
                      hover:underline transition-colors">
                ← Cari hewan lain
            </a>
        </div>
        @endif
 
        {{-- Tombol kembali --}}
        <div>
            <a href="{{ route('adopter.animals.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-surface-muted
                      hover:text-brand-secondary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke daftar hewan
            </a>
        </div>
 
    </div>
 
</div>
 
@endsection