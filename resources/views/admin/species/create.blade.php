@extends('layouts.app')

@section('title', 'Tambah Spesies — PawHome')

@section('content')
<div class="card max-w-2xl">
    <h1 class="text-xl font-bold mb-5">Tambah Spesies</h1>
    
    <form method="POST" action="{{ route('admin.species.store') }}" class="space-y-4">
        @csrf
        
        <div>
            <label class="form-label">Nama</label>
            <input name="name" value="{{ old('name') }}" class="form-input" required>
            @error('name')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-input" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-2 mt-6">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('admin.species.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection