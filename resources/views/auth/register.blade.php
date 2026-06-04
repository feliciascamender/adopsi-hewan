@extends('layouts.app')
 
@section('title', 'Daftar — PawHome Banjarmasin')
 
@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#E7D4FA] px-4 py-16">
 
    {{-- Wrapper: pt-[110px] bikin ruang di atas card untuk gambar nongol --}}
    <div class="w-full max-w-md relative pt-[110px]">
 
        {{-- ── Gambar hewan ── --}}
        <div class="absolute -top-[70px] left-1/2 -translate-x-1/2 w-[110%] z-20 pointer-events-none animate-animals">
            <img src="{{ asset('images/register.png') }}"
                 alt="Hewan PawHome"
                 class="w-full object-contain object-bottom opacity-95">
        </div>
 
        {{-- ── Card utama ── --}}
        <div class="relative z-10 bg-brand-primary rounded-3xl shadow-xl shadow-brand-primary/40 px-10 pt-8 pb-9">
 
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
                    Daftar ke PawHome 🐾
                </h1>
                <p class="text-white/50 text-sm mt-1">
                    Buat akun adopter gratis dan temukan sahabatmu.
                </p>
            </div>
 
            {{-- Error summary --}}
            @if ($errors->any())
                <div class="bg-white/10 border border-white/20 text-white text-sm px-4 py-3 rounded-2xl mb-5">
                    <p class="font-semibold mb-1">⚠️ Terdapat kesalahan:</p>
                    <ul class="list-disc list-inside space-y-0.5 text-xs text-white/80">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form method="POST" action="{{ route('register') }}" novalidate class="space-y-4">
                @csrf
 
                {{-- Nama Lengkap --}}
                <div>
                    <label for="name" class="block text-sm font-bold text-white/90 mb-1.5">
                        Nama Lengkap <span class="text-accent-base">*</span>
                    </label>
                    <input type="text"
                           id="name" name="name"
                           value="{{ old('name') }}"
                           placeholder="Nama sesuai KTP"
                           autocomplete="name" autofocus
                           class="w-full px-4 py-3 rounded-2xl border text-sm text-white transition-all
                                  placeholder-white/30 bg-white/10
                                  focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                  @error('name') border-red-400/60 @else border-white/20 @enderror">
                    @error('name')
                        <p class="text-red-300 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-bold text-white/90 mb-1.5">
                        Alamat Email <span class="text-accent-base">*</span>
                    </label>
                    <input type="email"
                           id="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="contoh@email.com"
                           autocomplete="email"
                           class="w-full px-4 py-3 rounded-2xl border text-sm text-white transition-all
                                  placeholder-white/30 bg-white/10
                                  focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                  @error('email') border-red-400/60 @else border-white/20 @enderror">
                    @error('email')
                        <p class="text-red-300 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
 
                {{-- No. HP --}}
                <div>
                    <label for="phone" class="block text-sm font-bold text-white/90 mb-1.5">
                        Nomor HP
                        <span class="text-white/40 font-normal text-xs">(opsional)</span>
                    </label>
                    <input type="text"
                           id="phone" name="phone"
                           value="{{ old('phone') }}"
                           placeholder="08xxxxxxxxxx"
                           autocomplete="tel"
                           class="w-full px-4 py-3 rounded-2xl border border-white/20 bg-white/10
                                  text-white placeholder-white/30 text-sm transition-all
                                  focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent">
                    @error('phone')
                        <p class="text-red-300 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Alamat --}}
                <div>
                    <label for="address" class="block text-sm font-bold text-white/90 mb-1.5">
                        Alamat Tempat Tinggal
                        <span class="text-white/40 font-normal text-xs">(opsional)</span>
                    </label>
                    <textarea id="address" name="address" rows="2"
                              placeholder="Jl. ..."
                              class="w-full px-4 py-3 rounded-2xl border border-white/20 bg-white/10
                                     text-white placeholder-white/30 text-sm transition-all
                                     focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                     resize-none">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-red-300 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-bold text-white/90 mb-1.5">
                        Password <span class="text-accent-base">*</span>
                    </label>
                    <div class="relative">
                        <input type="password"
                               id="password" name="password"
                               placeholder="Minimal 8 karakter"
                               autocomplete="new-password"
                               class="w-full px-4 py-3 pr-12 rounded-2xl border border-white/20 bg-white/10
                                      text-white placeholder-white/30 text-sm transition-all
                                      focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                      @error('password') border-red-400/60 @enderror">
                        <button type="button" id="togglePassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 transition-colors">
                            <img src="{{ asset('images/passcat1.png') }}"
                                 alt="Toggle password"
                                 class="w-9 h-9 object-contain opacity-50 hover:opacity-100 transition-opacity">
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-300 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-white/90 mb-1.5">
                        Konfirmasi Password <span class="text-accent-base">*</span>
                    </label>
                    <input type="password"
                           id="password_confirmation" name="password_confirmation"
                           placeholder="Ulangi password"
                           autocomplete="new-password"
                           class="w-full px-4 py-3 rounded-2xl border border-white/20 bg-white/10
                                  text-white placeholder-white/30 text-sm transition-all
                                  focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent">
                </div>
 
                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit"
                            class="w-full bg-accent-base hover:bg-accent-strong text-surface-dark
                                   font-bold py-3 rounded-2xl text-sm transition-all duration-200
                                   hover:-translate-y-0.5 shadow-lg shadow-black/20">
                        Buat Akun Adopter →
                    </button>
                </div>
 
            </form>
 
            {{-- Divider --}}
            <div class="relative my-5">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-white/15"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-brand-primary px-3 text-xs text-white/40">Sudah punya akun?</span>
                </div>
            </div>
 
            {{-- Login link --}}
            <a href="{{ route('login') }}"
               class="block w-full text-center border-2 border-white/30 text-white/70
                      font-bold py-2.5 rounded-2xl text-sm transition-all duration-200
                      hover:border-white hover:text-white hover:bg-white/10">
                Masuk ke Akun
            </a>
 
            <p class="text-center text-xs text-white/30 mt-4">
                Admin shelter? Gunakan akun admin yang telah diberikan.
            </p>
 
        </div>
    </div>
</div>
 
<style>
    @keyframes animalsSlideUp {
        0%   { opacity: 0; transform: translateX(-50%) translateY(40px); }
        100% { opacity: 1; transform: translateX(-50%) translateY(0); }
    }
    .animate-animals {
        animation: animalsSlideUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: 0.15s;
    }
</style>
 
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
 
    $('#password_confirmation').on('input', function () {
        const pass    = $('#password').val();
        const confirm = $(this).val();
        if (confirm.length === 0) {
            $(this).removeClass('border-green-400/60 border-red-400/60').addClass('border-white/20');
            return;
        }
        if (pass === confirm) {
            $(this).removeClass('border-red-400/60 border-white/20').addClass('border-green-400/60');
        } else {
            $(this).removeClass('border-green-400/60 border-white/20').addClass('border-red-400/60');
        }
    });
</script>
@endpush