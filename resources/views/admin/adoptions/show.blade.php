@extends('layouts.app')

@section('title', 'Detail Pengajuan — PawHome')

@section('breadcrumb')
    <span class="text-gray-400">Admin</span> / 
    <a href="{{ route('admin.adoptions.index') }}" class="text-gray-400 hover:text-gray-700">Pengajuan Adopsi</a> / 
    <span class="text-gray-700 font-medium">Detail</span>
@endsection

@section('content')
<div class="card max-w-4xl">
    
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-bold">{{ $adoption->full_name }}</h1>
            <p class="text-sm text-gray-500 mt-1">
                {{ $adoption->user?->email }} · {{ $adoption->created_at->format('d M Y') }}
            </p>
        </div>
        <span class="badge-{{ $adoption->status }}">
            {{ ucfirst($adoption->status) }}
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 text-sm">
        <div>
            <p class="font-semibold text-gray-700">Alamat KTP</p>
            <p class="text-gray-600 mt-1">{{ $adoption->ktp_address }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Hewan</p>
            <p class="text-gray-600 mt-1">{{ $adoption->animals->pluck('name')->join(', ') }}</p>
        </div>
    </div>

    <div class="mt-5">
        <p class="font-semibold text-gray-700">Alasan</p>
        <p class="text-sm text-gray-600 mt-1">{{ $adoption->reason }}</p>
    </div>

    @if($adoption->admin_note)
    <div class="mt-5 bg-gray-50 border rounded-xl p-4">
        <p class="font-semibold text-gray-700">Catatan Admin</p>
        <p class="text-sm text-gray-600 mt-1">{{ $adoption->admin_note }}</p>
    </div>
    @endif

    @if($adoption->status === 'pending')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-6 pt-6 border-t border-gray-100">
        
        <form method="POST" action="{{ route('admin.adoptions.approve', $adoption) }}" class="space-y-2">
            @csrf 
            @method('PATCH')
            <textarea name="admin_note" class="form-input" placeholder="Catatan persetujuan (opsional)"></textarea>
            <button type="submit" class="btn-primary w-full justify-center">Setujui</button>
        </form>

        <form method="POST" action="{{ route('admin.adoptions.reject', $adoption) }}" class="space-y-2">
            @csrf 
            @method('PATCH')
            <textarea name="admin_note" class="form-input" placeholder="Alasan penolakan (opsional)"></textarea>
            <button type="submit" class="btn-danger w-full justify-center">Tolak</button>
        </form>

    </div>
    @endif

    <div class="mt-6 pt-6 border-t border-gray-100">
        <a href="{{ route('admin.adoptions.index') }}" class="btn-secondary">Kembali</a>
    </div>

</div>
@endsection