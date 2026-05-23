@extends('layouts.app')

@section('title', 'Tambah Riwayat Medis — PawHome')

@section('content')
<div class="card max-w-2xl">
    <h1 class="text-xl font-bold mb-5">Tambah Riwayat Medis - {{ $animal->name }}</h1>
    
    <form method="POST" action="{{ route('admin.medical.store', $animal) }}" class="space-y-4">
        @csrf 
        
        @include('admin.medical.partials.form', ['record' => null])
        
        <div class="flex gap-2 mt-6">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('admin.medical.index', $animal) }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection