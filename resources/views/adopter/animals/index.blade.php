@extends('layouts.app')
@section('title', 'Cari Hewan — PawHome')
@section('breadcrumb', '<span class="text-gray-400">Adopter</span> / <span class="text-gray-700 font-medium">Cari Hewan</span>')
@section('content')
<div class="space-y-5">
    <div><h1 class="text-2xl font-bold text-gray-900">Cari Hewan</h1><p class="text-sm text-gray-500 mt-1">Pilih hewan yang tersedia untuk diajukan adopsi.</p></div>
    <form method="GET" class="card grid grid-cols-1 md:grid-cols-3 gap-3"><input name="search" value="{{ request('search') }}" placeholder="Cari nama hewan" class="form-input"><select name="species_id" class="form-input"><option value="">Semua spesies</option>@foreach($species as $item)<option value="{{ $item->id }}" @selected(request('species_id') == $item->id)>{{ $item->name }}</option>@endforeach</select><button class="btn-primary justify-center">Filter</button></form>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">@forelse($animals as $animal)<div class="card"><h2 class="font-bold text-lg">{{ $animal->name }}</h2><p class="text-sm text-gray-500 mt-1">{{ $animal->species?->name }} · {{ $animal->gender }} · {{ $animal->age_months }} bulan</p><p class="text-sm text-gray-600 mt-3">{{ Str::limit($animal->description, 100) }}</p><a href="{{ route('adopter.animals.show', $animal) }}" class="btn-primary mt-4">Detail</a></div>@empty<div class="card md:col-span-3 text-center text-gray-400">Belum ada hewan tersedia.</div>@endforelse</div>
    {{ $animals->links() }}
</div>
@endsection
