@extends('layouts.app')

@section('title', 'Kelola Hewan — PawHome')

@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <span class="font-bold text-surface-dark">Kelola Hewan</span>
@endsection

@section('content')
<div class="space-y-5">

    {{-- Header --}}
    <div class="flex items-start justify-between">
        <div>
            <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-3">
                🐱 Manajemen hewan
            </div>
            <h1 class="font-brand font-black text-2xl text-surface-dark">Kelola Hewan</h1>
            <p class="text-sm text-surface-muted mt-1">Kelola data hewan yang tersedia, pending, dan sudah diadopsi.</p>
        </div>
        <a href="{{ route('admin.animals.create') }}"
           class="inline-flex items-center gap-2 bg-brand-primary hover:bg-brand-secondary
                  text-white font-bold text-sm px-5 py-2.5 rounded-xl
                  hover:-translate-y-0.5 transition-all duration-200 shadow-lg shadow-brand-primary/25">
            + Tambah Hewan
        </a>
    </div>

    {{-- Filter --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl p-5">
        <form method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-3">

            {{-- Search --}}
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-surface-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                </svg>
                <input name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama hewan..."
                       class="w-full pl-9 pr-4 py-2.5 text-sm bg-surface-alt border border-surface-border rounded-xl
                              text-surface-dark placeholder-surface-muted
                              focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent transition-all">
            </div>

            {{-- Spesies --}}
            <select name="species_id"
                    class="w-full px-4 py-2.5 text-sm bg-surface-alt border border-surface-border rounded-xl
                           text-surface-dark focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent transition-all">
                <option value="">Semua spesies</option>
                @foreach($species as $item)
                    <option value="{{ $item->id }}" @selected(request('species_id') == $item->id)>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>

            {{-- Status --}}
            <select name="status"
                    class="w-full px-4 py-2.5 text-sm bg-surface-alt border border-surface-border rounded-xl
                           text-surface-dark focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent transition-all">
                <option value="">Semua status</option>
                <option value="available" @selected(request('status') === 'available')>Tersedia</option>
                <option value="pending"   @selected(request('status') === 'pending')>Pending</option>
                <option value="adopted"   @selected(request('status') === 'adopted')>Diadopsi</option>
            </select>

            {{-- Submit --}}
            <div class="flex gap-2">
                <button type="submit"
                        class="flex-1 bg-brand-primary hover:bg-brand-secondary text-white
                               font-bold text-sm py-2.5 rounded-xl transition-colors">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'species_id', 'status']))
                <a href="{{ route('admin.animals.index') }}"
                   class="px-4 py-2.5 text-sm font-semibold text-surface-muted bg-surface-alt
                          border border-surface-border rounded-xl hover:border-brand-light transition-colors">
                    Reset
                </a>
                @endif
            </div>

        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">

        {{-- Info --}}
        <div class="px-6 py-3 border-b border-surface-border bg-surface-alt/50 flex items-center justify-between">
            <p class="text-xs text-surface-muted">
                Menampilkan <span class="font-bold text-surface-dark">{{ $animals->count() }}</span>
                dari <span class="font-bold text-surface-dark">{{ $animals->total() }}</span> hewan
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border bg-surface-alt/30">
                        <th class="text-left px-6 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Hewan</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Spesies</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Gender</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Usia</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Status</th>
                        <th class="text-right px-6 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    @forelse($animals as $animal)
                    <tr class="hover:bg-brand-soft/20 transition-colors group">

                        {{-- Hewan --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-brand-soft flex items-center justify-center flex-shrink-0 overflow-hidden border border-surface-border group-hover:border-brand-light transition-colors">
                                    @if($animal->photo)
                                        <img src="{{ asset('storage/' . $animal->photo) }}"
                                             alt="{{ $animal->name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <span class="text-lg">
                                            @switch($animal->species?->name)
                                                @case('Kucing') 🐱 @break
                                                @case('Anjing') 🐶 @break
                                                @case('Kelinci') 🐰 @break
                                                @default 🐾
                                            @endswitch
                                        </span>
                                    @endif
                                </div>
                                <p class="font-bold text-surface-dark group-hover:text-brand-secondary transition-colors">
                                    {{ $animal->name }}
                                </p>
                            </div>
                        </td>

                        <td class="px-4 py-4 text-sm text-surface-muted">{{ $animal->species?->name ?? '—' }}</td>
                        <td class="px-4 py-4 text-sm text-surface-muted">{{ $animal->gender }}</td>
                        <td class="px-4 py-4 text-sm text-surface-muted">{{ $animal->age_months }} bln</td>

                        {{-- Status --}}
                        <td class="px-4 py-4">
                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full
                                @switch($animal->status)
                                    @case('available') bg-status-available-bg text-status-available-text @break
                                    @case('adopted')   bg-status-adopted-bg text-status-adopted-text @break
                                    @default           bg-status-pending-bg text-status-pending-text
                                @endswitch">
                                {{ $animal->status === 'available' ? 'Tersedia' : ($animal->status === 'adopted' ? 'Diadopsi' : 'Pending') }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.animals.show', $animal) }}"
                                   class="text-xs font-bold text-surface-muted hover:text-brand-secondary transition-colors px-2 py-1">
                                    Detail
                                </a>
                                <a href="{{ route('admin.animals.edit', $animal) }}"
                                   class="text-xs font-bold bg-brand-soft text-brand-secondary hover:bg-brand-primary hover:text-white
                                          px-3 py-1.5 rounded-xl transition-all duration-200">
                                    Edit
                                </a>
                                
                                {{-- Form Hapus dengan ID dinamis dan onclick SweetAlert --}}
                                <form id="form-hapus-{{ $animal->id }}" 
                                      action="{{ route('admin.animals.destroy', $animal) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="konfirmasiHapus('{{ $animal->id }}')"
                                            class="text-xs font-bold text-status-rejected-text hover:bg-status-rejected-bg
                                                   px-3 py-1.5 rounded-xl transition-all duration-200">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <span class="text-5xl block mb-4">🐾</span>
                            <p class="font-bold text-surface-dark mb-1">Tidak ada data hewan</p>
                            <p class="text-sm text-surface-muted mb-4">
                                @if(request()->hasAny(['search', 'species_id', 'status']))
                                    Tidak ada hewan yang cocok dengan filter.
                                @else
                                    Belum ada hewan yang ditambahkan.
                                @endif
                            </p>
                            @if(!request()->hasAny(['search', 'species_id', 'status']))
                            <a href="{{ route('admin.animals.create') }}"
                               class="inline-flex items-center gap-2 bg-brand-primary text-white font-bold text-sm px-5 py-2.5 rounded-xl transition-colors hover:bg-brand-secondary">
                                + Tambah Hewan Pertama
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if($animals->hasPages())
    <div>{{ $animals->withQueryString()->links() }}</div>
    @endif

</div>

{{-- Script SweetAlert2 untuk konfirmasi hapus --}}
@push('scripts')
<script>
    function konfirmasiHapus(id) {
        Swal.fire({
            title: 'Yakin Hapus Hewan?',
            text: "Data hewan ini akan terhapus secara permanen.",
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
@endpush
@endsection