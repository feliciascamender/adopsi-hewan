@extends('layouts.app')

@section('title', 'Pengajuan Saya — PawHome')

@section('breadcrumb')
    <span class="text-[#A89991]">Adopter</span> / 
    <span class="font-bold text-[#2B2523]">Pengajuan Saya</span>
@endsection

@section('content')
<div class="card">
    
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-xl font-bold text-[#2B2523]">Pengajuan Saya</h1>
            <p class="text-sm text-[#6F625D]">Pantau status pengajuan adopsi kamu.</p>
        </div>
        <a href="{{ route('adopter.adoptions.create') }}" class="btn-primary">
            + Buat Pengajuan
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-[#6F625D] border-b border-[#F1E7DD]">
                <tr>
                    <th class="py-3">Nama</th>
                    <th>Hewan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F1E7DD]">
                @forelse($adoptions as $adoption)
                <tr>
                    <td class="py-3 font-semibold text-[#2B2523]">{{ $adoption->full_name }}</td>
                    <td class="text-[#6F625D]">{{ $adoption->animals->pluck('name')->join(', ') }}</td>
                    <td>
                        <span class="badge-{{ $adoption->status }}">
                            {{ ucfirst($adoption->status) }}
                        </span>
                    </td>
                    <td class="text-[#6F625D]">{{ $adoption->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center font-semibold text-[#A89991]">
                        Belum ada pengajuan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $adoptions->links() }}
    </div>
    
</div>
@endsection