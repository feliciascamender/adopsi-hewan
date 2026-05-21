@extends('layouts.app')

@section('title', 'Dashboard Admin — PawHome Banjarmasin')
@section('breadcrumb', '<span class="text-gray-400">Admin</span> / <span class="text-gray-700 font-medium">Dashboard</span>')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Admin</h1>
        <p class="text-sm text-gray-500 mt-1">Ringkasan data PawHome Banjarmasin.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="card"><p class="text-sm text-gray-500">Total Hewan</p><p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_animals'] }}</p></div>
        <div class="card"><p class="text-sm text-gray-500">Tersedia</p><p class="text-3xl font-bold text-green-600 mt-2">{{ $stats['available'] }}</p></div>
        <div class="card"><p class="text-sm text-gray-500">Menunggu Review</p><p class="text-3xl font-bold text-yellow-600 mt-2">{{ $stats['pending_adoptions'] }}</p></div>
        <div class="card"><p class="text-sm text-gray-500">Total Adopter</p><p class="text-3xl font-bold text-pink-600 mt-2">{{ $stats['total_adopters'] }}</p></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-gray-900">Pengajuan Terbaru</h2>
                <a href="{{ route('admin.adoptions.index') }}" class="text-sm text-pink-600 hover:text-pink-700">Lihat semua</a>
            </div>
            <div class="space-y-3">
                @forelse($latestAdoptions as $adoption)
                    <div class="border border-gray-100 rounded-xl p-3">
                        <p class="text-sm font-semibold text-gray-800">{{ $adoption->full_name }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $adoption->user?->email }} · <span class="capitalize">{{ $adoption->status }}</span></p>
                    </div>
                @empty
                    <p class="text-sm text-gray-400">Belum ada pengajuan.</p>
                @endforelse
            </div>
        </div>

        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-gray-900">Hewan Terbaru</h2>
                <a href="{{ route('admin.animals.index') }}" class="text-sm text-pink-600 hover:text-pink-700">Kelola hewan</a>
            </div>
            <div class="space-y-3">
                @forelse($latestAnimals as $animal)
                    <div class="border border-gray-100 rounded-xl p-3">
                        <p class="text-sm font-semibold text-gray-800">{{ $animal->name }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $animal->species?->name }} · <span class="capitalize">{{ $animal->status }}</span></p>
                    </div>
                @empty
                    <p class="text-sm text-gray-400">Belum ada data hewan.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
