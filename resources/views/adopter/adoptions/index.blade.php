@extends('layouts.app')
@section('title', 'Pengajuan Saya — PawHome')
@section('breadcrumb', '<span class="text-gray-400">Adopter</span> / <span class="text-gray-700 font-medium">Pengajuan Saya</span>')
@section('content')
<div class="card">
    <div class="flex items-center justify-between mb-5"><div><h1 class="text-xl font-bold">Pengajuan Saya</h1><p class="text-sm text-gray-500">Pantau status pengajuan adopsi kamu.</p></div><a href="{{ route('adopter.adoptions.create') }}" class="btn-primary">+ Buat Pengajuan</a></div>
    <div class="overflow-x-auto"><table class="w-full text-sm"><thead class="text-left text-gray-500 border-b"><tr><th class="py-3">Nama</th><th>Hewan</th><th>Status</th><th>Tanggal</th><th class="text-right">Aksi</th></tr></thead><tbody class="divide-y divide-gray-100">
        @forelse($adoptions as $adoption)<tr><td class="py-3 font-semibold">{{ $adoption->full_name }}</td><td>{{ $adoption->animals->pluck('name')->join(', ') }}</td><td><span class="badge-{{ $adoption->status }}">{{ ucfirst($adoption->status) }}</span></td><td>{{ $adoption->created_at->format('d M Y') }}</td><td class="text-right"><a class="text-pink-600" href="{{ route('adopter.adoptions.show', $adoption) }}">Detail</a></td></tr>@empty<tr><td colspan="5" class="py-6 text-center text-gray-400">Belum ada pengajuan.</td></tr>@endforelse
    </tbody></table></div>
    <div class="mt-4">{{ $adoptions->links() }}</div>
</div>
@endsection
