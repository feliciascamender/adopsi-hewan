@extends('layouts.app')

@section('title', 'Kelola Hewan — PawHome')
@section('breadcrumb')
    <span class="text-[#A89991]">Admin</span> / <span class="font-bold text-[#2B2523]">Kelola Hewan</span>
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex flex-col justify-between gap-4 lg:flex-row lg:items-end">
        <div>
            <p class="section-label">Animal Management</p>
            <h1 class="page-title mt-2">Kelola Hewan</h1>
            <p class="page-subtitle">
                Kelola data hewan yang tersedia, pending, dan sudah diadopsi.
            </p>
        </div>

        <a href="{{ route('admin.animals.create') }}" class="btn-primary">
            + Tambah Hewan
        </a>
    </div>

    <div class="card">
        <form method="GET" class="grid grid-cols-1 gap-3 md:grid-cols-4">
            <input name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari nama hewan"
                   class="form-input">

            <select name="species_id" class="form-input">
                <option value="">Semua spesies</option>
                @foreach($species as $item)
                    <option value="{{ $item->id }}" @selected(request('species_id') == $item->id)>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>

            <select name="status" class="form-input">
                <option value="">Semua status</option>
                @foreach(['available','pending','adopted'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>

            <button class="btn-primary">
                Filter
            </button>
        </form>
    </div>

    <div class="table-wrapper">
        <table class="app-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Spesies</th>
                    <th>Gender</th>
                    <th>Usia</th>
                    <th>Status</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($animals as $animal)
                    <tr>
                        <td>
                            @if($animal->photo)
                                <img src="{{ asset('storage/' . $animal->photo) }}"
                                     class="h-12 w-12 rounded-2xl border border-[#F1E7DD] object-cover">
                            @else
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FFF3E4] text-xl">
                                    🐾
                                </div>
                            @endif
                        </td>

                        <td>
                            <p class="font-extrabold text-[#2B2523]">{{ $animal->name }}</p>
                        </td>

                        <td>{{ $animal->species?->name }}</td>
                        <td>{{ $animal->gender }}</td>
                        <td>{{ $animal->age_months }} bln</td>

                        <td>
                            <span class="badge-{{ $animal->status }}">
                                {{ ucfirst($animal->status) }}
                            </span>
                        </td>

                        <td>
                            <div class="flex justify-end gap-3">
                                <a class="font-bold text-[#6F625D] hover:text-[#2B2523]"
                                   href="{{ route('admin.animals.show', $animal) }}">
                                    Detail
                                </a>

                                <a class="font-bold text-[#E76F2E] hover:text-[#d95f20]"
                                   href="{{ route('admin.animals.edit', $animal) }}">
                                    Edit
                                </a>

                                <form action="{{ route('admin.animals.destroy', $animal) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus hewan ini?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="font-bold text-red-600 hover:text-red-800">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-10 text-center font-semibold text-[#A89991]">
                            Belum ada data hewan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $animals->links() }}
    </div>
</div>
@endsection