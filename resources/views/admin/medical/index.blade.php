@extends('layouts.app')

@section('title', 'Riwayat Medis — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / 
    <a href="{{ route('admin.animals.index') }}" class="text-[#A89991] hover:text-[#2B2523]">Kelola Hewan</a> / 
    <span class="font-bold text-[#2B2523]">Riwayat Medis</span>
@endsection

@section('content')
<div class="card">
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-xl font-bold text-[#2B2523]">Riwayat Medis {{ $animal->name }}</h1>
            <p class="text-sm text-[#6F625D]">{{ $animal->species?->name }}</p>
        </div>
        <a href="{{ route('admin.medical.create', $animal) }}" class="btn-primary">+ Tambah Riwayat</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-[#6F625D] border-b border-[#F1E7DD]">
                <tr>
                    <th class="py-3">Tanggal</th>
                    <th>Judul</th>
                    <th>Catatan</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F1E7DD]">
                @forelse($records as $record)
                <tr>
                    <td class="py-3 text-[#6F625D]">{{ $record->record_date->format('d M Y') }}</td>
                    <td class="font-semibold text-[#2B2523]">{{ $record->title }}</td>
                    <td class="text-[#6F625D]">{{ Str::limit($record->notes, 80) }}</td>
                    <td>
                        <div class="flex justify-end gap-3">
                            <a class="font-bold text-[#E76F2E] hover:text-[#d95f20]" href="{{ route('admin.medical.edit', $record) }}">Edit</a>
                            
                            <form id="form-hapus-{{ $record->id }}" action="{{ route('admin.medical.destroy', $record) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="konfirmasiHapus({{ $record->id }})" class="font-bold text-red-600 hover:text-red-800">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center font-semibold text-[#A89991]">Belum ada riwayat medis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">{{ $records->links() }}</div>
    
    <div class="mt-5 pt-4 border-t border-[#F1E7DD]">
        <a href="{{ route('admin.animals.show', $animal) }}" class="btn-secondary">Kembali ke Detail Hewan</a>
    </div>
</div>

<script>
    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Yakin Hapus Riwayat?',
            text: "Data riwayat medis ini akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B91C1C',
            cancelButtonColor: '#A89991',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-hapus-' + id).submit();
            }
        })
    }
</script>
@endsection