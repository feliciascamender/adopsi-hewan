@extends('layouts.app')
 
@section('title', 'Detail Pengajuan — PawHome')
 
@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <a href="{{ route('admin.adoptions.index') }}" class="text-surface-muted hover:text-brand-secondary transition-colors">Pengajuan Adopsi</a> /
    <span class="font-bold text-surface-dark">Detail</span>
@endsection
 
@section('content')
<div class="space-y-5">
 
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.adoptions.index') }}"
               class="w-9 h-9 rounded-xl bg-surface-white border border-surface-border flex items-center justify-center hover:border-brand-light transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-surface-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h1 class="font-brand font-black text-xl text-surface-dark">Detail Pengajuan</h1>
                <p class="text-xs text-surface-muted mt-0.5">{{ $adoption->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
 
        {{-- Badge status --}}
        <span class="text-xs font-bold px-3 py-1.5 rounded-full
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
 
    {{-- Layout 2 kolom --}}
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-5">
 
        {{-- ══════════════════════════════════════
             KIRI: Detail Pengajuan
        ══════════════════════════════════════ --}}
        <div class="space-y-5">
 
            {{-- Info Pemohon --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center gap-2">
                    <span class="text-base">👤</span>
                    <p class="text-sm font-bold text-surface-dark">Identitas Pemohon</p>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-12 h-12 rounded-full bg-accent-base flex items-center justify-center text-lg font-extrabold text-surface-dark flex-shrink-0">
                            {{ strtoupper(substr($adoption->full_name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-surface-dark">{{ $adoption->full_name }}</p>
                            <p class="text-xs text-surface-muted mt-0.5">{{ $adoption->user?->email }}</p>
                            @if($adoption->user?->phone)
                                <p class="text-xs text-surface-muted">{{ $adoption->user->phone }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="border-t border-surface-border pt-4">
                        <p class="text-xs font-bold text-surface-muted uppercase tracking-wider mb-2">Alamat KTP</p>
                        <p class="text-sm text-surface-dark leading-relaxed">{{ $adoption->ktp_address }}</p>
                    </div>
                </div>
            </div>
 
            {{-- Hewan yang diajukan --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center gap-2">
                    <span class="text-base">🐾</span>
                    <p class="text-sm font-bold text-surface-dark">Hewan yang Diajukan</p>
                </div>
                <div class="p-6">
                    @if($adoption->animals->isEmpty())
                        <p class="text-sm text-surface-muted">Tidak ada hewan terlampir.</p>
                    @else
                    <div class="flex flex-wrap gap-3">
                        @foreach($adoption->animals as $animal)
                        <a href="{{ route('admin.animals.show', $animal) }}"
                           class="flex items-center gap-3 bg-surface-alt border border-surface-border rounded-xl px-4 py-3 hover:border-brand-light transition-colors group">
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
                                <p class="text-sm font-bold text-surface-dark group-hover:text-brand-secondary transition-colors">{{ $animal->name }}</p>
                                <p class="text-xs text-surface-muted">{{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bln</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
 
            {{-- Foto Rumah --}}
            @if($adoption->house_photo)
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center gap-2">
                    <span class="text-base">🏠</span>
                    <p class="text-sm font-bold text-surface-dark">Foto Rumah / Ruangan</p>
                </div>
                <div class="p-6">
                    <img src="{{ asset('storage/' . $adoption->house_photo) }}"
                         alt="Foto Rumah"
                         class="w-full max-h-80 object-cover rounded-xl border border-surface-border">
                </div>
            </div>
            @endif
 
            {{-- Alasan Adopsi --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center gap-2">
                    <span class="text-base">💬</span>
                    <p class="text-sm font-bold text-surface-dark">Alasan Adopsi</p>
                </div>
                <div class="p-6">
                    <p class="text-sm text-surface-dark leading-relaxed">{{ $adoption->reason }}</p>
                </div>
            </div>
 
        </div>
 
        {{-- ══════════════════════════════════════
             KANAN: Aksi Admin
        ══════════════════════════════════════ --}}
        <div class="space-y-4">
 
            {{-- Aksi approve/reject — hanya kalau masih pending --}}
            @if($adoption->status === 'pending')
 
            {{-- APPROVE --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-5 py-4 border-b border-surface-border bg-status-available-bg/50">
                    <p class="text-sm font-bold text-status-available-text">✅ Setujui Pengajuan</p>
                </div>
                <div class="p-5">
                    <form id="form-setujui" method="POST" action="{{ route('admin.adoptions.approve', $adoption) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-surface-dark mb-1.5">
                                Catatan untuk Adopter
                                <span class="text-surface-muted font-normal">(opsional)</span>
                            </label>
                            <textarea name="admin_note"
                                      rows="3"
                                      placeholder="Contoh: Selamat! Silakan datang ke shelter pada hari kerja..."
                                      class="w-full px-4 py-3 rounded-xl border border-surface-border bg-surface-alt
                                             text-sm text-surface-dark placeholder-surface-muted resize-none
                                             focus:outline-none focus:ring-2 focus:ring-status-available-text/30 focus:border-transparent transition-all"></textarea>
                        </div>
                        <button type="button"
                                onclick="konfirmasiSetujui()"
                                class="w-full flex items-center justify-center gap-2 bg-status-available-text hover:bg-green-700
                                       text-white font-bold text-sm py-3 rounded-xl
                                       hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-green-500/20">
                            ✅ Setujui Pengajuan
                        </button>
                    </form>
                </div>
            </div>
 
            {{-- REJECT --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-5 py-4 border-b border-surface-border bg-status-rejected-bg/50">
                    <p class="text-sm font-bold text-status-rejected-text">❌ Tolak Pengajuan</p>
                </div>
                <div class="p-5">
                    <form id="form-tolak" method="POST" action="{{ route('admin.adoptions.reject', $adoption) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-surface-dark mb-1.5">
                                Alasan Penolakan
                                <span class="text-surface-muted font-normal">(opsional)</span>
                            </label>
                            <textarea name="admin_note"
                                      rows="3"
                                      placeholder="Contoh: Maaf, kondisi rumah kurang memenuhi syarat..."
                                      class="w-full px-4 py-3 rounded-xl border border-surface-border bg-surface-alt
                                             text-sm text-surface-dark placeholder-surface-muted resize-none
                                             focus:outline-none focus:ring-2 focus:ring-status-rejected-text/30 focus:border-transparent transition-all"></textarea>
                        </div>
                        <button type="button"
                                onclick="konfirmasiTolak()"
                                class="w-full flex items-center justify-center gap-2 bg-status-rejected-text hover:bg-red-700
                                       text-white font-bold text-sm py-3 rounded-xl
                                       hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-red-500/20">
                            ❌ Tolak Pengajuan
                        </button>
                    </form>
                </div>
            </div>
 
            @else
 
            {{-- Sudah diproses --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="p-5">
                    <p class="text-xs font-bold text-surface-muted uppercase tracking-wider mb-3">Hasil Keputusan</p>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-3xl">
                            @switch($adoption->status)
                                @case('approved') ✅ @break
                                @case('rejected') ❌ @break
                            @endswitch
                        </span>
                        <p class="font-bold text-surface-dark text-sm">
                            @switch($adoption->status)
                                @case('approved') Pengajuan telah disetujui @break
                                @case('rejected') Pengajuan telah ditolak @break
                            @endswitch
                        </p>
                    </div>
 
                    @if($adoption->admin_note)
                    <div class="bg-surface-alt rounded-xl p-4 border border-surface-border">
                        <p class="text-xs font-bold text-surface-muted mb-1">Catatan Admin:</p>
                        <p class="text-sm text-surface-dark leading-relaxed italic">
                            "{{ $adoption->admin_note }}"
                        </p>
                    </div>
                    @endif
                </div>
            </div>
 
            @endif
 
        </div>
 
    </div>
 
</div>

{{-- Script SweetAlert2 --}}
@push('scripts')
<script>
    function konfirmasiSetujui() {
        Swal.fire({
            title: 'Setujui Pengajuan?',
            text: "Adopter akan mendapatkan notifikasi bahwa pengajuan disetujui.",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#10B981', 
            cancelButtonColor: '#A89991',
            confirmButtonText: 'Ya, Setujui',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-setujui').submit();
            }
        })
    }

    function konfirmasiTolak() {
        Swal.fire({
            title: 'Yakin Tolak Pengajuan?',
            text: "Data pengajuan akan diubah menjadi status Ditolak.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B91C1C', 
            cancelButtonColor: '#A89991',
            confirmButtonText: 'Ya, Tolak',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-tolak').submit();
            }
        })
    }
</script>
@endpush
@endsection