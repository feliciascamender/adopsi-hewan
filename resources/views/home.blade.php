@extends('layouts.app')

@section('title', 'PawHome Banjarmasin — Adopsi Hewan Peliharaan')

@section('content')

{{-- ============================================================
     NAVBAR PUBLIK
     ============================================================ --}}
<nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-2xl">🐾</span>
            <div>
                <span class="font-bold text-gray-900 text-base">PawHome</span>
                <span class="text-orange-500 font-bold text-base"> BJM</span>
            </div>
        </div>
        <div class="flex items-center gap-2 sm:gap-3">
            <a href="{{ route('login') }}"
               class="text-sm text-gray-600 hover:ttext-[#E76F2E] font-medium px-3 py-1.5 transition-colors">
                Masuk
            </a>
            <a href="{{ route('register') }}"
               class="text-sm bg-[#E76F2E] hover:bg-[#d95f20] text-white font-medium
                      px-4 py-1.5 rounded-lg transition-colors shadow-sm shadow-orange-200">
                Daftar Gratis
            </a>
        </div>
    </div>
</nav>

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<section class="bg-gradient-to-br from-orange-50 via-white to-rose-50 py-20 sm:py-28">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center">
        <span class="inline-block text-5xl mb-6">🐾</span>
        <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-5 leading-tight">
            Temukan Sahabat Berbulumu<br>
            <span class="ttext-[#E76F2E]">di Banjarmasin</span>
        </h1>
        <p class="text-gray-500 text-lg mb-10 max-w-lg mx-auto leading-relaxed">
            PawHome menghubungkan hewan peliharaan yang membutuhkan rumah
            dengan keluarga yang siap memberikan kasih sayang.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('register') }}"
               class="bg-[#E76F2E] hover:bg-[#d95f20] text-white font-semibold
                      px-7 py-3 rounded-xl transition-colors shadow-md shadow-orange-200 text-sm">
                Mulai Adopsi Sekarang →
            </a>
            <a href="{{ route('login') }}"
               class="bg-white hover:bg-gray-50 text-gray-700 font-semibold border border-gray-200
                      px-7 py-3 rounded-xl transition-colors text-sm">
                Sudah Punya Akun
            </a>
        </div>
    </div>
</section>

{{-- ============================================================
     STATISTIK
     ============================================================ --}}
<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
            <div class="text-center p-6 rounded-2xl bg-orange-50 border border-orange-100">
                <p class="text-3xl font-bold ttext-[#E76F2E]">{{ $stats['total_animals'] }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Total Hewan</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-green-50 border border-green-100">
                <p class="text-3xl font-bold text-green-600">{{ $stats['available'] }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Siap Diadopsi</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-purple-50 border border-purple-100">
                <p class="text-3xl font-bold text-purple-600">{{ $stats['adopted'] }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Sudah Diadopsi</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-amber-50 border border-amber-100">
                <p class="text-3xl font-bold text-amber-600">{{ $stats['total_adoptions'] }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Adopsi Berhasil</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     HEWAN TERBARU
     ============================================================ --}}
<section class="py-14 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Hewan Tersedia</h2>
                <p class="text-gray-400 text-sm mt-1">Mereka menunggu keluarga yang hangat 💕</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            @forelse($latestAnimals as $animal)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden
                        hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                {{-- Foto --}}
                <div class="h-44 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden relative">
                    @if($animal->photo)
                        <img src="{{ asset('storage/' . $animal->photo) }}"
                             alt="{{ $animal->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-5xl">
                            @switch($animal->species->name)
                                @case('Kucing') 🐱 @break
                                @case('Anjing') 🐶 @break
                                @case('Kelinci') 🐰 @break
                                @case('Hamster') 🐹 @break
                                @default 🐾
                            @endswitch
                        </div>
                    @endif
                    {{-- Badge spesies --}}
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm
                                 text-gray-700 text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm">
                        {{ $animal->species->name }}
                    </span>
                </div>

                {{-- Info --}}
                <div class="p-4">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="font-bold text-gray-800 text-base">{{ $animal->name }}</h3>
                        <span class="text-xs text-gray-400">{{ $animal->age_months }} bln</span>
                    </div>
                    <p class="text-xs text-gray-400 mb-4">
                        {{ $animal->gender }} ·
                        {{ Str::limit($animal->description, 60) }}
                    </p>
                    <a href="{{ route('login') }}"
                       class="block text-center text-xs font-semibold bg-orange-50 hover:bg-orange-100
                              ttext-[#E76F2E] py-2 rounded-lg transition-colors">
                        Login untuk Adopsi
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-14 text-gray-400">
                <p class="text-4xl mb-3">🐾</p>
                <p class="text-sm">Belum ada hewan tersedia saat ini.</p>
            </div>
            @endforelse
        </div>

        @if(count($latestAnimals) > 0)
        <div class="text-center mt-10">
            <a href="{{ route('login') }}"
               class="inline-flex items-center gap-2 bg-[#E76F2E] hover:bg-[#d95f20]
                      text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition-colors">
                Login untuk Lihat Semua Hewan →
            </a>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================
     CARA KERJA
     ============================================================ --}}
<section class="py-14 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Cara Kerja PawHome</h2>
        <p class="text-gray-400 text-sm mb-12">Proses adopsi yang mudah dan transparan</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="flex flex-col items-center p-6">
                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-2xl mb-4 shadow-sm">
                    1️⃣
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Daftar & Login</h3>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Buat akun adopter gratis dan masuk ke platform PawHome
                </p>
            </div>
            <div class="flex flex-col items-center p-6">
                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-2xl mb-4 shadow-sm">
                    2️⃣
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Pilih & Ajukan</h3>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Pilih hewan yang cocok, isi formulir adopsi dengan data diri dan foto rumah
                </p>
            </div>
            <div class="flex flex-col items-center p-6">
                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-2xl mb-4 shadow-sm">
                    3️⃣
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Tunggu Persetujuan</h3>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Admin shelter akan meninjau pengajuanmu dan menghubungi untuk proses selanjutnya
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     CTA SECTION
     ============================================================ --}}
<section class="py-14 bg-gradient-to-r from-orange-600 to-rose-600">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-3">
            Siap Memberikan Rumah yang Hangat?
        </h2>
        <p class="text-orange-100 mb-8 text-sm leading-relaxed max-w-xl mx-auto">
            Bergabung dengan ratusan keluarga di Banjarmasin yang telah memberikan kehidupan baru
            bagi hewan-hewan yang membutuhkan kasih sayang.
        </p>
        <a href="{{ route('register') }}"
           class="inline-block bg-white hover:bg-orange-50 ttext-[#E76F2E] font-bold
                  px-8 py-3 rounded-xl text-sm transition-colors shadow-md">
            Daftar Sekarang — Gratis!
        </a>
    </div>
</section>

{{-- ============================================================
     FOOTER
     ============================================================ --}}
<footer class="bg-slate-900 text-slate-400 py-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="text-xl">🐾</span>
                <div>
                    <p class="text-white font-bold text-sm">PawHome Banjarmasin</p>
                    <p class="text-slate-500 text-xs">Platform adopsi hewan peliharaan</p>
                </div>
            </div>
            <div class="text-xs text-slate-500 text-center sm:text-right">
                <p>Kalimantan Selatan, Indonesia</p>
                <p class="mt-0.5">Pemrograman Web II — Tugas Akhir</p>
            </div>
        </div>
    </div>
</footer>

@endsection