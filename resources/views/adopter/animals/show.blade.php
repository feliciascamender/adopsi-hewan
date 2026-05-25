@extends('layouts.app')

@section('title', 'Detail Hewan — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Adopter</span> / 
    <a href="{{ route('adopter.animals.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Cari Hewan</a> / 
    <span class="font-bold text-[#2B2523]">Detail</span>
@endsection

@section('content')
<div class="card max-w-3xl">
    <h1 class="text-2xl font-bold text-[#2B2523]">{{ $animal->name }}</h1>
    
    <p class="text-sm text-[#6F625D] mt-1">
        {{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan
    </p>
    
    <p class="text-sm text-[#6F625D] mt-5">
        {{ $animal->description ?: 'Tidak ada deskripsi.' }}
    </p>
    
    <div class="mt-6 flex gap-2 pt-4 border-t border-[#F1E7DD]">
        <a href="{{ route('adopter.adoptions.create') }}" class="btn-primary">Ajukan Adopsi</a>
        <a href="{{ route('adopter.animals.index') }}" class="btn-secondary">Kembali</a>
    </div>
</div>
@endsection