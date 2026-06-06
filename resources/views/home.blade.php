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
            <a href="#hewan-terbaru" data-section="hewan-terbaru"
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
<section id="beranda" class="relative overflow-hidden" style="background: linear-gradient(90deg,  #2c0c42 0%, #e7c4ff 700%); min-height: 550px;">
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
    style="filter: drop-shadow(0 0 8px rgba(200,160,255,0.15));">
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
<section id="statistik" class="pt-20 pb-24 relative overflow-hidden bg-white">
 
    {{-- Decorative paw --}}
    <div class="absolute inset-0 pointer-events-none select-none z-70 flex items-center justify-end pr-[8%]">
        <img src="{{ asset('images/paw.png') }}"
             alt="" aria-hidden="true"
             class="w-[650px] h-auto object-contain opacity-[0.35]"
             style="transform: rotate(15deg);">
    </div>
 
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
 
        {{-- Cat image --}}
        <div class="absolute -bottom-[-527px] -right-[189px] z-40 pointer-events-none">
            <img src="{{ asset('images/PawCatHome.png') }}"
                 style="transform: rotate(-2deg);"
                 class="h-[700px] w-auto object-contain object-bottom"
                 alt="Kucing">
        </div>
 
      {{-- Section Header --}}
<div class="mb-10">
    <span class="inline-flex items-center gap-2 bg-brand-soft text-brand-secondary text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-accent-base inline-block"></span>
        Statistik PawHome
    </span>
    <h2 class="font-brand text-3xl font-black text-surface-dark leading-snug">
        Ada yang sudah punya rumah.<br>
        Sisanya, <span class="relative inline-block text-accent-base">
            menunggumu.
            <svg class="absolute -bottom-1 left-0 w-full" viewBox="0 0 200 8" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 6 Q50 0 100 5 Q150 10 200 4" stroke="#fbbf24" stroke-width="2.5" fill="none" stroke-linecap="round"/>
            </svg>
        </span>
    </h2>
</div>

        
    {{-- Wrapper card pembungkus --}}
    <div class="bg-white/15 backdrop-blur-sm border border-white/20 rounded-[28px] p-5 sm:p-6 shadow-xl shadow-brand-primary/20">

        {{-- Strip 4 card sejajar --}}
        <div class="rounded-[24px] overflow-hidden flex flex-col sm:flex-row shadow-2xl shadow-brand-primary/10">

            {{-- ① Siap Diadopsi --}}
            <div class="stat-item group relative flex-1 bg-brand-primary p-7 sm:p-8
                    flex flex-col justify-between gap-5
                    min-h-[220px] sm:min-h-[280px]
                    border-b sm:border-b-0 sm:border-r border-white/10
                    overflow-hidden
                    transition-all duration-300
                    hover:[box-shadow:0_20px_40px_rgba(63,13,97,0.35),inset_0_0_0_1.5px_rgba(192,132,245,0.4)]">

                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-[0.06] transition-opacity duration-300 z-0"></div>
                <div class="absolute right-[-50px] bottom-[-50px] w-[200px] h-[200px] rounded-full bg-brand-light/10 group-hover:scale-125 transition-transform duration-500"></div>
                <div class="absolute right-0 bottom-0 w-[110px] h-[110px] rounded-full bg-white/[0.04]"></div>
                <div class="flex items-center gap-2.5 relative z-10">
                    <span class="text-[20px] font-black tracking-[0.3em] text-white/25 uppercase">✨</span>
                    <span class="w-px h-3 bg-white/20"></span>
                    <span class="text-xs font-bold text-white/50 transition-all duration-300 group-hover:text-white group-hover:text-lg">Siap Diadopsi</span>
                </div>
                <div class="relative z-10">
                    <p class="font-brand font-black text-white leading-none count-up
                              group-hover:scale-[1.04] transition-transform duration-300 inline-block origin-left"
                       data-target="{{ $stats['available'] }}"
                       style="font-size: clamp(54px, 6vw, 86px);">0</p>
                    <p class=" text-white/40 text-[16px] mt-2.5 font-extrabold tracking-wide">✨ Tersedia sekarang</p>
                </div>
                 <div class="absolute -right-9 -bottom-8 z-20 select-none
                        opacity-[0.1] group-hover:opacity-[0.9] group-hover:scale-110
                        transition-all duration-300 origin-bottom-right">
                <img src="{{ asset('images/Statistika1.png') }}" class="w-[200px] h-[200px] object-contain">
                </div> 
            </div>

            {{-- ② Total Hewan --}}
            <div class="stat-item group relative flex-1 bg-brand-soft p-7 sm:p-8
                    flex flex-col justify-between gap-5
                    min-h-[220px] sm:min-h-[280px]
                    border-b sm:border-b-0 sm:border-r border-brand-primary/10
                    overflow-hidden
                    transition-all duration-300
                    hover:[box-shadow:0_20px_40px_rgba(124,47,168,0.1),inset_0_0_0_1.5px_rgba(124,47,168,0.25)]">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-[0.08] transition-opacity duration-300 z-0"></div>
                <div class="absolute right-[-50px] bottom-[-50px] w-[200px] h-[200px] rounded-full bg-brand-primary/[0.07] group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-2.5 relative z-10">
                    <span class="text-[20px] font-black tracking-[0.3em] text-brand-primary/25 uppercase">🐱</span>
                    <span class="w-px h-3 bg-brand-primary/15"></span>
                    <span class="text-xs font-bold text-brand-secondary/50 transition-all duration-300 group-hover:text-brand-secondary group-hover:text-lg">Total Hewan</span>
                </div>
                <div class="relative z-10">
                    <p class="font-brand font-black text-brand-primary leading-none count-up
                              group-hover:scale-[1.04] transition-transform duration-300 inline-block origin-left"
                       data-target="{{ $stats['total_animals'] }}"
                       style="font-size: clamp(54px, 6vw, 86px);">0</p>
                    <p class="text-brand-primary/35 text-[16px] mt-2.5 font-semibold tracking-wide">🐱 Semua spesies</p>
                </div>
                <div class="absolute -right-7 -bottom-7 z-20 select-none
                opacity-[0.1] group-hover:opacity-[0.9] group-hover:scale-110
                transition-all duration-300 origin-bottom-right">
                <img src="{{ asset('images/statistika2.png') }}" class="w-[180px] h-[180px] object-contain">
                 </div> 
        </div>

            {{-- ③ Sudah Diadopsi --}}
            <div class="stat-item group relative flex-1 bg-status-adopted-bg p-7 sm:p-8
                    flex flex-col justify-between gap-5
                    min-h-[220px] sm:min-h-[280px]
                    border-b sm:border-b-0 sm:border-r border-status-adopted-text/10
                    overflow-hidden
                    transition-all duration-300
                    hover:[box-shadow:0_20px_40px_rgba(79,70,229,0.12),inset_0_0_0_1.5px_rgba(79,70,229,0.3)]">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-[0.08] transition-opacity duration-300 z-0"></div>
                <div class="absolute right-[-50px] bottom-[-50px] w-[200px] h-[200px] rounded-full bg-status-adopted-text/[0.1] group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-2.5 relative z-10">
                    <span class="text-[20px] font-black tracking-[0.3em] text-status-adopted-text/25 uppercase">💜</span>
                    <span class="w-px h-3 bg-status-adopted-text/15"></span>
                    <span class="text-xs font-bold text-status-adopted-text/50 transition-all duration-300 group-hover:text-status-adopted group-hover:text-lg">Sudah Diadopsi</span>
                </div>
                <div class="relative z-10">
                    <p class="font-brand font-black text-status-adopted-text leading-none count-up
                              group-hover:scale-[1.04] transition-transform duration-300 inline-block origin-left"
                       data-target="{{ $stats['adopted'] }}"
                       style="font-size: clamp(54px, 6vw, 86px);">0</p>
                    <p class="text-status-adopted-text/35 text-[16px] mt-2.5 font-semibold tracking-wide">💜 Telah berpindah</p>
                </div>
               <div class="absolute -right-9 -bottom-12 z-20 select-none
            opacity-[0.1] group-hover:opacity-[0.9] group-hover:scale-110
            transition-all duration-300 origin-bottom-right">
            <img src="{{ asset('images/statistika4.png') }}" class="w-[200px] h-[200px] object-contain"> </div> 
        </div>

            {{-- ④ Adopsi Berhasil --}}
            <div class="stat-item group relative flex-1 bg-accent-soft p-7 sm:p-8
                    flex flex-col justify-between gap-5
                    min-h-[220px] sm:min-h-[280px]
                    overflow-hidden
                    transition-all duration-300
                    hover:[box-shadow:0_20px_40px_rgba(251,191,36,0.15),inset_0_0_0_1.5px_rgba(251,191,36,0.45)]">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-[0.08] transition-opacity duration-300 z-0"></div>
                <div class="absolute right-[-50px] bottom-[-50px] w-[200px] h-[200px] rounded-full bg-accent-base/[0.25] group-hover:scale-125 transition-transform duration-500"></div>
                <div class="flex items-center gap-2.5 relative z-10">
                    <span class="text-[20px] font-black tracking-[0.3em] text-accent-strong/25 uppercase">🎀</span>
                    <span class="w-px h-3 bg-accent-strong/15"></span>
                    <span class="text-xs font-bold text-accent-strong/50 transition-all duration-300 group-hover:text-accent-strong group-hover:text-lg">Adopsi Berhasil</span>
                </div>
                <div class="relative z-10">
                    <p class="font-brand font-black text-accent-strong leading-none count-up
                              group-hover:scale-[1.04] transition-transform duration-300 inline-block origin-left"
                       data-target="{{ $stats['total_adoptions'] }}"
                       style="font-size: clamp(54px, 6vw, 86px);">0</p>
                    <p class="text-accent-strong/35 text-[16px] mt-2.5 font-semibold tracking-wide">🎀 Disetujui admin</p>
                </div>
               <div class="absolute -right-3 -bottom-7 z-20 select-none
            opacity-[0.1] group-hover:opacity-[0.9] group-hover:scale-110
            transition-all duration-300 origin-bottom-right">
            <img src="{{ asset('images/statistika3.png') }}" class="w-[170px] h-[170px] object-contain"> </div> 
        </div>

        </div>
    </div>
  </div>
</section>
{{-- ============================================================
     HEWAN TERBARU
     ============================================================ --}}

<section id="hewan-terbaru" class="py-16 bg-white font-sans">
    <div class="w-full max-w-[94%] mx-auto px-2 sm:px-4">

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
    </div>


        {{-- Header --}}
        <div class="text-center mt-8 ">
            <div>
                <h2 class="font-brand font-black text-surface-dark leading-[1.05] tracking-[-0.02em]"
    style="font-size: clamp(2.2rem, 4vw, 3.4rem);">
    Temukan <span class="relative inline-block text-brand-primary">
        <span id="typeword">Kucingmu.</span>
        <svg class="absolute -bottom-1 left-0 w-full" viewBox="0 0 200 8" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 6 Q50 0 100 5 Q150 10 200 4" stroke="#3f0d61" stroke-width="2.5" fill="none" stroke-linecap="round"/>
        </svg>
    </span>
</h2>
                 <p class="text-surface-muted text-lg mt-4 mb-12">  Mereka menunggu keluarga yang hangat 💕</p>
            </div>
            @if(count($latestAnimals) > 0)
            <div class="hidden sm:flex flex-col items-end gap-1.5 pb-1">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center gap-1.5 text-[17px] font-semibold text-brand-secondary
                          transition-all duration-200 hover:gap-2.5 hover:text-brand-primary">
                    Lihat semua hewan
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <span class="text-[13px] text-gray-400">{{ count($latestAnimals) }} hewan tersedia</span>
            </div>
            @endif
        </div>

        @if(count($latestAnimals) > 0)
        @php
            $featured  = $latestAnimals[0];
            $secondary = $latestAnimals->skip(1)->take(4);
            $secCount  = $secondary->count();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-stretch">

            {{-- FEATURED --}}
            <div class="md:col-span-5">
                <a href="{{ route('login') }}"
                   class="group relative rounded-[20px] overflow-hidden bg-surface-dark cursor-pointer block no-underline">

                    @if($featured->photo)
                        <div class="w-full min-h-[420px] relative overflow-hidden">
                            <img src="{{ asset('storage/' . $featured->photo) }}"
                                 alt="{{ $featured->name }}"
                                 class="w-full h-full object-cover block transition-transform duration-700 ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.07]">
                        </div>
                    @else
                        <div class="w-full min-h-[420px] flex items-center justify-center text-[96px]
                                    transition-transform duration-700 ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.07]"
                             style="background: linear-gradient(135deg, #3f0d61 0%, #7c2fa8 60%, #A474CF 100%);">
                            @switch($featured->species->name)
                                @case('Kucing') 🐱 @break
                                @case('Anjing') 🐶 @break
                                @case('Kelinci') 🐰 @break
                                @case('Hamster') 🐹 @break
                                @default 🐾
                            @endswitch
                        </div>
                    @endif

                    {{-- Badges --}}
                    <span class="absolute top-[18px] left-[18px] z-10
                                 bg-brand-deep/15 backdrop-blur-[10px] border border-white/25
                                 text-white text-[16px] font-semibold px-3 py-1.5 rounded-full tracking-[0.03em]">
                        {{ $featured->species->name }}
                    </span>
                    <span class="absolute top-[18px] right-[18px] z-10
                                 bg-accent-base text-surface-dark text-[13.5px] font-bold px-3 py-1.5 rounded-full tracking-[0.02em]">
                        {{ $featured->age_months }} bulan
                    </span>

                    {{-- Overlay --}}
                    <div class="absolute inset-0 pointer-events-none"
                         style="background: linear-gradient(to top, rgba(10,4,30,0.88) 0%, rgba(10,4,30,0.3) 50%, transparent 100%);"></div>

                    {{-- Info --}}
                    <div class="absolute bottom-0 left-0 right-0 p-7">
                        <p class="text-[10px] font-bold tracking-[0.15em] uppercase text-accent-base mb-1.5">✦ Featured</p>
                        <p class="font-brand font-black text-white leading-[1.1] mb-1.5
                                  transition-[letter-spacing] duration-300 group-hover:tracking-[0.01em]"
                           style="font-size: clamp(1.8rem, 3vw, 2.6rem);">
                            {{ $featured->name }}
                        </p>
                        <p class="text-[15px] text-white/70 leading-[1.6] mb-[18px]
                                  line-clamp-2">
                            {{ $featured->description }}
                        </p>
                        <span class="inline-flex items-center gap-2 bg-accent-base text-surface-dark
                                     text-[12.5px] font-bold px-5 py-2.5 rounded-full tracking-[0.01em]
                                     transition-all duration-200 group-hover:bg-accent-strong group-hover:translate-x-[5px]">
                            Login untuk adopsi
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                                 class="transition-transform duration-200 group-hover:translate-x-[2px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>

            {{-- SECONDARY CARDS --}}
            <div class="md:col-span-7 flex flex-col">

                @if($secCount === 1)
                <div class="flex-1">
                    @php $a = $secondary->first(); @endphp
                    <a href="{{ route('login') }}"
                       class="group relative rounded-[18px] overflow-hidden flex flex-col no-underline bg-white
                              border-[1.5px] border-surface-border h-full
                              transition-all duration-[250ms] hover:border-[#C4A8E8] hover:shadow-[0_6px_24px_rgba(63,13,97,0.12)] hover:-translate-y-[10px]">
                        <div class="relative h-[320px] overflow-hidden flex-shrink-0 bg-brand-soft">
                            @if($a->photo)
                                <img src="{{ asset('storage/' . $a->photo) }}" alt="{{ $a->name }}"
                                     class="w-full h-full object-cover block transition-transform duration-[600ms] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.08]">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-5xl
                                            transition-transform duration-[600ms] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.12]">
                                    @switch($a->species->name)
                                        @case('Kucing') 🐱 @break @case('Anjing') 🐶 @break
                                        @case('Kelinci') 🐰 @break @case('Hamster') 🐹 @break @default 🐾
                                    @endswitch
                                </div>
                            @endif
                            <div class="absolute inset-0 pointer-events-none"
                                 style="background: linear-gradient(to bottom, rgba(10,4,30,0.3) 0%, transparent 55%);"></div>
                            <div class="absolute top-2.5 left-2.5 right-2.5 flex justify-between z-[3]">
                                <span class="bg-brand-deep/20 backdrop-blur-[10px] border border-white/25 text-white text-[10px] font-semibold px-2.5 py-1 rounded-full tracking-[0.04em]">{{ $a->species->name }}</span>
                                <span class="{{ $a->gender==='Jantan' ? 'bg-blue-500/30 border border-blue-400/40 text-blue-200' : 'bg-pink-500/25 border border-pink-400/40 text-pink-200' }} backdrop-blur-[10px] text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->gender }}</span>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-1 gap-1.5">
                            <p class="font-brand font-bold text-[17px] text-surface-dark truncate m-0 transition-colors duration-200 group-hover:text-brand-primary">{{ $a->name }}</p>
                            <p class="text-[11.5px] text-surface-muted leading-[1.55] flex-1 line-clamp-2 m-0">{{ Str::limit($a->description, 120) }}</p>
                            <div class="flex items-center gap-1.5 flex-wrap mt-auto">
                                <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full tracking-[0.02em] bg-[#EDE8F7] text-[#4A2299]">{{ $a->species->name }}</span>
                                <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full tracking-[0.02em] bg-accent-soft text-[#8B5A00]">{{ $a->age_months }} bln</span>
                                <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full tracking-[0.02em] {{ $a->gender==='Jantan' ? 'bg-[#E0EEF9] text-[#1A5F99]' : 'bg-[#FCE8F0] text-[#991A50]' }}">{{ $a->gender }}</span>
                            </div>
                        </div>
                    </a>
                </div>

                @elseif($secCount === 2)
                <div class="flex-1 flex flex-col gap-4">
                    @foreach($secondary as $a)
                    <div class="flex-1">
                        <a href="{{ route('login') }}"
                           class="group relative rounded-[18px] overflow-hidden flex flex-col no-underline bg-white
                                  border-[1.5px] border-surface-border h-full
                                  transition-all duration-[250ms] hover:border-[#C4A8E8] hover:shadow-[0_6px_24px_rgba(63,13,97,0.12)] hover:-translate-y-[3px]">
                            <div class="relative h-[200px] overflow-hidden flex-shrink-0 bg-brand-soft">
                                @if($a->photo)
                                    <img src="{{ asset('storage/' . $a->photo) }}" alt="{{ $a->name }}"
                                         class="w-full h-full object-cover block transition-transform duration-[600ms] group-hover:scale-[1.08]">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-5xl transition-transform duration-[600ms] group-hover:scale-[1.12]">
                                        @switch($a->species->name) @case('Kucing')🐱@break @case('Anjing')🐶@break @case('Kelinci')🐰@break @case('Hamster')🐹@break @default 🐾 @endswitch
                                    </div>
                                @endif
                                <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, rgba(10,4,30,0.3) 0%, transparent 55%);"></div>
                                <div class="absolute top-2.5 left-2.5 right-2.5 flex justify-between z-[3]">
                                    <span class="bg-white/20 backdrop-blur-[10px] border border-white/25 text-white text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->species->name }}</span>
                                    <span class="{{ $a->gender==='Jantan' ? 'bg-blue-500/30 border border-blue-400/40 text-blue-200' : 'bg-pink-500/25 border border-pink-400/40 text-pink-200' }} backdrop-blur-[10px] text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->gender }}</span>
                                </div>
                            </div>
                            <div class="p-4 flex flex-col flex-1 gap-1.5">
                                <p class="font-brand font-bold text-[17px] text-surface-dark truncate m-0 transition-colors duration-200 group-hover:text-brand-primary">{{ $a->name }}</p>
                                <p class="text-[11.5px] text-surface-muted leading-[1.55] flex-1 line-clamp-2 m-0">{{ Str::limit($a->description, 100) }}</p>
                                <div class="flex items-center gap-1.5 flex-wrap mt-auto">
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#EDE8F7] text-[#4A2299]">{{ $a->species->name }}</span>
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-accent-soft text-[#8B5A00]">{{ $a->age_months }} bln</span>
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full {{ $a->gender==='Jantan' ? 'bg-[#E0EEF9] text-[#1A5F99]' : 'bg-[#FCE8F0] text-[#991A50]' }}">{{ $a->gender }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                @elseif($secCount === 3)
                @php $sv = $secondary->values(); @endphp
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex-1">
                        <a href="{{ route('login') }}"
                           class="group relative rounded-[18px] overflow-hidden flex flex-row no-underline bg-white
                                  border-[1.5px] border-surface-border h-full
                                  transition-all duration-[250ms] hover:border-[#C4A8E8] hover:shadow-[0_6px_24px_rgba(63,13,97,0.12)] hover:-translate-y-[3px]">
                            <div class="relative w-[220px] flex-shrink-0 overflow-hidden bg-brand-soft">
                                @if($sv[0]->photo)
                                    <img src="{{ asset('storage/' . $sv[0]->photo) }}" alt="{{ $sv[0]->name }}"
                                         class="w-full h-full object-cover block transition-transform duration-[600ms] group-hover:scale-[1.08]">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-5xl transition-transform duration-[600ms] group-hover:scale-[1.12]">
                                        @switch($sv[0]->species->name) @case('Kucing')🐱@break @case('Anjing')🐶@break @case('Kelinci')🐰@break @case('Hamster')🐹@break @default 🐾 @endswitch
                                    </div>
                                @endif
                                <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, rgba(10,4,30,0.3) 0%, transparent 55%);"></div>
                                <div class="absolute top-2.5 left-2.5 right-2.5 flex justify-between z-[3]">
                                    <span class="bg-white/20 backdrop-blur-[10px] border border-white/25 text-white text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $sv[0]->species->name }}</span>
                                    <span class="{{ $sv[0]->gender==='Jantan' ? 'bg-blue-500/30 border border-blue-400/40 text-blue-200' : 'bg-pink-500/25 border border-pink-400/40 text-pink-200' }} backdrop-blur-[10px] text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $sv[0]->gender }}</span>
                                </div>
                            </div>
                            <div class="p-[18px_20px] flex flex-col flex-1 gap-1.5">
                                <p class="font-brand font-bold text-[17px] text-surface-dark truncate m-0 transition-colors duration-200 group-hover:text-brand-primary">{{ $sv[0]->name }}</p>
                                <p class="text-[11.5px] text-surface-muted leading-[1.55] flex-1 [-webkit-line-clamp:4] line-clamp-4 m-0">{{ $sv[0]->description }}</p>
                                <div class="flex items-center gap-1.5 flex-wrap mt-auto">
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#EDE8F7] text-[#4A2299]">{{ $sv[0]->species->name }}</span>
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-accent-soft text-[#8B5A00]">{{ $sv[0]->age_months }} bln</span>
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full {{ $sv[0]->gender==='Jantan' ? 'bg-[#E0EEF9] text-[#1A5F99]' : 'bg-[#FCE8F0] text-[#991A50]' }}">{{ $sv[0]->gender }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="flex-1 grid grid-cols-2 gap-4">
                        @foreach([$sv[1], $sv[2]] as $a)
                        <a href="{{ route('login') }}"
                           class="group relative rounded-[18px] overflow-hidden flex flex-col no-underline bg-white
                                  border-[1.5px] border-surface-border h-full
                                  transition-all duration-[250ms] hover:border-[#C4A8E8] hover:shadow-[0_6px_24px_rgba(63,13,97,0.12)] hover:-translate-y-[3px]">
                            <div class="relative h-[150px] overflow-hidden flex-shrink-0 bg-brand-soft">
                                @if($a->photo)
                                    <img src="{{ asset('storage/' . $a->photo) }}" alt="{{ $a->name }}"
                                         class="w-full h-full object-cover block transition-transform duration-[600ms] group-hover:scale-[1.08]">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[38px] transition-transform duration-[600ms] group-hover:scale-[1.12]">
                                        @switch($a->species->name) @case('Kucing')🐱@break @case('Anjing')🐶@break @case('Kelinci')🐰@break @case('Hamster')🐹@break @default 🐾 @endswitch
                                    </div>
                                @endif
                                <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, rgba(10,4,30,0.3) 0%, transparent 55%);"></div>
                                <div class="absolute top-2.5 left-2.5 right-2.5 flex justify-between z-[3]">
                                    <span class="bg-white/20 backdrop-blur-[10px] border border-white/25 text-white text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->species->name }}</span>
                                    <span class="{{ $a->gender==='Jantan' ? 'bg-blue-500/30 border border-blue-400/40 text-blue-200' : 'bg-pink-500/25 border border-pink-400/40 text-pink-200' }} backdrop-blur-[10px] text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->gender }}</span>
                                </div>
                            </div>
                            <div class="p-4 flex flex-col flex-1 gap-1.5">
                                <p class="font-brand font-bold text-[17px] text-surface-dark truncate m-0 transition-colors duration-200 group-hover:text-brand-primary">{{ $a->name }}</p>
                                <p class="text-[11.5px] text-surface-muted leading-[1.55] flex-1 line-clamp-2 m-0">{{ Str::limit($a->description, 70) }}</p>
                                <div class="flex items-center gap-1.5 flex-wrap mt-auto">
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#EDE8F7] text-[#4A2299]">{{ $a->species->name }}</span>
                                    <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-accent-soft text-[#8B5A00]">{{ $a->age_months }} bln</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                @else
                {{-- 4 kartu: 2x2 grid --}}
                <div class="flex-1 grid grid-cols-2 grid-rows-2 gap-4">
                    @foreach($secondary as $a)
                    <a href="{{ route('login') }}"
                       class="group relative rounded-[18px] overflow-hidden flex flex-col no-underline bg-white
                              border-[1.5px] border-surface-border h-full
                              transition-all duration-[250ms] hover:border-[#C4A8E8] hover:shadow-[0_6px_24px_rgba(63,13,97,0.12)] hover:-translate-y-[3px]">
                        <div class="relative h-[160px] overflow-hidden flex-shrink-0 bg-brand-soft">
                            @if($a->photo)
                                <img src="{{ asset('storage/' . $a->photo) }}" alt="{{ $a->name }}"
                                     class="w-full h-full object-cover block transition-transform duration-[600ms] group-hover:scale-[1.08]">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[38px] transition-transform duration-[600ms] group-hover:scale-[1.12]">
                                    @switch($a->species->name) @case('Kucing')🐱@break @case('Anjing')🐶@break @case('Kelinci')🐰@break @case('Hamster')🐹@break @default 🐾 @endswitch
                                </div>
                            @endif
                            <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, rgba(10,4,30,0.3) 0%, transparent 55%);"></div>
                            <div class="absolute top-2.5 left-2.5 right-2.5 flex justify-between z-[3]">
                                <span class="bg-white/20 backdrop-blur-[10px] border border-white/25 text-white text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->species->name }}</span>
                                <span class="{{ $a->gender==='Jantan' ? 'bg-blue-500/30 border border-blue-400/40 text-blue-200' : 'bg-pink-500/25 border border-pink-400/40 text-pink-200' }} backdrop-blur-[10px] text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $a->gender }}</span>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-1 gap-1.5">
                            <p class="font-brand font-bold text-[17px] text-surface-dark truncate m-0 transition-colors duration-200 group-hover:text-brand-primary">{{ $a->name }}</p>
                            <p class="text-[11.5px] text-surface-muted leading-[1.55] flex-1 line-clamp-2 m-0">{{ Str::limit($a->description, 70) }}</p>
                            <div class="flex items-center gap-1.5 flex-wrap mt-auto">
                                <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#EDE8F7] text-[#4A2299]">{{ $a->species->name }}</span>
                                <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-accent-soft text-[#8B5A00]">{{ $a->age_months }} bln</span>
                                <span class="text-[10px] font-semibold px-2.5 py-0.5 rounded-full {{ $a->gender==='Jantan' ? 'bg-[#E0EEF9] text-[#1A5F99]' : 'bg-[#FCE8F0] text-[#991A50]' }}">{{ $a->gender }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif

            </div>
        </div>

        {{-- View all mobile --}}
        <div class="text-center mt-10 sm:hidden">
            <a href="{{ route('login') }}"
               class="inline-flex items-center gap-2 bg-brand-primary text-white
                      text-[13.5px] font-semibold px-7 py-3 rounded-full no-underline
                      transition-all duration-200 hover:bg-brand-secondary hover:-translate-y-[1px]">
                Lihat Semua Hewan
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>

        @else
        <div class="text-center py-20">
            <p class="text-[56px] mb-4">🐾</p>
            <p class="text-surface-muted text-[15px]">Belum ada hewan tersedia saat ini.</p>
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
        <div class="relative overflow-hidden rounded-3xl bg-brand-plum px-10 py-14 sm:px-16 flex flex-col lg:flex-row items-center gap-12
                    border border-brand-soft/20"
             style="box-shadow: 0 20px 60px rgba(63,13,97,0.6);">

            {{-- Blob dekoratif --}}
            <div class="absolute -top-16 -right-16 w-72 h-72 rounded-full bg-brand-primary opacity-30 pointer-events-none"></div>
            <div class="absolute -bottom-20 right-20 w-48 h-48 rounded-full bg-brand-light opacity-10 pointer-events-none"></div>
            <div class="absolute top-6 left-[42%] w-32 h-32 rounded-full bg-accent-base opacity-[0.08] pointer-events-none"></div>
            

            {{-- Dekorasi paw bawah kiri --}}
            <p class="absolute bottom-4 left-8 text-white/20 font-bold tracking-[6px] text-xs pointer-events-none select-none">
                🐾 🐾 🐾 🐾
            </p>

            {{-- ── KIRI: Teks & CTA ── --}}
            <div class="relative z-10 flex-1 max-w-xl">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-1.5 bg-accent-base/20 border border-accent-base/40
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
                <p class="text-white/75 text-[15px] leading-relaxed mb-8 max-w-md">
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
                class="relative h-[320px] w-auto object-contain opacity-90 translate-y-[70px] translate-x-[-40px]"
                style="
                    filter:
                   drop-shadow(0 0 4px rgba(255,255,255,0.4))
                    drop-shadow(0 0 16px rgba(192,132,245,0.2))
                    drop-shadow(0 0 30px rgba(192,132,245,0.1))
                    drop-shadow(0 25px 35px rgba(63,13,97,0.3))">

                     {{-- ── KANAN: Trust Cards ── --}}
            <div class="relative z-10 flex flex-col gap-3 lg:flex-shrink-0 w-full lg:w-[200px]">
 
                {{-- Card 1 --}}
                <div class="flex items-center gap-4 backdrop-blur-md bg-white/10 border border-brand-soft/20
                            rounded-2xl px-5 py-4"
                     style="box-shadow: 0 0 8px rgba(245,238,255,0.04);">
                    <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center text-lg flex-shrink-0">🐾</div>
                    <div>
                        <p class="text-white/55 text-[11px] font-medium mb-0.5">Hewan tersedia</p>
                        <p class="font-brand font-extrabold text-white text-lg leading-none">120+</p>
                    </div>
                </div>
 
                {{-- Divider --}}
                <div class="w-px h-6 bg-white/15 mx-auto"></div>
 
                {{-- Card 2 — highlighted --}}
                <div class="flex items-center gap-4 backdrop-blur-md bg-white/12 border border-brand-soft/35
                            rounded-2xl px-5 py-4"
                     style="box-shadow: 0 0 12px rgba(245,238,255,0.07), inset 0 0 8px rgba(245,238,255,0.03);">
                    <div class="w-10 h-10 rounded-xl bg-brand-soft/20 flex items-center justify-center text-lg flex-shrink-0">🎀</div>
                    <div>
                        <p class="text-brand-soft/70 text-[11px] font-medium mb-0.5">Adopsi berhasil</p>
                        <p class="font-brand font-extrabold text-brand-soft text-lg leading-none">80+</p>
                    </div>
                </div>
 
                {{-- Divider --}}
                <div class="w-px h-6 bg-white/15 mx-auto"></div>
 
                {{-- Card 3 --}}
                <div class="flex items-center gap-4 backdrop-blur-md bg-white/10 border border-brand-soft/20
                            rounded-2xl px-5 py-4"
                     style="box-shadow: 0 0 8px rgba(245,238,255,0.04);">
                    <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center text-lg flex-shrink-0">✅</div>
                    <div>
                        <p class="text-white/55 text-[11px] font-medium mb-0.5">Diverifikasi oleh</p>
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
// ── Navbar scroll ──────────────────────────────────────
$(window).on('scroll', function () {
    if ($(this).scrollTop() > 60) {
        $('#brand-name').css({ 'opacity': '0', 'max-width': '0' });
        $('#logo-icon').css({ 'opacity': '1', 'transform': 'scale(1) rotate(0deg)', 'width': 'auto' });
    } else {
        $('#brand-name').css({ 'opacity': '1', 'max-width': '200px' });
        $('#logo-icon').css({ 'opacity': '0', 'transform': 'scale(0.5) rotate(-20deg)', 'width': '0' });
    }
});

// ── Active nav link on scroll ──────────────────────────
const sections = document.querySelectorAll('section[id], footer[id]');
const navLinks = document.querySelectorAll('.nav-link');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const activeId = entry.target.getAttribute('id');
            navLinks.forEach(link => {
                const isActive = link.getAttribute('data-section') === activeId;
                if (isActive) {
                    link.classList.remove('border-transparent', 'text-gray-500');
                    link.classList.add('border-accent-base', 'text-brand-primary', 'font-semibold');
                } else {
                    link.classList.remove('border-accent-base', 'text-brand-primary', 'font-semibold');
                    link.classList.add('border-transparent', 'text-gray-500', 'font-medium');
                }
            });
        }
    });
}, { root: null, rootMargin: '-30% 0px -60% 0px', threshold: 0 });

sections.forEach(section => observer.observe(section));

// ── Count-up on scroll ─────────────────────────────────
const countEls = document.querySelectorAll('.count-up');

const runCount = (el) => {
    const target   = parseInt(el.dataset.target, 10) || 0;
    const duration = 1800;
    const start    = performance.now();
    const ease     = t => 1 - Math.pow(1 - t, 4);
    const tick = (now) => {
        const p = Math.min((now - start) / duration, 1);
        el.textContent = Math.floor(ease(p) * target);
        if (p < 1) requestAnimationFrame(tick);
        else el.textContent = target;
    };
    requestAnimationFrame(tick);
};

const countObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) { runCount(e.target); countObserver.unobserve(e.target); }
    });
}, { threshold: 0.35 });

