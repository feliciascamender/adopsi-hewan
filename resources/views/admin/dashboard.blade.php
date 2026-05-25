@extends('layouts.app')

@section('title', 'Dashboard Admin — PawHome')
@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / <span class="font-bold text-[#2B2523]">Dashboard</span>
@endsection

@section('content')
<div class="space-y-8">
    <div class="flex flex-col justify-between gap-4 lg:flex-row lg:items-end">
        <div>
            <p class="section-label">Admin Overview</p>
            <h1 class="page-title mt-2">Dashboard Admin</h1>
            <p class="page-subtitle">
                Ringkasan aktivitas adopsi, data hewan, dan pengajuan terbaru di PawHome.
            </p>
        </div>

        <a href="{{ route('admin.animals.create') }}" class="btn-primary">
            + Tambah Hewan
        </a>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
        <div class="dashboard-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-[#6F625D]">Total Hewan</p>
                    <p class="mt-3 text-4xl font-extrabold text-[#2B2523]">{{ $stats['total_animals'] }}</p>
                </div>
                <div class="dashboard-icon">🐾</div>
            </div>
        </div>

        <div class="dashboard-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-[#6F625D]">Tersedia</p>
                    <p class="mt-3 text-4xl font-extrabold text-green-600">{{ $stats['available'] }}</p>
                </div>
                <div class="dashboard-icon">✅</div>
            </div>
        </div>

        <div class="dashboard-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-[#6F625D]">Menunggu Review</p>
                    <p class="mt-3 text-4xl font-extrabold text-yellow-600">{{ $stats['pending_adoptions'] }}</p>
                </div>
                <div class="dashboard-icon">⏳</div>
            </div>
        </div>

        <div class="dashboard-stat-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-[#6F625D]">Total Adopter</p>
                    <p class="mt-3 text-4xl font-extrabold text-[#E76F2E]">{{ $stats['total_adopters'] }}</p>
                </div>
                <div class="dashboard-icon">👥</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <div class="card">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-extrabold text-[#2B2523]">Pengajuan Terbaru</h2>
                    <p class="mt-1 text-sm text-[#6F625D]">Pengajuan adopter yang baru masuk.</p>
                </div>

                <a href="{{ route('admin.adoptions.index') }}"
                   class="text-sm font-bold text-[#E76F2E] hover:text-[#d95f20]">
                    Lihat semua
                </a>
            </div>

            <div class="space-y-3">
                @forelse($latestAdoptions as $adoption)
                    <div class="rounded-2xl border border-[#F1E7DD] bg-[#FFFDF8] p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-extrabold text-[#2B2523]">{{ $adoption->full_name }}</p>
                                <p class="mt-1 text-xs font-medium text-[#6F625D]">
                                    {{ $adoption->user?->email }}
                                </p>
                            </div>

                            <span class="badge-{{ $adoption->status }}">
                                {{ ucfirst($adoption->status) }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-[#F1D3B2] bg-[#FFFDF8] p-6 text-center text-sm font-semibold text-[#A89991]">
                        Belum ada pengajuan.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="card">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-extrabold text-[#2B2523]">Hewan Terbaru</h2>
                    <p class="mt-1 text-sm text-[#6F625D]">Data hewan yang baru ditambahkan.</p>
                </div>

                <a href="{{ route('admin.animals.index') }}"
                   class="text-sm font-bold text-[#E76F2E] hover:text-[#d95f20]">
                    Kelola hewan
                </a>
            </div>

            <div class="space-y-3">
                @forelse($latestAnimals as $animal)
                    <div class="rounded-2xl border border-[#F1E7DD] bg-[#FFFDF8] p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-extrabold text-[#2B2523]">{{ $animal->name }}</p>
                                <p class="mt-1 text-xs font-medium text-[#6F625D]">
                                    {{ $animal->species?->name }} · {{ $animal->age_months }} bulan
                                </p>
                            </div>

                            <span class="badge-{{ $animal->status }}">
                                {{ ucfirst($animal->status) }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-[#F1D3B2] bg-[#FFFDF8] p-6 text-center text-sm font-semibold text-[#A89991]">
                        Belum ada data hewan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection