@extends('layouts.app')

@section('title', 'Kelola Spesies — PawHome')

@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <span class="font-bold text-surface-dark">Kelola Spesies</span>
@endsection

@section('content')
<div class="space-y-5">

    {{-- Header --}}
    <div class="flex items-start justify-between">
        <div>
            <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-3">
                🏷️ Species Management
            </div>
            <h1 class="font-brand font-black text-2xl text-surface-dark">Kelola Spesies</h1>
            <p class="text-sm text-surface-muted mt-1">Data kategori hewan yang tersedia di PawHome.</p>
        </div>
        <a href="{{ route('admin.species.create') }}" class="btn-primary">+ Tambah Spesies</a>
    </div>

    {{-- Tabel --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">

        <div class="px-6 py-3 border-b border-surface-border bg-surface-alt/50">
            <p class="text-xs text-surface-muted">
                Total <span class="font-bold text-surface-dark">{{ $species->total() }}</span> spesies terdaftar
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border bg-surface-alt/30">
                        <th class="text-left px-6 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Nama</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Deskripsi</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Jumlah Hewan</th>
                        <th class="text-right px-6 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    @forelse($species as $item)
                    <tr class="hover:bg-brand-soft/30 transition-colors group">

                        <td class="px-6 py-4">
                            <p class="font-bold text-surface-dark group-hover:text-brand-secondary transition-colors">
                                {{ $item->name }}
                            </p>
                        </td>

                        <td class="px-4 py-4 text-surface-muted">
                            {{ Str::limit($item->description, 80) ?: '—' }}
                        </td>

                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-full bg-brand-soft text-brand-secondary">
                                🐾 {{ $item->animals_count }} hewan
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.species.edit', $item) }}"
                                   class="inline-flex items-center text-xs font-bold
                                          bg-brand-soft text-brand-secondary border border-brand-light
                                          hover:bg-brand-primary hover:text-white hover:border-brand-primary
                                          px-3 py-1.5 rounded-xl transition-all duration-200">
                                    Edit
                                </a>
                                
                                {{-- Form Hapus dengan ID dinamis dan onclick SweetAlert --}}
                                <form id="form-hapus-spesies-{{ $item->id }}" 
                                      action="{{ route('admin.species.destroy', $item) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="konfirmasiHapusSpesies('{{ $item->id }}')"
                                            class="inline-flex items-center text-xs font-bold
                                                   bg-status-rejected-bg text-status-rejected-text border border-status-rejected-text/20
                                                   hover:bg-status-rejected-text hover:text-white
                                                   px-3 py-1.5 rounded-xl transition-all duration-200">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center">
                            <span class="text-5xl block mb-4">🏷️</span>
                            <p class="font-bold text-surface-dark mb-1">Belum ada spesies</p>
                            <p class="text-sm text-surface-muted">Tambahkan spesies pertama untuk mulai mengelola hewan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    @if($species->hasPages())
    <div>{{ $species->withQueryString()->links() }}</div>
    @endif

</div>

{{-- Script SweetAlert2 untuk konfirmasi hapus spesies --}}
@push('scripts')
<script>
    function konfirmasiHapusSpesies(id) {
        Swal.fire({
            title: 'Yakin Hapus Spesies?',
            text: "Pastikan tidak ada hewan yang sedang menggunakan spesies ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B91C1C',
            cancelButtonColor: '#A89991',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-hapus-spesies-' + id).submit();
            }
        })
    }
</script>
@endpush
@endsection