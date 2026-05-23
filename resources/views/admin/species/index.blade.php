@extends('layouts.app')
@section('title', 'Kelola Spesies — PawHome')
@section('breadcrumb', '<span class="text-gray-400">Admin</span> / <span class="text-gray-700 font-medium">Kelola Spesies</span>')
@section('content')
<div class="card">
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Kelola Spesies</h1>
            <p class="text-sm text-gray-500">Data kategori hewan.</p>
        </div>
        <a href="{{ route('admin.species.create') }}" class="btn-primary">+ Tambah Spesies</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-gray-500 border-b">
                <tr>
                    <th class="py-3">Nama</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Hewan</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($species as $item)
                <tr>
                    <td class="py-3 font-semibold">{{ $item->name }}</td>
                    <td>{{ Str::limit($item->description, 80) }}</td>
                    <td>{{ $item->animals_count }}</td>
                    <td class="text-right flex justify-end gap-3">
                        <a class="text-orange-600 hover:text-orange-800" href="{{ route('admin.species.edit', $item) }}">Edit</a>
                        
                        <form action="{{ route('admin.species.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus spesies ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-400">Belum ada data spesies.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $species->links() }}</div>
</div>
@endsection