@extends('layouts.app')
@section('title', 'Detail Spesies — PawHome')
@section('content')
<div class="card mb-5">
    <h1 class="text-xl font-bold">{{ $species->name }}</h1>
    <p class="text-sm text-gray-500 mt-2">{{ $species->description ?: 'Tidak ada deskripsi.' }}</p>
    
    <hr class="my-5 border-gray-100">
    <h2 class="text-lg font-bold mb-3">Daftar Hewan</h2>
    <ul class="list-disc pl-5 mb-6 text-sm text-gray-700">
        @forelse($species->animals as $animal)
            <li>{{ $animal->name }}</li>
        @empty
            <li class="text-gray-400 italic">Belum ada hewan terdaftar di spesies ini.</li>
        @endforelse
    </ul>

    <a href="{{ route('admin.species.index') }}" class="btn-secondary">Kembali</a>
</div>
@endsection