countEls.forEach(el => countObserver.observe(el));

// ── 1. Fade + slide-up saat scroll ────────────────────
const statCards = document.querySelectorAll('.stat-item');

statCards.forEach((card, i) => {
    card.style.opacity   = '0';
    card.style.transform = 'translateY(40px)';
    card.style.transition = `opacity 0.6s ease ${i * 100}ms, transform 0.6s ease ${i * 100}ms`;
});

const slideObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity   = '1';
            e.target.style.transform = 'translateY(0)';
            slideObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.15 });

statCards.forEach(card => slideObserver.observe(card));

// ── Typewriter word swap ───────────────────────────────
const words = ['Kucingmu.', 'Anjingmu.', 'Kelincimu.', 'Sahabatmu.'];
let index = 0;
const el = document.getElementById('typeword');

setInterval(() => {
    el.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    el.style.opacity = '0';
    el.style.transform = 'translateY(-8px)';

    setTimeout(() => {
        index = (index + 1) % words.length;
        el.textContent = words[index];
        el.style.transform = 'translateY(8px)';
        setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        }, 50);
    }, 300);
}, 2000);

// ── 5. Border glow on hover ────────────────────────────
// Sudah handled di CSS — tambahin style ini
const style = document.createElement('style');
style.textContent = `
    .stat-item {
        box-shadow: inset 0 0 0 1px transparent;
        transition: box-shadow 0.3s ease, filter 0.3s ease;
    }
    .stat-item.bg-brand-primary:hover {
        box-shadow: inset 0 0 0 1.5px rgba(192, 132, 245, 0.5), 0 0 24px rgba(63, 13, 97, 0.25);
    }
    .stat-item.bg-brand-soft:hover {
        box-shadow: inset 0 0 0 1.5px rgba(124, 47, 168, 0.25), 0 0 24px rgba(124, 47, 168, 0.1);
    }
    .stat-item.bg-status-adopted-bg:hover {
        box-shadow: inset 0 0 0 1.5px rgba(79, 70, 229, 0.3), 0 0 24px rgba(79, 70, 229, 0.12);
    }
    .stat-item.bg-accent-soft:hover {
        box-shadow: inset 0 0 0 1.5px rgba(251, 191, 36, 0.4), 0 0 24px rgba(251, 191, 36, 0.15);
    }
`;
document.head.appendChild(style);

</script>


@endpush