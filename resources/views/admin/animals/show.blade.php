@extends('layouts.app')
@section('title', 'Detail Hewan — PawHome')
@section('content')
<div class="card">
    <div class="flex items-start justify-between"><div><h1 class="text-2xl font-bold">{{ $animal->name }}</h1><p class="text-sm text-gray-500 mt-1">{{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan</p></div><span class="badge-{{ $animal->status }}">{{ ucfirst($animal->status) }}</span></div>
    <p class="text-sm text-gray-600 mt-5">{{ $animal->description ?: 'Tidak ada deskripsi.' }}</p>
    <div class="mt-6 flex gap-2"><a href="{{ route('admin.medical.index', $animal) }}" class="btn-primary">Riwayat Medis</a><a href="{{ route('admin.animals.index') }}" class="btn-secondary">Kembali</a></div>
</div>
@endsection
