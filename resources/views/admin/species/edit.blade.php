@extends('layouts.app')

@section('title', 'Edit Spesies — PawHome')
@section('breadcrumb')
    <span class="text-gray-400">Admin</span> / 
    <a href="{{ route('admin.species.index') }}" class="text-gray-400 hover:text-gray-700">Kelola Spesies</a> / 
    <span class="text-gray-700 font-medium">Edit</span>
@endsection

@section('content')
<div class="card max-w-2xl">
    <h1 class="text-xl font-bold mb-5">Edit Spesies</h1>
    
    <form method="POST" action="{{ route('admin.species.update', $species) }}" class="space-y-4">
        @csrf 
        @method('PUT')
        
        <div>
            <label class="form-label">Nama</label>
            <input name="name" value="{{ old('name', $species->name) }}" class="form-input" required>
            @error('name')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-input" rows="4">{{ old('description', $species->description) }}</textarea>
            @error('description')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-2 mt-6">
            <button type="submit" class="btn-primary">Update</button>
            <a href="{{ route('admin.species.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection