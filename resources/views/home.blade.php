@extends('layouts.app')

@section('title', 'PawHome Banjarmasin — Adopsi Hewan Peliharaan')

@section('content')

{{-- ============================================================
     NAVBAR PUBLIK
     ============================================================ --}}
<nav id="navbar" class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 h-20 flex items-center justify-between">

        <a href="{{ route('home') }}" class="flex items-center gap-0">

            {{-- Logo emoji — awalnya tersembunyi --}}
            <div id="logo-icon"
                class="ml-10"
                 style="
                    opacity: 0;
                    transform: scale(0.5) rotate(-20deg);
                    transition: all 0.5s cubic-bezier(0.8, 1.56, 0.64, 1);
                    width: 0;
                    overflow: hidden;
                 ">
               <img src="{{ asset('images/logoPurple.png') }}" class="h-[70px] w-auto" alt="PawHome">
            </div>

            {{-- Nama brand — awalnya tampil --}}
            <div id="brand-name"
                 style="
                    opacity: 1;
                    max-width: 200px;
                    transition: all 0.3s ease;
                    overflow: hidden;
                    white-space: nowrap;
                 ">
                <span class="font-brand font-extrabold text-gray-900 text-[32px]">PawHome</span>
            </div>

        </a>

                {{-- Nav Links --}}
         <div class="hidden md:flex items-center gap-8 text-[17px]">
            <a href="#beranda" data-section="beranda"
            class="nav-link font-semibold text-gray-900 transition-colors pb-1 border-b-2 border-accent-base">
                Beranda
            </a>
            <a href="#hewan" data-section="hewan"
            class="nav-link font-medium text-gray-500 hover:text-brand-primary transition-colors pb-1 border-b-2 border-transparent">
                Hewan
            </a>
            <a href="#cara-adopsi" data-section="cara-adopsi"
            class="nav-link font-medium text-gray-500 hover:text-brand-primary transition-colors pb-1 border-b-2 border-transparent">
                Cara Adopsi
            </a>
            <a href="#tentang" data-section="tentang"
            class="nav-link font-medium text-gray-500 hover:text-brand-primary transition-colors pb-1 border-b-2 border-transparent">
                Tentang Kami
            </a>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            <a href="{{ route('login') }}"
                class="bg-transparent border-2 border-brand-primary text-brand-primary text-sm rounded-xl
                    font-medium px-3 py-1.5
                    hover:bg-brand-primary hover:text-white
                    transition-all duration-200">
                Masuk
            </a>
                        <a href="{{ route('register') }}"
            class="text-sm bg-brand-primary border-2 border-brand-primary text-white font-medium
                    px-4 py-1.5 rounded-lg shadow-sm
                    hover:bg-brand-secondary hover:shadow-md hover:-translate-y-0.5
                    active:scale-95
                    transition-all duration-200">
                Daftar Gratis
            </a>
        </div>
    </div>
</nav>

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<section id="beranda" class="relative overflow-hidden" style="background: linear-gradient(90deg, #e7c4ff 0%, #2c0c42 100%); min-height: 550px;">
 {{-- Lengkungan di bawah --}}
<div class="absolute bottom-0 left-0 right-0 z-20">
    <svg
        class="w-full h-[260px]"
        viewBox="0 -200 1440 340"
        preserveAspectRatio="none"
    >
       <defs>
        <linearGradient id="layerGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="#afaeaf" />
            <stop offset="100%" stop-color="#ffffff" />
        </linearGradient>
    </defs>



         {{-- Layer belakang --}}
        <path
    d="M0 65 C200 80 1285 136 1440 -200 L1440 140 L0 140 Z"
    fill="url(#layerGradient)"
/>
           </svg>
</div>

{{-- Foto kucing --}}
    <div class="absolute -bottom-[63px] right-0 z-10 pointer-events-none">
        <img src="{{ asset('images/CatHome.png') }}"
             class="h-[670px] w-auto object-contain object-bottom "
             alt="Kucing">
    </div>
    {{-- Kaki kucing (depan wave) --}}
 <div class="absolute -bottom-[64px] -right-[14px] z-40 pointer-events-none">
        <img src="{{ asset('images/PawCatHome.png') }}"
             style="transform: rotate(-2deg);"
             class="h-[700px] w-auto object-contain object-bottom "
             alt="Kucing">
    </div> 

    {{-- Konten teks --}}
    <div class="relative z-30 max-w-7xl mx-auto px-8 sm:px-12">
        <div class="flex items-center min-h-[550px]">
          <div class="w-full md:w-[52%] py-16">


    {{-- Logo --}}
    <div class="mb-0 flex justify-start">
        <img src="{{ asset('images/logoPurple.png') }}"
     alt="PawHome Logo"
     class="h-[170px] w-auto opacity-[0.97] -translate-x-[-130px] -translate-y-[50px]"
     style="filter: drop-shadow(0 0 1px white) drop-shadow(0 0 1px white) drop-shadow(0 0 15px rgba(255,255,255,0.6));">
    </div>

    {{-- Heading --}}
    <h1
    class="text-5xl sm:text-6xl font-extrabold text-white mb-0 leading-tight tracking-tight -translate-y-[30px]"
    style="
        -webkit-text-stroke: 0.5px #7e40d3;
        paint-order: stroke fill;
    "
>
    MEET YOUR<br>
    <span class="text-accent-base">
        COMPANION.
    </span>
</h1>

<div class="w-[410px]">
    {{-- Deskripsi --}}
    <p class="text-white/80 text-base mb-6 leading-relaxed -translate-y-[20px]">
        PawHome membantu setiap hewan menemukan tempat pulang yang aman dan nyaman.
        Menghubungkan mereka dengan keluarga yang siap memberi kasih sayang.
    </p>

    {{-- CTA Buttons --}}
    <div class="flex flex-wrap gap-8 mb-8">
    <a href="{{ route('register') }}"
       class="flex-1 text-center bg-white text-brand-primary font-bold px-7 py-3 rounded-xl
            shadow-md
          hover:shadow-lg hover:-translate-y-0.5 hover:bg-brand-soft
          active:scale-95 active:shadow-sm
          transition-all duration-200 text-sm">
        Mulai Adopsi Sekarang →
    </a>
    <a href="{{ route('login') }}"
       class="relative z-60 bg-accent-base text-surface-dark font-bold
              px-8 py-3 rounded-xl 
              transition-all hover:bg-accent-strong hover:text-white text-sm">
        Masuk
    </a>
</div>

    {{-- Stats row --}}
    <div class="flex items-center gap-10">
        <div>
            <p class="font-brand font-extrabold text-xl text-white">120+</p>
            <p class="text-xs text-white/50 mt-0.5">Hewan tersedia</p>
        </div>
        <div class="w-px h-8 bg-white/20"></div>
        <div>
            <p class="font-brand font-extrabold text-xl text-white">80+</p>
            <p class="text-xs text-white/50 mt-0.5">Adopsi berhasil</p>
        </div>
        <div class="w-px h-8 bg-white/20"></div>
        <div>
            <p class="font-brand font-extrabold text-xl text-white">Bjm</p>
            <p class="text-xs text-white/50 mt-0.5">Banjarmasin</p>
        </div>
    </div>
</div>
</div>
        </div>
    </div>

</section>
   

{{-- ============================================================
     STATISTIK
     ============================================================ --}}
<section class="pt-20 pb-20 relative overflow-hidden bg-white">

{{-- Decorative paw print — center-right background --}}
<div class="absolute inset-0 pointer-events-none select-none z-0 flex items-center justify-end pr-[8%]">
    <img src="{{ asset('images/paw.png') }}"
         alt=""
         aria-hidden="true"
         class="w-[420px] h-auto object-contain opacity-[1]"
         style="transform: rotate(15deg);">
</div>
 
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6">

    

     {{-- Kaki kucing (depan wave) --}}
 <div class="absolute -bottom-[-270px] -right-[189px] z-40 pointer-events-none">
        <img src="{{ asset('images/PawCatHome.png') }}"
             style="transform: rotate(-2deg);"
             class="h-[700px] w-auto object-contain object-bottom "
             alt="Kucing">
    </div> 
 
        {{-- Wrapper card pembungkus --}}
        <div class="bg-white/15 backdrop-blur-sm border border-white/20 rounded-[28px] p-5 sm:p-6 shadow-xl shadow-brand-primary/20">
 
            <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5">
 
                {{-- Card 1: Total Hewan (soft purple) --}}
                <div class="group relative rounded-[22px] bg-brand-soft p-6 sm:p-7 overflow-hidden min-h-[190px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-brand-primary/15">
                    <div class="absolute right-[-40px] bottom-[-40px] w-[200px] h-[200px] rounded-full bg-brand-light opacity-[0.25] group-hover:opacity-[0.35] transition-opacity"></div>
                    <div class="absolute right-[-10px] bottom-[-10px] w-[130px] h-[130px] rounded-full bg-brand-secondary opacity-[0.12] group-hover:opacity-[0.18] transition-opacity"></div>
 
                    <div class="flex items-center gap-2 relative z-10">
                        <div class="w-9 h-9 rounded-[10px] bg-brand-primary/10 flex items-center justify-center text-base">🐾</div>
                        <span class="text-sm font-bold text-brand-secondary">Total Hewan</span>
                    </div>
 
                    <div class="relative z-10">
                        <p class="font-brand text-[52px] font-black text-brand-primary leading-none">{{ $stats['total_animals'] }}</p>
                        <span class="inline-block mt-2 text-[11px] font-bold px-3 py-1.5 rounded-full bg-brand-primary/10 text-brand-primary">🐱 Semua spesies</span>
                    </div>
 
                    <div class="absolute right-2 bottom-0 text-[72px] z-20 drop-shadow-lg opacity-70 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🐾</div>
                </div>
 
                {{-- Card 2: Siap Diadopsi (dark purple — hero) --}}
                <div class="group relative rounded-[22px] bg-brand-primary p-6 sm:p-7 overflow-hidden min-h-[190px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-brand-primary/40">
                    <div class="absolute right-[-40px] bottom-[-40px] w-[200px] h-[200px] rounded-full bg-brand-light opacity-[0.15] group-hover:opacity-[0.22] transition-opacity"></div>
                    <div class="absolute right-[-10px] bottom-[-10px] w-[130px] h-[130px] rounded-full bg-white opacity-[0.07] group-hover:opacity-[0.12] transition-opacity"></div>
 
                    <div class="flex items-center gap-2 relative z-10">
                        <div class="w-9 h-9 rounded-[10px] bg-white/15 flex items-center justify-center text-base">🏠</div>
                        <span class="text-sm font-bold text-white/70">Siap Diadopsi</span>
                    </div>
 
                    <div class="relative z-10">
                        <p class="font-brand text-[52px] font-black text-white leading-none">{{ $stats['available'] }}</p>
                        <span class="inline-block mt-2 text-[11px] font-bold px-3 py-1.5 rounded-full bg-white/15 text-white">✨ Tersedia sekarang</span>
                    </div>
 
                    <div class="absolute right-2 bottom-0 text-[72px] z-20 drop-shadow-lg opacity-60 group-hover:opacity-85 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🏠</div>
                </div>
 
                {{-- Card 3: Sudah Diadopsi (indigo/blue) --}}
                <div class="group relative rounded-[22px] bg-status-adopted-bg p-6 sm:p-7 overflow-hidden min-h-[190px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-status-adopted-text/20">
                    <div class="absolute right-[-40px] bottom-[-40px] w-[200px] h-[200px] rounded-full bg-status-adopted-text opacity-[0.2] group-hover:opacity-[0.28] transition-opacity"></div>
                    <div class="absolute right-[-10px] bottom-[-10px] w-[130px] h-[130px] rounded-full bg-status-adopted-text opacity-[0.1] group-hover:opacity-[0.15] transition-opacity"></div>
 
                    <div class="flex items-center gap-2 relative z-10">
                        <div class="w-9 h-9 rounded-[10px] bg-status-adopted-text/15 flex items-center justify-center text-base">💜</div>
                        <span class="text-sm font-bold text-status-adopted-text">Sudah Diadopsi</span>
                    </div>
 
                    <div class="relative z-10">
                        <p class="font-brand text-[52px] font-black text-status-adopted-text leading-none">{{ $stats['adopted'] }}</p>
                        <span class="inline-block mt-2 text-[11px] font-bold px-3 py-1.5 rounded-full bg-status-adopted-text/15 text-status-adopted-text">💜 Telah berpindah</span>
                    </div>
 
                    <div class="absolute right-2 bottom-0 text-[72px] z-20 drop-shadow-lg opacity-70 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🐶</div>
                </div>
 
                {{-- Card 4: Adopsi Berhasil (amber) --}}
                <div class="group relative rounded-[22px] bg-accent-soft p-6 sm:p-7 overflow-hidden min-h-[190px] flex flex-col justify-between hover:-translate-y-1 transition-all duration-300 hover:shadow-xl hover:shadow-accent-base/25">
                    <div class="absolute right-[-40px] bottom-[-40px] w-[200px] h-[200px] rounded-full bg-accent-base opacity-[0.3] group-hover:opacity-[0.4] transition-opacity"></div>
                    <div class="absolute right-[-10px] bottom-[-10px] w-[130px] h-[130px] rounded-full bg-accent-strong opacity-[0.15] group-hover:opacity-[0.2] transition-opacity"></div>
 
                    <div class="flex items-center gap-2 relative z-10">
                        <div class="w-9 h-9 rounded-[10px] bg-accent-base/25 flex items-center justify-center text-base">🎉</div>
                        <span class="text-sm font-bold text-accent-strong">Adopsi Berhasil</span>
                    </div>
 
                    <div class="relative z-10">
                        <p class="font-brand text-[52px] font-black text-accent-strong leading-none">{{ $stats['total_adoptions'] }}</p>
                        <span class="inline-block mt-2 text-[11px] font-bold px-3 py-1.5 rounded-full bg-accent-base/25 text-accent-strong">🎀 Disetujui admin</span>
                    </div>
 
                    <div class="absolute right-2 bottom-0 text-[72px] z-20 drop-shadow-lg opacity-70 group-hover:opacity-90 group-hover:scale-110 transition-all duration-300 origin-bottom-right">🎀</div>
                </div>
 
            </div>
        </div>
    </div>
 
