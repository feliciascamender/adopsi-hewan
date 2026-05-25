@extends('layouts.app')

@section('title', 'Buat Pengajuan — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Adopter</span> / 
    <a href="{{ route('adopter.adoptions.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Pengajuan Saya</a> / 
    <span class="font-bold text-[#2B2523]">Buat</span>
@endsection

@section('content')
<div class="card max-w-3xl">
    <h1 class="text-xl font-bold text-[#2B2523] mb-5">Buat Pengajuan Adopsi</h1>
    
    <form method="POST" action="{{ route('adopter.adoptions.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        
        <div>
            <label class="form-label">Nama Lengkap</label>
            <input name="full_name" value="{{ old('full_name', auth()->user()->name) }}" class="form-input" required>
            @error('full_name')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="form-label">Alamat KTP</label>
            <textarea name="ktp_address" class="form-input" rows="3" required>{{ old('ktp_address', auth()->user()->address) }}</textarea>
            @error('ktp_address')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="form-label">Foto Rumah</label>
            <input type="file" name="house_photo" class="form-input" required>
            @error('house_photo')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="form-label">Pilih Hewan</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-2">
                @foreach($availableAnimals as $animal)
                <label class="flex items-center gap-3 border border-[#F1E7DD] rounded-xl p-3 text-sm cursor-pointer transition hover:bg-[#FFF3E4] hover:border-[#E76F2E]">
                    <input type="checkbox" name="animal_ids[]" value="{{ $animal->id }}" @checked(in_array($animal->id, old('animal_ids', []))) class="accent-[#E76F2E]"> 
                    <div>
                        <span class="font-bold text-[#2B2523]">{{ $animal->name }}</span> 
                        <span class="text-[#A89991]">({{ $animal->species?->name }})</span>
                    </div>
                </label>
                @endforeach
            </div>
            @error('animal_ids')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="form-label">Alasan Adopsi</label>
            <textarea name="reason" class="form-input" rows="5" required>{{ old('reason') }}</textarea>
            @error('reason')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-2 mt-6 pt-5 border-t border-[#F1E7DD]">
            <button type="submit" class="btn-primary">Kirim Pengajuan</button>
            <a href="{{ route('adopter.adoptions.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection