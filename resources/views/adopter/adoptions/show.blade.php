@extends('layouts.app')

@section('title', 'Detail Pengajuan — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Adopter</span> / 
    <a href="{{ route('adopter.adoptions.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Pengajuan Saya</a> / 
    <span class="font-bold text-[#2B2523]">Detail</span>
@endsection

@section('content')
<div class="card max-w-3xl">
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#2B2523]">{{ $adoption->full_name }}</h1>
            <p class="text-sm text-[#6F625D] mt-1">{{ $adoption->created_at->format('d M Y') }}</p>
        </div>
        <span class="badge-{{ $adoption->status }}">
            {{ ucfirst($adoption->status) }}
        </span>
    </div>

    <div class="mt-5 space-y-4 text-sm">
        <div>
            <p class="font-semibold text-[#2B2523]">Hewan</p>
            <p class="text-[#6F625D] mt-1">{{ $adoption->animals->pluck('name')->join(', ') }}</p>
        </div>
        <div>
            <p class="font-semibold text-[#2B2523]">Alamat KTP</p>
            <p class="text-[#6F625D] mt-1">{{ $adoption->ktp_address }}</p>
        </div>
        <div>
            <p class="font-semibold text-[#2B2523]">Alasan</p>
            <p class="text-[#6F625D] mt-1">{{ $adoption->reason }}</p>
        </div>
        
        @if($adoption->admin_note)
        <div class="bg-[#FFFDF8] border border-[#F1E7DD] rounded-xl p-4 mt-2">
            <p class="font-semibold text-[#2B2523]">Catatan Admin</p>
            <p class="text-[#6F625D] mt-1">{{ $adoption->admin_note }}</p>
        </div>
        @endif
    </div>
    
    <div class="mt-6 pt-5 border-t border-[#F1E7DD]">
        <a href="{{ route('adopter.adoptions.index') }}" class="btn-secondary">Kembali</a>
    </div>
</div>
@endsection