@extends('layouts.app')
@section('title', 'Detail Spesies — PawHome')
@section('content')
<div class="card">
    <h1 class="text-xl font-bold">{{ $species->name }}</h1>
    <p class="text-sm text-gray-500 mt-2">{{ $species->description ?: 'Tidak ada deskripsi.' }}</p>
    <a href="{{ route('admin.species.index') }}" class="btn-secondary mt-5">Kembali</a>
</div>
@endsection
