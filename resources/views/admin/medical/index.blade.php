@extends('layouts.app')

@section('title', 'Riwayat Medis — PawHome')

@section('content')
<div class="card">
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-xl font-bold">Riwayat Medis {{ $animal->name }}</h1>
            <p class="text-sm text-gray-500">{{ $animal->species?->name }}</p>
        </div>
        <a href="{{ route('admin.medical.create', $animal) }}" class="btn-primary">+ Tambah Riwayat</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-gray-500 border-b">
                <tr>
                    <th class="py-3">Tanggal</th>
                    <th>Judul</th>
                    <th>Catatan</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($records as $record)
                <tr>
                    <td class="py-3">{{ $record->record_date->format('d M Y') }}</td>
                    <td class="font-semibold">{{ $record->title }}</td>
                    <td>{{ Str::limit($record->notes, 80) }}</td>
                    <td class="text-right flex justify-end gap-3 mt-3">
                        <a class="text-orange-600 hover:text-orange-800" href="{{ route('admin.medical.edit', $record) }}">Edit</a>
                        
                        <form action="{{ route('admin.medical.destroy', $record) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat medis ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-400">Belum ada riwayat medis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">{{ $records->links() }}</div>
    
    <div class="mt-5 pt-4 border-t">
        <a href="{{ route('admin.animals.show', $animal) }}" class="btn-secondary">Kembali ke Detail Hewan</a>
    </div>
</div>
@endsection