</section>
{{-- ============================================================
     HEWAN TERBARU
     ============================================================ --}}
<section id="hewan" class="py-14 bg-surface-white">
    <div class="w-full max-w-[96%] mx-auto px-2 sm:px-4">

        {{-- Header --}}
<div class="relative mb-8">

    {{-- Judul Tengah --}}
    <div class="text-center">
        <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-md font-medium px-4 py-1.5 rounded-full border border-brand-light mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            Siap diadopsi
        </div>

        <h2 class="text-2xl font-bold text-surface-dark">
            Hewan Tersedia
        </h2>

        <p class="text-surface-muted text-sm mt-1">
            Mereka menunggu keluarga yang hangat 💕
        </p>
    </div>

    {{-- Tombol kanan --}}
    @if(count($latestAnimals) > 0)
    <a href="{{ route('login') }}"
       class="hidden sm:inline-flex items-center gap-1.5 text-sm font-semibold text-brand-secondary hover:text-brand-primary transition-colors absolute right-0 top-1/2 -translate-y-1/2">
        Lihat semua
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
    </a>
    @endif

</div>

        {{-- Grid kartu --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($latestAnimals as $animal)

            <a href="{{ route('login') }}"
               class="group bg-surface-white rounded-2xl border border-surface-border overflow-hidden
                      hover:border-brand-light hover:shadow-lg hover:shadow-brand-primary/10
                      hover:-translate-y-1 transition-all duration-300 block">

                {{-- Foto --}}
                <div class="h-56 bg-brand-soft overflow-hidden relative">
                    @if($animal->photo)
                        <img src="{{ asset('storage/' . $animal->photo) }}"
                             alt="{{ $animal->name }}"
                             class="w-full h-full object-cover
                                    transition-transform duration-500 ease-out
                                    group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-5xl
                                    transition-transform duration-500 ease-out group-hover:scale-110">
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
                                 text-surface-dark text-xs font-semibold px-2.5 py-1 rounded-full
                                 border border-surface-border/50 shadow-sm">
                        {{ $animal->species->name }}
                    </span>

                    {{-- Badge gender --}}
                    <span class="absolute top-3 right-3 text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm
                        {{ $animal->gender === 'Jantan'
                            ? 'bg-status-adopted-bg text-status-adopted-text'
                            : 'bg-status-rejected-bg text-status-rejected-text' }}">
                        {{ $animal->gender }}
                    </span>

                    {{-- Overlay hover --}}
                    <div class="absolute inset-0 bg-brand-primary/0 group-hover:bg-brand-primary/10
                                transition-colors duration-500 pointer-events-none"></div>
                </div>

                {{-- Info --}}
                <div class="p-4">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="font-bold text-surface-dark text-base group-hover:text-brand-secondary transition-colors duration-200">
                            {{ $animal->name }}
                        </h3>
                        <span class="text-xs text-surface-muted bg-surface-alt px-2 py-0.5 rounded-full">
                            {{ $animal->age_months }} bln
                        </span>
                    </div>
                    <p class="text-xs text-surface-muted mb-4 leading-relaxed">
                        {{ Str::limit($animal->description, 65) }}
                    </p>

                    {{-- CTA --}}
                    <div class="flex items-center justify-center gap-1.5 text-xs font-semibold
                                bg-brand-soft group-hover:bg-brand-primary
                                text-brand-secondary group-hover:text-white
                                py-2 rounded-xl transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Login untuk Adopsi
                    </div>
                </div>
            </a>

            @empty
            <div class="col-span-full text-center py-16">
                <p class="text-5xl mb-4">🐾</p>
                <p class="text-surface-muted text-sm">Belum ada hewan tersedia saat ini.</p>
            </div>
            @endforelse
        </div>

        {{-- Tombol lihat semua (mobile) --}}
        @if(count($latestAnimals) > 0)
        <div class="text-center mt-10 sm:hidden">
            <a href="{{ route('login') }}"
               class="inline-flex items-center gap-2 bg-brand-primary hover:bg-brand-secondary
                      text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition-colors">
                Lihat Semua Hewan →
            </a>
        </div>
        @endif

    </div>
</section>

{{-- ============================================================
     CARA KERJA
     ============================================================ --}}
<section id="cara-adopsi" class="py-20 bg-surface-alt">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
 
        {{-- Label badge --}}
        <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-sm font-medium px-5 py-2 rounded-full border border-brand-light mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Proses adopsi
        </div>
 
        <h2 class="text-3xl sm:text-4xl font-bold text-surface-dark mb-3">Cara Kerja PawHome</h2>
        <p class="text-base text-surface-muted mb-14">Tiga langkah mudah menuju sahabat barumu</p>
 
        {{-- Grid 3 kartu + 2 panah --}}
        <div class="grid grid-cols-1 sm:grid-cols-[1fr_48px_1fr_48px_1fr] gap-0 items-start">
 
            {{-- Step 1 --}}
            <div class="flex flex-col items-center text-center bg-surface-white border border-surface-border rounded-2xl p-8 hover:border-brand-light transition-colors duration-200">
                <div class="w-24 h-24 rounded-2xl bg-brand-soft border-2 border-dashed border-brand-light flex items-center justify-center mb-6 overflow-hidden">
                    <img src="{{ asset('images/PawNum1.png') }}" alt="Langkah 1" class="w-16 h-16 object-contain">
                </div>
                <h3 class="text-lg font-semibold text-surface-dark mb-3">Daftar &amp; Masuk</h3>
                <p class="text-sm text-surface-muted leading-relaxed mb-6">
                    Buat akun adopter gratis dan login ke PawHome — cukup satu menit.
                </p>
                <div class="w-full bg-brand-soft rounded-lg px-4 py-3 text-left">
                    <p class="text-xs text-brand-secondary">✓ &nbsp;Gratis selamanya</p>
                </div>
            </div>
 
            {{-- Panah 1 --}}
            <div class="hidden sm:flex items-center justify-center pt-14">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-brand-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </div>
 
            {{-- Step 2 — highlighted --}}
            <div class="flex flex-col items-center text-center bg-surface-white border-2 border-brand-light rounded-2xl p-8 relative hover:border-brand-secondary transition-colors duration-200">
                <span class="absolute -top-3.5 right-4 bg-accent-base text-accent-strong text-xs font-semibold px-3 py-1 rounded-full">
                    Paling penting
                </span>
                <div class="w-24 h-24 rounded-2xl bg-accent-soft border-2 border-dashed border-accent-base flex items-center justify-center mb-6 overflow-hidden">
                    <img src="{{ asset('images/PawNum2.png') }}" alt="Langkah 2" class="w-16 h-16 object-contain">
                </div>
                <h3 class="text-lg font-semibold text-surface-dark mb-3">Pilih &amp; Ajukan</h3>
                <p class="text-sm text-surface-muted leading-relaxed mb-6">
                    Pilih hewan yang cocok, isi formulir adopsi beserta foto rumah dan alasan adopsimu.
                </p>
                <div class="w-full bg-accent-soft rounded-lg px-4 py-3 text-left">
                    <p class="text-xs text-accent-strong">🏠 &nbsp;Upload foto rumah diperlukan</p>
                </div>
            </div>
 
            {{-- Panah 2 --}}
            <div class="hidden sm:flex items-center justify-center pt-14">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-brand-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </div>
 
            {{-- Step 3 --}}
            <div class="flex flex-col items-center text-center bg-surface-white border border-surface-border rounded-2xl p-8 hover:border-brand-light transition-colors duration-200">
                <div class="w-24 h-24 rounded-2xl bg-brand-soft border-2 border-dashed border-brand-light flex items-center justify-center mb-6 overflow-hidden">
                    <img src="{{ asset('images/PawNum3.png') }}" alt="Langkah 3" class="w-16 h-16 object-contain">
                </div>
                <h3 class="text-lg font-semibold text-surface-dark mb-3">Tunggu Persetujuan</h3>
                <p class="text-sm text-surface-muted leading-relaxed mb-6">
                    Admin shelter meninjau pengajuanmu. Jika disetujui, kamu akan dihubungi langsung.
                </p>
                <div class="w-full bg-brand-soft rounded-lg px-4 py-3 text-left">
                    <p class="text-xs text-brand-secondary">🔔 &nbsp;Pengajuanmu akan diriview oleh kami</p>
                </div>
            </div>
 
        </div>
 
        {{-- Banner kepercayaan --}}
        <div class="inline-flex items-center gap-3 bg-accent-soft border border-accent-base rounded-xl px-6 py-4 mt-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-accent-strong flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span class="text-sm text-accent-strong">
                Seluruh proses diverifikasi oleh tim shelter Banjarmasin — aman &amp; transparan
            </span>
        </div>
 
    </div>
</section>
 
{{-- ============================================================
     CTA SECTION
     ============================================================ --}}
<section class="py-16 bg-surface-alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        {{-- Card Utama --}}
        <div class="relative overflow-hidden rounded-3xl bg-brand-primary px-10 py-14 sm:px-16 flex flex-col lg:flex-row items-center gap-12" >
            

            {{-- Blob dekoratif --}}
            <div class="absolute -top-16 -right-16 w-72 h-72 rounded-full bg-brand-secondary opacity-50 pointer-events-none"></div>
            <div class="absolute -bottom-20 right-20 w-48 h-48 rounded-full bg-brand-light opacity-15 pointer-events-none"></div>
            <div class="absolute top-6 left-[42%] w-32 h-32 rounded-full bg-accent-base opacity-[0.06] pointer-events-none"></div>

            {{-- Dekorasi paw bawah kiri --}}
            <p class="absolute bottom-4 left-8 text-white/10 font-bold tracking-[6px] text-xs pointer-events-none select-none">
                🐾 🐾 🐾 🐾
            </p>

            {{-- ── KIRI: Teks & CTA ── --}}
            <div class="relative z-10 flex-1 max-w-xl">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-1.5 bg-accent-base/15 border border-accent-base/35
                            text-accent-base text-xs font-semibold px-4 py-1.5 rounded-full mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    Banjarmasin, Kalimantan Selatan
                </div>

                {{-- Heading --}}
                <h2 class="font-brand font-black text-white text-3xl sm:text-4xl leading-tight mb-4">
                    Setiap hewan berhak<br>
                    punya <span class="text-accent-base">rumah yang hangat.</span>
                </h2>

                {{-- Sub --}}
                <p class="text-white/60 text-[15px] leading-relaxed mb-8 max-w-md">
                    Mereka tidak butuh banyak — hanya kasih sayang dan tempat yang aman.
                    Jadilah bagian dari perubahan hari ini.
                </p>

                {{-- CTA Button --}}
                <a href="{{ route('register') }}"
                   class="inline-flex items-center gap-2 bg-accent-base text-surface-dark font-bold
                          text-sm px-8 py-3.5 rounded-xl
                          hover:bg-accent-strong hover:text-white
                          active:scale-95
                          transition-all duration-200 shadow-lg shadow-accent-base/25">
                    Mulai Adopsi Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>

            </div>

            {{-- ── TENGAH: Gambar Hewan ── --}}
<div class="absolute w-[280px] h-[280px] rounded-full bg-white/20 blur-3xl"></div>

<img
    src="{{ asset('images/CTA.png') }}"
    alt="Companion"
    class="relative h-[320px] w-auto object-contain drop-shadow-2xl opacity-85 translate-y-[70px] translate-x-[-40px]"
    style="
        filter:
        drop-shadow(0 0 2px white)
        drop-shadow(0 0 5px rgba(255,255,255,0.23))
        drop-shadow(0 0 10px rgba(255,255,255,0.25))
        drop-shadow(0 15px 25px rgba(0,0,0,0.25));
    "
>
            {{-- ── KANAN: Trust Cards ── --}}
            <div class="relative z-10 flex flex-col gap-3 lg:flex-shrink-0 w-full lg:w-[200px]">

                {{-- Card 1 --}}
                <div class="flex items-center gap-4 bg-white/[0.07] border border-white/10 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-brand-light/20 flex items-center justify-center text-lg flex-shrink-0">🐾</div>
                    <div>
                        <p class="text-white/45 text-[11px] font-medium mb-0.5">Hewan tersedia</p>
                        <p class="font-brand font-extrabold text-white text-lg leading-none">120+</p>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="w-px h-6 bg-white/[0.08] mx-auto"></div>

                {{-- Card 2 — highlighted --}}
                <div class="flex items-center gap-4 bg-accent-base/12 border border-accent-base/30 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-accent-base/20 flex items-center justify-center text-lg flex-shrink-0">🎀</div>
                    <div>
                        <p class="text-accent-base/70 text-[11px] font-medium mb-0.5">Adopsi berhasil</p>
                        <p class="font-brand font-extrabold text-accent-base text-lg leading-none">80+</p>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="w-px h-6 bg-white/[0.08] mx-auto"></div>

                {{-- Card 3 --}}
                <div class="flex items-center gap-4 bg-white/[0.07] border border-white/10 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-lg flex-shrink-0">✅</div>
                    <div>
                        <p class="text-white/45 text-[11px] font-medium mb-0.5">Diverifikasi oleh</p>
                        <p class="font-brand font-extrabold text-white text-[13px] leading-tight">PawHome Banjarmasin</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- ============================================================
     TENTANG KAMI SECTION
     ============================================================ --}}
