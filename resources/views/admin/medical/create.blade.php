@extends('layouts.app')

@section('title', 'Tambah Riwayat Medis — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / 
    <a href="{{ route('admin.animals.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Kelola Hewan</a> / 
    <span class="font-bold text-[#2B2523]">Tambah Riwayat</span>
@endsection

@section('content')
<div class="card max-w-2xl">
    <h1 class="text-xl font-bold text-[#2B2523] mb-5">Tambah Riwayat Medis - {{ $animal->name }}</h1>
    
    <form method="POST" action="{{ route('admin.medical.store', $animal) }}" class="space-y-4">
        @csrf 
        
        @include('admin.medical.partials.form', ['record' => null])
        
        <div class="flex gap-2 mt-6 pt-5 border-t border-[#F1E7DD]">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('admin.medical.index', $animal) }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection