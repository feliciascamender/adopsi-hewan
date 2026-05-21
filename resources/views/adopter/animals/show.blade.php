@extends('layouts.app')
@section('title', 'Detail Hewan — PawHome')
@section('content')
<div class="card max-w-3xl"><h1 class="text-2xl font-bold">{{ $animal->name }}</h1><p class="text-sm text-gray-500 mt-1">{{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan</p><p class="text-sm text-gray-600 mt-5">{{ $animal->description ?: 'Tidak ada deskripsi.' }}</p><div class="mt-6 flex gap-2"><a href="{{ route('adopter.adoptions.create') }}" class="btn-primary">Ajukan Adopsi</a><a href="{{ route('adopter.animals.index') }}" class="btn-secondary">Kembali</a></div></div>
@endsection
