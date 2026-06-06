@extends('layouts.app')
 
@section('title', 'Masuk — PawHome Banjarmasin')
 
@section('content')
<div class="min-h-screen flex bg-[#E7D4FA]">

 {{-- Logo pattern background --}}
<div class="absolute inset-0 z-0 pointer-events-none"
     style="background-image: url('/images/pawbgungu.png'); 
            background-repeat: repeat; 
            background-size:270px; 
            background-position: 50px 50px;
            opacity: 0.02;">
</div>
 
    {{-- ── KIRI: Form ── --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center pl-8 pr-2 py-12">
        <div class="w-full max-w-[535px] bg-brand-primary rounded-3xl shadow-xl shadow-brand-primary/40 px-10 py-9">
 
            {{-- Logo + Brand --}}
            <a href="{{ route('home') }}" class="group flex items-center gap-3 mb-6 w-fit">
                <img src="{{ asset('images/logoPurple.png') }}"
                     alt="PawHome Logo"
                     class="h-8 w-auto object-contain brightness-0 invert
                            group-hover:brightness-100 group-hover:invert-0
                            transition-all duration-300">
                <span class="font-brand font-extrabold text-xl text-white
                             group-hover:text-brand-light transition-colors duration-300">PawHome</span>
            </a>
 
            {{-- Heading --}}
            <div class="mb-6">
                <h1 class="font-brand text-2xl font-black text-white leading-tight">
                    Selamat Datang Kembali! 👋
                </h1>
                <p class="text-white/50 text-sm mt-1">
                    Masuk untuk mulai proses adopsi hewan pilihanmu.
                </p>
            </div>
 
            {{-- Error --}}
            @if ($errors->any())
                <div class="bg-white/10 border border-white/20 text-white text-sm px-4 py-3 rounded-2xl mb-4">
                    {{ $errors->first() }}
                </div>
            @endif
 
            <form method="POST" action="{{ route('login') }}" novalidate class="space-y-4">
                @csrf
 
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-bold text-white/90 mb-1.5">
                        Alamat Email
                    </label>
                    <input type="email"
                           id="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="contoh@email.com"
                           autocomplete="email" autofocus
                           class="w-full px-4 py-3 rounded-2xl border text-sm text-white transition-all
                                  placeholder-white/30 bg-white/10
                                  focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                  @error('email') border-red-400/60 @else border-white/20 @enderror">
                    @error('email')
                        <p class="text-red-300 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Password + Tombol Masuk sejajar --}}
                <div>
                    <label for="password" class="block text-sm font-bold text-white/90 mb-1.5">
                        Password
                    </label>
                    <div class="flex gap-2">
                        <div class="relative flex-1">
                            <input type="password"
                                   id="password" name="password"
                                   placeholder="••••••••"
                                   autocomplete="current-password"
                                   class="w-full px-4 py-3 pr-10 rounded-2xl border border-white/20 bg-white/10
                                          text-white placeholder-white/30 text-sm transition-all
                                          focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent">
                            <button type="button" id="togglePassword"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 transition-colors">
                                <img src="{{ asset('images/passcat1.png') }}"
                                     alt="Toggle password"
                                     class="w-9 h-9 object-contain opacity-50 hover:opacity-100 transition-opacity">
                            </button>
                        </div>
                        {{-- Amber supaya pop di atas ungu gelap --}}
                        <button type="submit"
                                class="bg-accent-base hover:bg-accent-strong text-surface-dark font-bold px-5 rounded-2xl text-sm
                                       transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-black/20 whitespace-nowrap">
                            Masuk →
                        </button>
                    </div>
                </div>
 
                {{-- Remember --}}
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember"
                           class="w-4 h-4 rounded-lg border-white/30 accent-accent-base cursor-pointer">
                    <label for="remember" class="text-sm text-white/60 cursor-pointer">Ingat saya</label>
                </div>
 
            </form>
 
            {{-- Divider --}}
            <div class="relative my-5">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-white/15"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-brand-primary px-3 text-xs text-white/40">Belum punya akun?</span>
                </div>
            </div>
 
            {{-- Register --}}
            <a href="{{ route('register') }}"
               class="block w-full text-center border-2 border-white/30 text-white/70
                      font-bold py-2.5 rounded-2xl text-sm transition-all duration-200
                      hover:border-white hover:text-white hover:bg-white/10">
                Daftar sebagai Adopter
            </a>
 
            <p class="text-center text-xs text-white/30 mt-4">
                Admin shelter? Gunakan akun admin yang telah diberikan.
            </p>
 
        </div>
    </div>
 
    {{-- ── KANAN: Visual ── --}}
    <div class="hidden lg:block w-1/2 relative overflow-hidden">
 
        <img src="{{ asset('images/CatLogin.png') }}"
             alt="Hewan PawHome"
             class="absolute inset-0 w-full h-full object-contain object-center py-16 scale-110">
 
        {{-- Say meow bubble --}}
        <div class="absolute top-8 right-20 z-20">
            <div class="bg-brand-primary text-white font-bold px-5 py-3 rounded-full shadow-xl
                        animate-bounce" style="animation-duration: 2s;">
                Say meow! 🐱
            </div>
        </div>
 
    </div>
 
</div>
@endsection
 
@push('scripts')
<script>
    $('#togglePassword').on('click', function () {
        const input = $('#password');
        const isPassword = input.attr('type') === 'password';
        input.attr('type', isPassword ? 'text' : 'password');
        $(this).find('img').attr('src', isPassword
            ? '{{ asset("images/passcat2.png") }}'
            : '{{ asset("images/passcat1.png") }}'
        );
    });
</script>
@endpush
 