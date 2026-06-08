@extends('layouts.app')

@section('title', 'Detail Hewan — PawHome')

@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <a href="{{ route('admin.animals.index') }}" class="text-surface-muted hover:text-brand-secondary transition-colors">Kelola Hewan</a> /
    <span class="font-bold text-surface-dark">Detail</span>
@endsection

@section('content')
<div class="space-y-5">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.animals.index') }}"
               class="w-9 h-9 rounded-xl bg-surface-white border border-surface-border flex items-center justify-center hover:border-brand-light transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-surface-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h1 class="font-brand font-black text-xl text-surface-dark">Detail Hewan</h1>
                <p class="text-xs text-surface-muted mt-0.5">Informasi lengkap tentang {{ $animal->name }}</p>
            </div>
        </div>

        {{-- Badge status --}}
        <span class="text-xs font-bold px-3 py-1.5 rounded-full
            @switch($animal->status)
                @case('available') bg-status-available-bg text-status-available-text @break
                @case('adopted') bg-status-adopted-bg text-status-adopted-text @break
                @default bg-status-pending-bg text-status-pending-text
            @endswitch">
            @switch($animal->status)
                @case('available') ✅ Tersedia @break
                @case('adopted') 💜 Diadopsi @break
                @default ⏳ Pending
            @endswitch
        </span>
    </div>

    {{-- Layout 2 kolom --}}
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-5">

        {{-- KIRI --}}
        <div class="space-y-5">

            {{-- Foto + Info Utama --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center gap-2">
                    <span class="text-base">🐾</span>
                    <p class="text-sm font-bold text-surface-dark">Informasi Hewan</p>
                </div>
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row gap-6">

                        {{-- Foto --}}
                        <div class="flex-shrink-0">
                            @if($animal->photo)
                                <img src="{{ asset('storage/' . $animal->photo) }}"
                                     alt="{{ $animal->name }}"
                                     class="w-40 h-40 object-cover rounded-2xl border border-surface-border shadow-sm">
                            @else
                                <div class="w-40 h-40 rounded-2xl bg-brand-soft border-2 border-dashed border-brand-light flex items-center justify-center">
                                    <span class="text-5xl">
                                        @switch($animal->species?->name)
                                            @case('Kucing') 🐱 @break
                                            @case('Anjing') 🐶 @break
                                            @case('Kelinci') 🐰 @break
                                            @default 🐾
                                        @endswitch
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="flex-1">
                            <h2 class="font-brand font-black text-2xl text-surface-dark mb-1">{{ $animal->name }}</h2>
                            <p class="text-sm text-surface-muted mb-4">{{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan</p>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-surface-alt rounded-xl px-4 py-3">
                                    <p class="text-xs text-surface-muted font-semibold mb-0.5">Spesies</p>
                                    <p class="text-sm font-bold text-surface-dark">{{ $animal->species?->name ?? '—' }}</p>
                                </div>
                                <div class="bg-surface-alt rounded-xl px-4 py-3">
                                    <p class="text-xs text-surface-muted font-semibold mb-0.5">Gender</p>
                                    <p class="text-sm font-bold text-surface-dark">{{ $animal->gender }}</p>
                                </div>
                                <div class="bg-surface-alt rounded-xl px-4 py-3">
                                    <p class="text-xs text-surface-muted font-semibold mb-0.5">Usia</p>
                                    <p class="text-sm font-bold text-surface-dark">{{ $animal->age_months }} bulan</p>
                                </div>
                                <div class="bg-surface-alt rounded-xl px-4 py-3">
                                    <p class="text-xs text-surface-muted font-semibold mb-0.5">Ditambahkan</p>
                                    <p class="text-sm font-bold text-surface-dark">{{ $animal->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Deskripsi (SUDAH DIRAPATKAN) --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center gap-2">
                    <span class="text-base">📝</span>
                    <p class="text-sm font-bold text-surface-dark">Deskripsi</p>
                </div>
                <div class="p-6">
                    <p class="text-sm text-surface-dark leading-relaxed whitespace-pre-line">{{ $animal->description ?: 'Tidak ada deskripsi.' }}</p>
                </div>
            </div>

        </div>

        {{-- KANAN: Aksi --}}
        <div class="space-y-4">

            {{-- Riwayat Medis --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-5 py-4 border-b border-surface-border bg-surface-alt/50">
                    <p class="text-sm font-bold text-surface-dark">🏥 Riwayat Medis</p>
                </div>
                <div class="p-5">
                    <p class="text-xs text-surface-muted leading-relaxed mb-4">
                        Lihat dan kelola catatan kesehatan serta vaksinasi {{ $animal->name }}.
                    </p>
                    <a href="{{ route('admin.medical.index', $animal) }}"
                       class="w-full flex items-center justify-center gap-2 bg-brand-primary hover:bg-brand-secondary
                              text-white font-bold text-sm py-3 rounded-xl
                              hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-brand-primary/25">
                        Lihat Riwayat Medis
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Edit & Hapus --}}
            <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
                <div class="px-5 py-4 border-b border-surface-border bg-surface-alt/50">
                    <p class="text-sm font-bold text-surface-dark">⚙️ Kelola Data</p>
                </div>
                <div class="p-5 space-y-3">
                    <a href="{{ route('admin.animals.edit', $animal) }}"
                       class="w-full flex items-center justify-center gap-2 bg-brand-soft text-brand-secondary
                              border border-brand-light hover:bg-brand-primary hover:text-white hover:border-brand-primary
                              font-bold text-sm py-3 rounded-xl transition-all duration-200">
                        ✏️ Edit Data Hewan
                    </a>
                    
                    {{-- Form Hapus dengan SweetAlert2 --}}
                    <form id="form-hapus-hewan-{{ $animal->id }}" action="{{ route('admin.animals.destroy', $animal) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" 
                                onclick="konfirmasiHapusHewan('{{ $animal->id }}')"
                                class="w-full flex items-center justify-center gap-2
                                       bg-status-rejected-bg text-status-rejected-text border border-status-rejected-text/20
                                       hover:bg-status-rejected-text hover:text-white
                                       font-bold text-sm py-3 rounded-xl transition-all duration-200">
                            🗑️ Hapus Hewan
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

{{-- Script Animasi SweetAlert2 --}}
@push('scripts')
<script>
    function konfirmasiHapusHewan(id) {
        Swal.fire({
            title: 'Yakin Hapus Hewan?',
            text: "Data hewan ini akan terhapus secara permanen beserta riwayat medisnya.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B91C1C',
            cancelButtonColor: '#A89991',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-hapus-hewan-' + id).submit();
            }
        })
    }
</script>
@endpush
@endsection