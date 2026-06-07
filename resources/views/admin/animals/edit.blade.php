@extends('layouts.app')

@section('title', 'Edit Hewan — PawHome')

@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <a href="{{ route('admin.animals.index') }}" class="text-surface-muted hover:text-brand-secondary transition-colors">Kelola Hewan</a> /
    <span class="font-bold text-surface-dark">Edit</span>
@endsection

@section('content')
<div class="space-y-5">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.animals.index') }}"
           class="w-9 h-9 rounded-xl bg-surface-white border border-surface-border flex items-center justify-center hover:border-brand-light transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-surface-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <div>
            <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-1">
                🐾 Animal Management
            </div>
            <h1 class="font-brand font-black text-2xl text-surface-dark">Edit Hewan</h1>
            <p class="text-sm text-surface-muted mt-0.5">Perbarui data hewan <span class="font-semibold text-brand-secondary">{{ $animal->name }}</span>.</p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden max-w-3xl">
        <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-base">✏️</span>
                <p class="text-sm font-bold text-surface-dark">Edit Data Hewan</p>
            </div>
            {{-- Badge status saat ini --}}
            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full
                @switch($animal->status)
                    @case('available') bg-status-available-bg text-status-available-text @break
                    @case('adopted') bg-status-adopted-bg text-status-adopted-text @break
                    @default bg-status-pending-bg text-status-pending-text
                @endswitch">
                {{ $animal->status === 'available' ? 'Tersedia' : ($animal->status === 'adopted' ? 'Diadopsi' : 'Pending') }}
            </span>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                @include('admin.animals.partials.form', ['animal' => $animal])

                <div class="flex gap-3 pt-4 border-t border-surface-border mt-6">
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.animals.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection