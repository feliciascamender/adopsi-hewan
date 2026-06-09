@extends('layouts.guest')
 
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
                <div class="bg-status-rejected-bg border border-status-rejected-text/20 text-status-rejected-text text-sm px-4 py-3 rounded-2xl mb-4">
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
 {{-- Lupa Password --}}
<div>
    <button type="button" id="toggleForgot"
            class="text-xs text-white/40 hover:text-white/70 transition-colors duration-200 flex items-center gap-1">
        <span>Lupa password?</span>
        <svg id="forgotArrow" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    {{-- Dropdown info kontak --}}
    <div id="forgotInfo" class="hidden mt-3 bg-white/10 border border-white/15 rounded-2xl px-4 py-4 space-y-3">
        <p class="text-xs text-white/60 leading-relaxed">
            Hubungi admin PawHome untuk reset password kamu:
        </p>
        <a href="mailto:pawhomeadmin@gmail.com"
           class="flex items-center gap-3 bg-white/10 hover:bg-white/15 rounded-xl px-3 py-2.5 transition-colors duration-200">
            <div class="w-7 h-7 rounded-lg bg-accent-base/20 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-accent-base" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-white/40">Email</p>
                <p class="text-xs font-semibold text-white">pawhomeadmin@gmail.com</p>
            </div>
        </a>
        <a href="https://wa.me/6289529015125"
           target="_blank"
           class="flex items-center gap-3 bg-white/10 hover:bg-white/15 rounded-xl px-3 py-2.5 transition-colors duration-200">
            <div class="w-7 h-7 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.849L.057 23.55a.75.75 0 00.921.921l5.701-1.471A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.891 0-3.667-.502-5.198-1.381l-.374-.217-3.876.999 1.02-3.762-.237-.389A9.958 9.958 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-white/40">WhatsApp</p>
                <p class="text-xs font-semibold text-white">089529015125</p>
            </div>
        </a>
    </div>
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

    // Toggle lupa password
$('#toggleForgot').on('click', function () {
    $('#forgotInfo').toggleClass('hidden');
    $('#forgotArrow').toggleClass('rotate-180');
});
</script>
@endpush
 