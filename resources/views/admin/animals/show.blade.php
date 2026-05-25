@extends('layouts.app')
@section('title', 'Detail Hewan — PawHome')
@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / 
    <a href="{{ route('admin.animals.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Kelola Hewan</a> / 
    <span class="font-bold text-[#2B2523]">Detail</span>
@endsection
@section('content')
<div class="card">
    <div class="flex flex-col md:flex-row gap-6">
        
        <div class="w-full md:w-1/3">
            @if($animal->photo)
                <img src="{{ asset('storage/' . $animal->photo) }}" alt="Foto {{ $animal->name }}" class="w-full h-64 object-cover rounded-lg border shadow-sm">
            @else
                <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 border border-dashed">Tidak ada foto</div>
            @endif
        </div>

        <div class="w-full md:w-2/3">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold">{{ $animal->name }}</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan</p>
                </div>
                <span class="badge-{{ $animal->status }}">{{ ucfirst($animal->status) }}</span>
            </div>
            
            <p class="text-sm text-gray-600 mt-5 whitespace-pre-line">{{ $animal->description ?: 'Tidak ada deskripsi.' }}</p>
            
            <div class="mt-8 flex gap-3">
                <a href="{{ route('admin.medical.index', $animal) }}" class="btn-primary">Riwayat Medis</a>
                <a href="{{ route('admin.animals.index') }}" class="btn-secondary">Kembali</a>
            </div>
        </div>
        
    </div>
</div>
@endsection