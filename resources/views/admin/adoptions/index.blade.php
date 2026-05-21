@extends('layouts.app')
@section('title', 'Pengajuan Adopsi — PawHome')
@section('breadcrumb', '<span class="text-gray-400">Admin</span> / <span class="text-gray-700 font-medium">Pengajuan Adopsi</span>')
@section('content')
<div class="card">
    <div class="flex items-center justify-between mb-5"><div><h1 class="text-xl font-bold">Pengajuan Adopsi</h1><p class="text-sm text-gray-500">Review pengajuan adopter.</p></div></div>
    <form method="GET" class="flex gap-3 mb-5"><select name="status" class="form-input max-w-xs"><option value="">Semua status</option>@foreach(['pending','approved','rejected'] as $status)<option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>@endforeach</select><button class="btn-primary">Filter</button></form>
    <div class="overflow-x-auto"><table class="w-full text-sm"><thead class="text-left text-gray-500 border-b"><tr><th class="py-3">Nama</th><th>Email</th><th>Hewan</th><th>Status</th><th class="text-right">Aksi</th></tr></thead><tbody class="divide-y divide-gray-100">
        @forelse($adoptions as $adoption)
        <tr><td class="py-3 font-semibold">{{ $adoption->full_name }}</td><td>{{ $adoption->user?->email }}</td><td>{{ $adoption->animals->pluck('name')->join(', ') }}</td><td><span class="badge-{{ $adoption->status }}">{{ ucfirst($adoption->status) }}</span></td><td class="text-right"><a class="text-pink-600" href="{{ route('admin.adoptions.show', $adoption) }}">Detail</a></td></tr>
        @empty
        <tr><td colspan="5" class="py-6 text-center text-gray-400">Belum ada pengajuan.</td></tr>
        @endforelse
    </tbody></table></div>
    <div class="mt-4">{{ $adoptions->links() }}</div>
</div>
@endsection