<section id="tentang" class="py-20 bg-surface-alt overflow-hidden">
    <div class="max-w-full mx-auto px-4 sm:px-6">
 
        {{-- Badge label --}}
        <div class="flex justify-center mb-10">
            <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-lg font-medium px-4 py-1.5 rounded-full border border-brand-light">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Tentang Kami
            </div>
        </div>
 
        {{-- Main card: 2 kolom (kiri konten, kanan gif) --}}
        <div class="bg-surface-white rounded-3xl border border-surface-border shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[460px]">
 
                {{-- KIRI: Konten --}}
                <div class="p-8 sm:p-12 flex flex-col justify-center">
 
                    {{-- Headline --}}
                    <h2 class="font-brand font-extrabold text-3xl sm:text-4xl text-surface-dark leading-tight mb-4">
                        Lahir dari <span class="text-brand-secondary">Kepedulian,</span><br>
                        Tumbuh dari <span class="text-accent-strong">Kepercayaan.</span>
                    </h2>
 
                    {{-- Origin story --}}
                    <p class="text-surface-muted text-sm leading-relaxed mb-6 max-w-md">
                        PawHome hadir karena kami melihat terlalu banyak hewan terlantar di Banjarmasin
                        yang layak mendapat kehidupan lebih baik. Berawal dari sebuah shelter kecil, kami
                        membangun platform ini agar proses adopsi bisa lebih mudah, transparan, dan terpercaya.
                    </p>
 
                    {{-- Misi --}}
                    <div class="bg-brand-soft border-l-4 border-brand-secondary rounded-r-xl px-5 py-4 mb-8">
                        <p class="text-black text-sm font-medium leading-relaxed italic">
                            "Menghubungkan setiap hewan yang membutuhkan kasih sayang dengan keluarga
                            yang siap menerimanya — satu adopsi dalam satu waktu."
                        </p>
                    </div>

 
                    {{-- Footer pengelola --}}
                    <div class="flex items-center gap-3 pt-4 border-t border-surface-border">
                        <div class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center flex-shrink-0">
                            <span class="text-white text-xs font-bold">🖤</span>
                        </div>
                        <p class="text-surface-muted text-xs leading-relaxed">
                            Dikelola oleh tim relawan dan shelter hewan lokal Banjarmasin,
                            <span class="text-brand-secondary font-medium">karena setiap hewan berhak pulang ke rumah yang hangat.</span>
                        </p>
                    </div>
 
                </div>
 
                {{-- KANAN: Area GIF / Visual --}}
                <div class="relative hidden lg:flex items-center justify-center bg-white/30 overflow-hidden">
 
                    {{-- Decorative circles background --}}
                    <div class="absolute top-[-60px] right-[-60px] w-[280px] h-[280px] rounded-full bg-brand-light opacity-20 pointer-events-none"></div>
                    <div class="absolute bottom-[-40px] left-[-40px] w-[200px] h-[200px] rounded-full bg-accent-base opacity-10 pointer-events-none"></div>
 
        
                    <div class="relative z-10 flex flex-col items-center gap-2">

                            <div id="gif-slot">
                                <img
                                    src="{{ asset('images/Gif2.gif') }}"
                                    alt="PawHome mascot animation"
                                    class="w-[200px] h-auto"
                                >
                            </div>

                            <div class="inline-flex items-center gap-1.5 bg-white/80 backdrop-blur-sm border border-surface-border rounded-full px-4 py-2">
                                <span class="w-2 h-2 rounded-full bg-status-available-text animate-pulse flex-shrink-0"></span>
                                <span class="text-[11px] font-medium text-surface-dark">
                                    Shelter aktif melayani adopsi
                                </span>
                            </div>

