@extends('layouts.app')

@section('title', 'Tambah Hewan — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / 
    <a href="{{ route('admin.animals.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Kelola Hewan</a> / 
    <span class="font-bold text-[#2B2523]">Tambah</span>
@endsection

@section('content')
<div class="space-y-6">
    
    <div>
        <p class="section-label">Animal Management</p>
        <h1 class="page-title mt-2">Tambah Hewan</h1>
        <p class="page-subtitle">
            Masukkan data hewan baru yang siap dicarikan keluarga adopsi.
        </p>
    </div>

    <div class="card max-w-3xl">
        <form method="POST" action="{{ route('admin.animals.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            @include('admin.animals.partials.form', ['animal' => null])
            
            <div class="flex gap-2 mt-6 pt-4 border-t border-gray-100">
                <button type="submit" class="btn-primary">Simpan Data</button>
                <a href="{{ route('admin.animals.index') }}" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
    
</div>
@endsection