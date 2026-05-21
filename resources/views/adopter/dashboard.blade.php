@extends('layouts.app')

@section('title', 'Dashboard Adopter — PawHome Banjarmasin')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Adopter</h1>
        <p class="text-sm text-gray-500 mt-1">Selamat datang, {{ auth()->user()->name }}. Temukan sahabat berbulu barumu di sini.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-gray-900">Hewan Tersedia</h2>
                <a href="{{ route('adopter.animals.index') }}" class="text-sm text-pink-600 hover:text-pink-700">Lihat semua</a>
            </div>
            <div class="space-y-3">
                @forelse($availableAnimals as $animal)
                    <div class="border border-gray-100 rounded-xl p-3">
                        <p class="text-sm font-semibold text-gray-800">{{ $animal->name }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $animal->species?->name }} · {{ $animal->age_months }} bulan · {{ $animal->gender }}</p>
                    </div>
                @empty
                    <p class="text-sm text-gray-400">Belum ada hewan tersedia saat ini.</p>
                @endforelse
            </div>
        </div>

        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-gray-900">Pengajuan Saya</h2>
                <a href="{{ route('adopter.adoptions.index') }}" class="text-sm text-pink-600 hover:text-pink-700">Lihat semua</a>
            </div>
            <div class="space-y-3">
                @forelse($myAdoptions as $adoption)
                    <div class="border border-gray-100 rounded-xl p-3">
                        <p class="text-sm font-semibold text-gray-800">{{ $adoption->full_name }}</p>
                        <p class="text-xs text-gray-500 mt-1"><span class="capitalize">{{ $adoption->status }}</span> · {{ $adoption->created_at->format('d M Y') }}</p>
                    </div>
                @empty
                    <p class="text-sm text-gray-400">Kamu belum memiliki pengajuan adopsi.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