</div>
 
                </div>
 
            </div>
        </div>
 
    </div>
</section>

{{-- ============================================================
     FOOTER 
     ============================================================ --}}
 

<div class="bg-surface-alt px-4 sm:px-6">
    <footer class="bg-[#54346b] overflow-hidden relative rounded-t-3xl">
        {{-- Decorative circles --}}
        <div class="absolute top-[-80px] left-[-80px] w-[320px] h-[320px] rounded-full bg-white opacity-[0.04] pointer-events-none"></div>
        <div class="absolute bottom-[-60px] right-[-60px] w-[240px] h-[240px] rounded-full bg-white opacity-[0.04] pointer-events-none"></div>
 
        {{-- ── Baris atas: logo + lokasi ── --}}
        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10 pt-10 pb-0">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-8 border-b border-white/10">
 
                {{-- Logo + nama --}}
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logoPurple.png') }}"
                         alt="PawHome Logo"
                         class="h-[53px] w-auto"
                         style="filter: brightness(0) invert(1) opacity(0.9);">
                    <div>
                        <p class="text-white font-bold text-lg leading-tight">PawHome Banjarmasin</p>
                        <p class="text-white/40 text-md mt-0.5">Platform adopsi hewan peliharaan</p>
                    </div>
                </div>
 
                {{-- Kanan --}}
                <div class="text-left sm:text-right">
                    <p class="text-white/60 text-xs">Kalimantan Selatan, Indonesia</p>
                    <p class="text-white/30 text-xs mt-0.5">Pemrograman Web II — Tugas Akhir</p>
                </div>
            </div>
        </div>
 
        {{-- ── Trust Badges ── --}}
        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10 py-10">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 sm:gap-12">
 
                <div class="flex flex-col gap-3">
                    <div class="w-14 h-14 rounded-full border-2 border-white/30 flex items-center justify-center bg-white/10">
                        <img src="{{ asset('images/certified1.webp') }}" alt="Verified Healthy" class="w-9 h-9 object-contain">
                    </div>
                    <div>
                        <p class="text-white text-md font-semibold leading-snug">Verified Healthy</p>
                        <p class="text-white/40 text-sm mt-0.5">Animal Welfare Standard</p>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed">
                        Setiap hewan telah melalui pemeriksaan kesehatan sebelum siap diadopsi.
                    </p>
                </div>
 
                <div class="flex flex-col gap-3">
                    <div class="w-14 h-14 rounded-full border-2 border-white/30 flex items-center justify-center bg-white/10">
                        <img src="{{ asset('images/certified2.webp') }}" alt="100% Transparent" class="w-9 h-9 object-contain">
                    </div>
                    <div>
                        <p class="text-white text-md font-semibold leading-snug">100% Transparent</p>
                        <p class="text-white/40 text-sm mt-0.5">Adoption Process Partner</p>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed">
                        Setiap tahap pengajuan adopsi bisa dipantau secara langsung oleh adopter.
                    </p>
                </div>
 
                <div class="flex flex-col gap-3">
                    <div class="w-14 h-14 rounded-full border-2 border-white/30 flex items-center justify-center bg-white/10">
                        <img src="{{ asset('images/certified3.png') }}" alt="Local Shelter" class="w-9 h-9 object-contain">
                    </div>
                    <div>
                        <p class="text-white text-md font-semibold leading-snug">Local Shelter</p>
                        <p class="text-white/40 text-sm mt-0.5">Banjarmasin, Indonesia</p>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed">
                        Bermitra langsung dengan shelter hewan lokal Banjarmasin untuk setiap proses adopsi.
                    </p>
                </div>
 
            </div>
        </div>
 
        {{-- ── Brand name besar ── --}}
        <div class="relative z-10 overflow-hidden">
    <h2 class="font-brand font-black text-white select-none pointer-events-none
               leading-none tracking-tight w-full text-center"
        style="opacity: 0.10; letter-spacing: -0.02em; line-height: 0.9;
               font-size: clamp(4rem, 18vw, 18rem);">
        PawHome
    </h2>
