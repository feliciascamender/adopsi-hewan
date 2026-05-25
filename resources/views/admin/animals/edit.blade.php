@extends('layouts.app')

@section('title', 'Edit Hewan — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / 
    <a href="{{ route('admin.animals.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Kelola Hewan</a> / 
    <span class="font-bold text-[#2B2523]">Edit</span>
@endsection

@section('content')
<div class="card max-w-3xl">
    <h1 class="text-xl font-bold mb-5">Edit Hewan</h1>
    
    <form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf 
        @method('PUT')
        
        @include('admin.animals.partials.form', ['animal' => $animal])
        
        <div class="flex gap-2 mt-6">
            <button type="submit" class="btn-primary">Update</button>
            <a href="{{ route('admin.animals.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection