@extends('layouts.adopter')

@section('show_footer', true)
 
@section('title', 'Pengajuan Saya — PawHome')
 
@section('content')
 
{{-- Header --}}
<div class="flex items-start justify-between mt-6 mb-6">
   <div class="flex-1 flex flex-col items-center text-center">
        <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-3">
            <i class="fa-solid fa-clipboard" style="color: #debd5b;"></i> Riwayat adopsi
        </div>
        <h1 class="font-brand font-black text-2xl text-surface-dark">Pengajuan Saya</h1>
    </div>
    <a href="{{ route('adopter.adoptions.create') }}"
       class="inline-flex items-center gap-2 bg-brand-primary hover:bg-brand-secondary
              text-white font-bold text-sm px-5 py-2.5 rounded-xl
              hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-brand-primary/25 mt-1">
        + Buat Pengajuan
    </a>
</div>
 
{{-- Status filter pills --}}
<div class="flex items-center gap-2 mb-6 flex-wrap">
    @foreach(['' => 'Semua', 'pending' => 'Pending', 'approved' => 'Disetujui', 'rejected' => 'Ditolak'] as $val => $label)
    <a href="{{ request()->fullUrlWithQuery(['status' => $val]) }}"
       class="text-xs font-semibold px-4 py-2 rounded-full border transition-all
       {{ request('status', '') === $val
            ? 'bg-brand-primary text-white border-brand-primary shadow-sm'
            : 'bg-surface-white text-surface-muted border-surface-border hover:border-brand-light hover:text-brand-secondary' }}">
        {{ $label }}
    </a>
    @endforeach
</div>
 
{{-- List pengajuan --}}
<div class="space-y-4">
    @forelse($adoptions as $adoption)
 
    <a href="{{ route('adopter.adoptions.show', $adoption) }}"
       class="group block bg-surface-white border border-surface-border rounded-2xl overflow-hidden
              hover:border-brand-light hover:shadow-lg hover:shadow-brand-primary/10
              transition-all duration-300">
 
        <div class="flex items-stretch">
 
            {{-- Accent bar kiri berdasar status --}}
            <div class="w-1.5 flex-shrink-0
                @switch($adoption->status)
                    @case('approved') bg-status-available-text @break
                    @case('rejected') bg-status-rejected-text @break
                    @default bg-status-pending-text
                @endswitch">
            </div>
 
            {{-- Konten --}}
            <div class="flex-1 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">
 
                {{-- Icon status --}}
                <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-xl
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
 
                {{-- Info utama --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 flex-wrap mb-1">
                        <h3 class="text-sm font-bold text-surface-dark group-hover:text-brand-secondary transition-colors">
                            {{ $adoption->full_name }}
                        </h3>
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full
                            @switch($adoption->status)
                                @case('approved') bg-status-available-bg text-status-available-text @break
                                @case('rejected') bg-status-rejected-bg text-status-rejected-text @break
                                @default bg-status-pending-bg text-status-pending-text
                            @endswitch">
                            {{ $adoption->status === 'approved' ? 'Disetujui' : ($adoption->status === 'rejected' ? 'Ditolak' : 'Pending') }}
                        </span>
                    </div>
 
                    {{-- Hewan yang diajukan --}}
                    <div class="flex items-center gap-1.5 flex-wrap">
                        <span class="text-xs text-surface-muted">Hewan:</span>
                        @forelse($adoption->animals as $animal)
                            <span class="text-xs font-semibold bg-brand-soft text-brand-secondary px-2 py-0.5 rounded-full">
                                {{ $animal->name }}
                            </span>
                        @empty
                            <span class="text-xs text-surface-muted">—</span>
                        @endforelse
                    </div>
 
                    {{-- Catatan admin kalau ada --}}
                    @if($adoption->admin_note)
                    <div class="mt-2 flex items-start gap-1.5">
                        <span class="text-xs">💬</span>
                        <p class="text-xs text-surface-muted italic leading-relaxed">
                            "{{ Str::limit($adoption->admin_note, 80) }}"
                        </p>
                    </div>
                    @endif
                </div>
 
                {{-- Tanggal + arrow --}}
                <div class="flex-shrink-0 flex flex-col items-end gap-2">
                    <p class="text-xs text-surface-muted">{{ $adoption->created_at->format('d M Y') }}</p>
                    <p class="text-xs text-surface-muted">{{ $adoption->created_at->format('H:i') }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4 text-surface-muted group-hover:text-brand-secondary group-hover:translate-x-1 transition-all duration-200"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
 
            </div>
        </div>
 
    </a>
 
    @empty
    <div class="bg-surface-white border border-surface-border rounded-2xl flex flex-col items-center justify-center py-20 text-center">
        <span class="text-5xl mb-4">📋</span>
        <p class="font-bold text-surface-dark mb-1">Belum ada pengajuan</p>
        <p class="text-sm text-surface-muted mb-6 max-w-xs">
            Kamu belum pernah mengajukan adopsi. Yuk temukan hewan yang cocok untukmu!
        </p>
        <a href="{{ route('adopter.animals.index') }}"
           class="inline-flex items-center gap-2 bg-brand-primary hover:bg-brand-secondary
                  text-white font-bold text-sm px-6 py-2.5 rounded-xl transition-colors">
            Cari Hewan Sekarang →
        </a>
    </div>
    @endforelse
</div>
 
{{-- Pagination --}}
@if($adoptions->hasPages())
<div class="mt-8">
    {{ $adoptions->withQueryString()->links() }}
</div>
@endif
 
@endsection
 