</div>
 
        {{-- ── Copyright ── --}}
        <div class="relative z-10 border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 sm:px-10 py-4
                        flex flex-col sm:flex-row items-center justify-between gap-2">
                <p class="text-white/30 text-xs">© {{ date('Y') }} PawHome. All rights reserved.</p>
                <p class="text-white/20 text-xs">Made with 🤍 for animals in need.</p>
            </div>
        </div>
 
    </footer>
</div>

@endsection

@push('scripts')
<script>
$(window).on('scroll', function () {
    if ($(this).scrollTop() > 60) {

        // Sembunyikan nama brand
        $('#brand-name').css({
            'opacity': '0',
            'max-width': '0',
        });

        // Munculkan logo dengan animasi timbul
        $('#logo-icon').css({
            'opacity': '1',
            'transform': 'scale(1) rotate(0deg)',
            'width': 'auto',
        });

    } else {

        // Tampilkan nama brand lagi
        $('#brand-name').css({
            'opacity': '1',
            'max-width': '200px',
        });

        // Sembunyikan logo
        $('#logo-icon').css({
            'opacity': '0',
            'transform': 'scale(0.5) rotate(-20deg)',
            'width': '0',
        });

    }
});

// ── Active nav link on scroll ──────────────────────────
const sections = document.querySelectorAll('section[id], footer[id]');
const navLinks = document.querySelectorAll('.nav-link');

const observerOptions = {
    root: null,
    rootMargin: '-30% 0px -60% 0px', // trigger saat section di tengah viewport
    threshold: 0
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const activeId = entry.target.getAttribute('id');

            navLinks.forEach(link => {
                const isActive = link.getAttribute('data-section') === activeId;

                if (isActive) {
                    // Active state
                    link.classList.remove('border-transparent', 'text-gray-500');
                    link.classList.add('border-accent-base', 'text-brand-primary', 'font-semibold');
                } else {
                    // Inactive state
                    link.classList.remove('border-accent-base', 'text-brand-primary', 'font-semibold');
                    link.classList.add('border-transparent', 'text-gray-500', 'font-medium');
                }
            });
        }
    });
}, observerOptions);

sections.forEach(section => observer.observe(section));
</script>
@endpush
