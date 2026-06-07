@extends('layouts.adopter')
 
@section('title', 'Detail Pengajuan — PawHome')
 
@section('content')
 
{{-- Breadcrumb --}}
<div class="flex items-center gap-2 text-xs text-surface-muted mt-6 mb-6">
    <a href="{{ route('adopter.dashboard') }}" class="hover:text-brand-secondary transition-colors">Beranda</a>
    <span>/</span>
    <a href="{{ route('adopter.adoptions.index') }}" class="hover:text-brand-secondary transition-colors">Pengajuan Saya</a>
    <span>/</span>
    <span class="font-semibold text-surface-dark">Detail Pengajuan</span>
</div>
 
{{-- Layout 2 kolom --}}
<div class="grid grid-cols-1 lg:grid-cols-[1fr_300px] gap-6 pb-10">
 
    {{-- ══════════════════════════════════════
         KIRI: Detail Pengajuan
    ══════════════════════════════════════ --}}
    <div class="space-y-5">
 
        {{-- Header card --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
 
            {{-- Accent bar status --}}
            <div class="h-1.5 w-full
                @switch($adoption->status)
                    @case('approved') bg-status-available-text @break
                    @case('rejected') bg-status-rejected-text @break
                    @default bg-status-pending-text
                @endswitch">
            </div>
 
            <div class="p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h1 class="font-brand font-black text-2xl text-surface-dark">
                            {{ $adoption->full_name }}
                        </h1>
                        <p class="text-xs text-surface-muted mt-1">
                            Diajukan pada {{ $adoption->created_at->format('d M Y') }} pukul {{ $adoption->created_at->format('H:i') }}
                        </p>
                    </div>
 
                    {{-- Badge status --}}
                    <span class="flex-shrink-0 text-xs font-bold px-3 py-1.5 rounded-full
                        @switch($adoption->status)
                            @case('approved') bg-status-available-bg text-status-available-text @break
                            @case('rejected') bg-status-rejected-bg text-status-rejected-text @break
                            @default bg-status-pending-bg text-status-pending-text
                        @endswitch">
                        @switch($adoption->status)
                            @case('approved') ✅ Disetujui @break
                            @case('rejected') ❌ Ditolak @break
                            @default ⏳ Menunggu Review
                        @endswitch
                    </span>
                </div>
            </div>
        </div>
 
        {{-- Hewan yang diajukan --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">🐾</span>
                    <p class="text-sm font-bold text-surface-dark">Hewan yang Diajukan</p>
                </div>
            </div>
            <div class="p-6">
                @if($adoption->animals->isEmpty())
                    <p class="text-sm text-surface-muted">Tidak ada hewan terlampir.</p>
                @else
                <div class="flex flex-wrap gap-3">
                    @foreach($adoption->animals as $animal)
                    <div class="flex items-center gap-3 bg-surface-alt border border-surface-border rounded-xl px-4 py-3">
                        <div class="w-10 h-10 rounded-lg bg-brand-soft flex items-center justify-center flex-shrink-0 overflow-hidden border border-brand-light">
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
                        <div>
                            <p class="text-sm font-bold text-surface-dark">{{ $animal->name }}</p>
                            <p class="text-xs text-surface-muted">{{ $animal->species?->name }} · {{ $animal->gender }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
 
        {{-- Identitas diri --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">👤</span>
                    <p class="text-sm font-bold text-surface-dark">Identitas Diri</p>
                </div>
            </div>
            <div class="p-6">
                <p class="text-xs font-bold text-surface-muted uppercase tracking-wider mb-2">Alamat KTP</p>
                <p class="text-sm text-surface-dark leading-relaxed">{{ $adoption->ktp_address }}</p>
            </div>
        </div>
 
        {{-- Foto rumah --}}
        @if($adoption->house_photo)
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">🏠</span>
                    <p class="text-sm font-bold text-surface-dark">Foto Rumah / Ruangan</p>
                </div>
            </div>
            <div class="p-6">
                <img src="{{ asset('storage/' . $adoption->house_photo) }}"
                     alt="Foto Rumah"
                     class="w-full max-h-72 object-cover rounded-xl border border-surface-border">
            </div>
        </div>
        @endif
 
        {{-- Alasan adopsi --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">💬</span>
                    <p class="text-sm font-bold text-surface-dark">Alasan Adopsi</p>
                </div>
            </div>
            <div class="p-6">
                <p class="text-sm text-surface-muted leading-relaxed">{{ $adoption->reason }}</p>
            </div>
        </div>
 
        {{-- Tombol kembali --}}
        <div>
            <a href="{{ route('adopter.adoptions.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-surface-muted
                      hover:text-brand-secondary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Pengajuan Saya
            </a>
        </div>
 
    </div>
 
    {{-- ══════════════════════════════════════
         KANAN: Status & Catatan Admin
    ══════════════════════════════════════ --}}
    <div class="space-y-4">
 
        {{-- Status card --}}
        <div class="rounded-2xl overflow-hidden sticky top-20
            @switch($adoption->status)
                @case('approved') bg-status-available-bg border border-status-available-text/20 @break
                @case('rejected') bg-status-rejected-bg border border-status-rejected-text/20 @break
                @default bg-status-pending-bg border border-status-pending-text/20
            @endswitch">
 
            <div class="p-5">
                <p class="text-xs font-bold uppercase tracking-wider mb-3
                    @switch($adoption->status)
                        @case('approved') text-status-available-text @break
                        @case('rejected') text-status-rejected-text @break
                        @default text-status-pending-text
                    @endswitch">
                    Status Pengajuan
                </p>
 
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-3xl">
                        @switch($adoption->status)
                            @case('approved') ✅ @break
                            @case('rejected') ❌ @break
                            @default ⏳
                        @endswitch
                    </span>
                    <div>
                        <p class="font-bold text-surface-dark text-sm">
                            @switch($adoption->status)
                                @case('approved') Pengajuan Disetujui @break
                                @case('rejected') Pengajuan Ditolak @break
                                @default Menunggu Review
                            @endswitch
                        </p>
                        <p class="text-xs text-surface-muted mt-0.5">
                            @switch($adoption->status)
                                @case('approved') Tim shelter akan segera menghubungimu. @break
                                @case('rejected') Kamu bisa mengajukan kembali nanti. @break
                                @default Pengajuanmu sedang ditinjau oleh admin.
                            @endswitch
                        </p>
                    </div>
                </div>
 
                {{-- Progress steps --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-2.5">
                        <div class="w-5 h-5 rounded-full bg-status-available-text flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-xs text-surface-dark font-semibold">Pengajuan dikirim</p>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0
                            {{ in_array($adoption->status, ['approved','rejected','pending']) ? 'bg-status-available-text' : 'bg-surface-border' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-xs text-surface-dark font-semibold">Sedang ditinjau admin</p>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0
                            {{ in_array($adoption->status, ['approved','rejected']) ? 'bg-status-available-text' : 'bg-surface-border' }}">
                            @if(in_array($adoption->status, ['approved','rejected']))
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            @endif
                        </div>
                        <p class="text-xs font-semibold
                            {{ in_array($adoption->status, ['approved','rejected']) ? 'text-surface-dark' : 'text-surface-muted' }}">
                            Keputusan final
                        </p>
                    </div>
                </div>
            </div>
        </div>
 
        {{-- Catatan admin --}}
        @if($adoption->admin_note)
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-5 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">💬</span>
                    <p class="text-sm font-bold text-surface-dark">Catatan dari Admin</p>
                </div>
            </div>
            <div class="p-5">
                <p class="text-sm text-surface-muted leading-relaxed italic">
                    "{{ $adoption->admin_note }}"
                </p>
            </div>
        </div>
        @endif
 
        {{-- CTA kalau ditolak --}}
        @if($adoption->status === 'rejected')
        <a href="{{ route('adopter.adoptions.create') }}"
           class="flex items-center justify-center gap-2 bg-brand-primary hover:bg-brand-secondary
                  text-white font-bold text-sm px-5 py-3 rounded-xl
                  hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-brand-primary/25">
            Buat Pengajuan Baru →
        </a>
        @endif
 
    </div>
 
</div>
 
@endsection
 