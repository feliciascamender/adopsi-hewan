@extends('layouts.app')

@section('title', 'Cari Hewan — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Adopter</span> / 
    <span class="font-bold text-[#2B2523]">Cari Hewan</span>
@endsection

@section('content')
<div class="space-y-5">
    
    <div>
        <h1 class="text-2xl font-bold text-[#2B2523]">Cari Hewan</h1>
        <p class="text-sm text-[#6F625D] mt-1">Pilih hewan yang tersedia untuk diajukan adopsi.</p>
    </div>
    
    <form method="GET" class="card grid grid-cols-1 md:grid-cols-3 gap-3">
        <input name="search" 
               value="{{ request('search') }}" 
               placeholder="Cari nama hewan" 
               class="form-input">
               
        <select name="species_id" class="form-input">
            <option value="">Semua spesies</option>
            @foreach($species as $item)
                <option value="{{ $item->id }}" @selected(request('species_id') == $item->id)>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit" class="btn-primary justify-center">Filter</button>
    </form>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse($animals as $animal)
            <div class="card flex flex-col">
                <h2 class="font-bold text-lg text-[#2B2523]">{{ $animal->name }}</h2>
                <p class="text-sm text-[#6F625D] mt-1">
                    {{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan
                </p>
                <p class="text-sm text-[#6F625D] mt-3 flex-grow">
                    {{ Str::limit($animal->description, 100) }}
                </p>
                <a href="{{ route('adopter.animals.show', $animal) }}" class="btn-primary mt-4 text-center block">
                    Detail
                </a>
            </div>
        @empty
            <div class="card md:col-span-3 text-center text-[#A89991] font-semibold py-10">
                Belum ada hewan tersedia.
            </div>
        @endforelse
    </div>
    
    <div>
        {{ $animals->links() }}
    </div>
    
</div>
@endsection