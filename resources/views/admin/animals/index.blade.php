@extends('layouts.app')
@section('title', 'Kelola Hewan — PawHome')
@section('breadcrumb', '<span class="text-gray-400">Admin</span> / <span class="text-gray-700 font-medium">Kelola Hewan</span>')
@section('content')
<div class="card">
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Kelola Hewan</h1>
            <p class="text-sm text-gray-500">Data hewan yang tersedia, pending, dan adopted.</p>
        </div>
        <a href="{{ route('admin.animals.create') }}" class="btn-primary">+ Tambah Hewan</a>
    </div>

    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-5">
        <input name="search" value="{{ request('search') }}" placeholder="Cari nama hewan" class="form-input">
        <select name="species_id" class="form-input">
            <option value="">Semua spesies</option>
            @foreach($species as $item)
                <option value="{{ $item->id }}" @selected(request('species_id') == $item->id)>{{ $item->name }}</option>
            @endforeach
        </select>
        <select name="status" class="form-input">
            <option value="">Semua status</option>
            @foreach(['available','pending','adopted'] as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button class="btn-primary justify-center">Filter</button>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-gray-500 border-b">
                <tr>
                    <th class="py-3">Foto</th>
                    <th>Nama</th>
                    <th>Spesies</th>
                    <th>Gender</th>
                    <th>Usia</th>
                    <th>Status</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($animals as $animal)
                <tr>
                    <td class="py-3">
                        @if($animal->photo)
                            <img src="{{ asset('storage/' . $animal->photo) }}" class="h-10 w-10 object-cover rounded-md border">
                        @else
                            <div class="h-10 w-10 bg-gray-100 rounded-md flex items-center justify-center text-xs text-gray-400">No Pic</div>
                        @endif
                    </td>
                    
                    <td class="font-semibold">{{ $animal->name }}</td>
                    <td>{{ $animal->species?->name }}</td>
                    <td>{{ $animal->gender }}</td>
                    <td>{{ $animal->age_months }} bln</td>
                    <td><span class="badge-{{ $animal->status }}">{{ ucfirst($animal->status) }}</span></td>
                    
                    <td class="text-right flex justify-end gap-3 mt-3">
                        <a class="text-gray-500 hover:text-gray-700" href="{{ route('admin.animals.show', $animal) }}">Detail</a>
                        <a class="text-orange-600 hover:text-orange-800" href="{{ route('admin.animals.edit', $animal) }}">Edit</a>
                        <form action="{{ route('admin.animals.destroy', $animal) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus hewan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="py-6 text-center text-gray-400">Belum ada data hewan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $animals->links() }}</div>
</div>
@endsection