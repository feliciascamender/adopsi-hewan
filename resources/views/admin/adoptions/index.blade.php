@extends('layouts.app')
 
@section('title', 'Kelola Pengajuan — PawHome')
 
@section('breadcrumb')
    <span class="text-surface-muted">Admin</span> /
    <span class="font-bold text-surface-dark">Pengajuan Adopsi</span>
@endsection
 
@section('content')
<div class="space-y-5">
 
    {{-- Header --}}
    <div class="flex items-start justify-between">
        <div>
            <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-3">
                📋 Manajemen pengajuan
            </div>
            <h1 class="font-brand font-black text-2xl text-surface-dark">Pengajuan Adopsi</h1>
            <p class="text-sm text-surface-muted mt-1">Tinjau dan proses semua pengajuan adopsi dari adopter.</p>
        </div>
    </div>
 
    {{-- Filter pills --}}
    <div class="flex items-center gap-2 flex-wrap">
        @foreach(['' => 'Semua', 'pending' => 'Pending', 'approved' => 'Disetujui', 'rejected' => 'Ditolak'] as $val => $label)
        <a href="{{ request()->fullUrlWithQuery(['status' => $val]) }}"
           class="text-xs font-semibold px-4 py-2 rounded-full border transition-all
           {{ request('status', '') === $val
                ? 'bg-brand-primary text-white border-brand-primary shadow-sm'
                : 'bg-surface-white text-surface-muted border-surface-border hover:border-brand-light hover:text-brand-secondary' }}">
            {{ $label }}
            @if($val === 'pending')
                <span class="ml-1 bg-status-pending-text/20 text-status-pending-text px-1.5 py-0.5 rounded-full text-[10px]">
                    {{ $adoptions->where('status', 'pending')->count() }}
                </span>
            @endif
        </a>
        @endforeach
    </div>
 
    {{-- Tabel --}}
    <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
 
        {{-- Table header info --}}
        <div class="px-6 py-3 border-b border-surface-border bg-surface-alt/50 flex items-center justify-between">
            <p class="text-xs text-surface-muted">
                Menampilkan <span class="font-bold text-surface-dark">{{ $adoptions->count() }}</span>
                dari <span class="font-bold text-surface-dark">{{ $adoptions->total() }}</span> pengajuan
            </p>
        </div>
 
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-surface-border bg-surface-alt/30">
                        <th class="text-left px-6 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Pemohon</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Hewan</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Status</th>
                        <th class="text-left px-4 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Tanggal</th>
                        <th class="text-right px-6 py-3 text-xs font-bold text-surface-muted uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    @forelse($adoptions as $adoption)
                    <tr class="hover:bg-brand-soft/30 transition-colors group">
 
                        {{-- Pemohon --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-accent-base flex items-center justify-center text-xs font-extrabold text-surface-dark flex-shrink-0">
                                    {{ strtoupper(substr($adoption->full_name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-surface-dark text-sm group-hover:text-brand-secondary transition-colors">
                                        {{ $adoption->full_name }}
                                    </p>
                                    <p class="text-xs text-surface-muted">{{ $adoption->user?->email }}</p>
                                </div>
                            </div>
                        </td>
 
                        {{-- Hewan --}}
                        <td class="px-4 py-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach($adoption->animals as $animal)
                                    <span class="text-[10px] font-semibold bg-brand-soft text-brand-secondary px-2 py-0.5 rounded-full">
                                        {{ $animal->name }}
                                    </span>
                                @endforeach
                                @if($adoption->animals->isEmpty())
                                    <span class="text-xs text-surface-muted">—</span>
                                @endif
                            </div>
                        </td>
 
                        {{-- Status --}}
                        <td class="px-4 py-4">
                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full
                                @switch($adoption->status)
                                    @case('approved') bg-status-available-bg text-status-available-text @break
                                    @case('rejected') bg-status-rejected-bg text-status-rejected-text @break
                                    @default bg-status-pending-bg text-status-pending-text
                                @endswitch">
                                {{ $adoption->status === 'approved' ? 'Disetujui' : ($adoption->status === 'rejected' ? 'Ditolak' : 'Pending') }}
                            </span>
                        </td>
 
                        {{-- Tanggal --}}
                        <td class="px-4 py-4">
                            <p class="text-xs text-surface-dark font-semibold">{{ $adoption->created_at->format('d M Y') }}</p>
                            <p class="text-xs text-surface-muted">{{ $adoption->created_at->format('H:i') }}</p>
                        </td>
 
                        {{-- Aksi --}}
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.adoptions.show', $adoption) }}"
                               class="inline-flex items-center gap-1.5 text-xs font-bold
                                      bg-brand-soft text-brand-secondary
                                      hover:bg-brand-primary hover:text-white
                                      px-3 py-1.5 rounded-xl transition-all duration-200">
                                Tinjau
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                        </td>
 
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <span class="text-5xl block mb-4">📋</span>
                            <p class="font-bold text-surface-dark mb-1">Tidak ada pengajuan</p>
                            <p class="text-sm text-surface-muted">
                                @if(request('status'))
                                    Tidak ada pengajuan dengan status "{{ request('status') }}".
                                @else
                                    Belum ada pengajuan adopsi masuk.
                                @endif
                            </p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
 
    </div>
 
    {{-- Pagination --}}
    @if($adoptions->hasPages())
    <div>{{ $adoptions->withQueryString()->links() }}</div>
    @endif
 
</div>
@endsection