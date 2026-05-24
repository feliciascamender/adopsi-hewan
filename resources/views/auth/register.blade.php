@extends('layouts.app')

@section('title', 'Daftar — PawHome Banjarmasin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-rose-50 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">

        {{-- Header --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 text-gray-400 hover:text-orange-600
                      text-sm transition-colors mb-6">
                ← Kembali ke Beranda
            </a>
            <div class="flex flex-col items-center">
                <span class="text-4xl mb-3">🐾</span>
                <h1 class="text-2xl font-bold text-gray-900">Daftar ke PawHome</h1>
                <p class="text-gray-400 text-sm mt-1">Buat akun adopter gratis sekarang</p>
            </div>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

            {{-- Error summary --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm
                            px-4 py-3 rounded-xl mb-5">
                    <p class="font-semibold mb-1">⚠️ Terdapat kesalahan pada formulir:</p>
                    <ul class="list-disc list-inside space-y-0.5 text-xs">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                {{-- Nama Lengkap --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Nama Lengkap <span class="text-orange-500">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Nama sesuai KTP"
                           autocomplete="name"
                           autofocus
                           class="w-full px-4 py-2.5 rounded-xl border text-sm transition-colors
                                  focus:outline-none focus:ring-2 focus:ring-[#F7931A] focus:border-transparent
                                  @error('name') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Alamat Email <span class="text-orange-500">*</span>
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="contoh@email.com"
                           autocomplete="email"
                           class="w-full px-4 py-2.5 rounded-xl border text-sm transition-colors
                                  focus:outline-none focus:ring-2 focus:ring-[#F7931A] focus:border-transparent
                                  @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>

                {{-- No. HP --}}
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Nomor HP
                        <span class="text-gray-400 font-normal text-xs">(opsional)</span>
                    </label>
                    <input type="text"
                           id="phone"
                           name="phone"
                           value="{{ old('phone') }}"
                           placeholder="08xxxxxxxxxx"
                           autocomplete="tel"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm transition-colors
                                  focus:outline-none focus:ring-2 focus:ring-[#F7931A] focus:border-transparent">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-4">
                    <label for="address" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Alamat Tempat Tinggal
                        <span class="text-gray-400 font-normal text-xs">(opsional)</span>
                    </label>
                    <textarea id="address"
                              name="address"
                              rows="2"
                              placeholder="Jl. ..."
                              class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm transition-colors
                                     focus:outline-none focus:ring-2 focus:ring-[#F7931A] focus:border-transparent
                                     resize-none">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Password <span class="text-orange-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="Minimal 8 karakter"
                               autocomplete="new-password"
                               class="w-full px-4 py-2.5 pr-10 rounded-xl border text-sm transition-colors
                                      focus:outline-none focus:ring-2 focus:ring-[#F7931A] focus:border-transparent
                                      @error('password') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                        <button type="button"
                                id="togglePassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400
                                       hover:text-gray-600 text-sm transition-colors">
                            👁️
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1.5">⚠️ {{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Konfirmasi Password <span class="text-orange-500">*</span>
                    </label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           placeholder="Ulangi password"
                           autocomplete="new-password"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm transition-colors
                                  focus:outline-none focus:ring-2 focus:ring-[#F7931A] focus:border-transparent">
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full bg-[#E76F2E] hover:bg-[#d95f20] active:bg-[#c7531a]
                               text-white font-semibold py-2.5 rounded-xl text-sm
                               transition-colors shadow-sm shadow-orange-200">
                    Buat Akun Adopter →
                </button>
            </form>

            {{-- Divider --}}
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-100"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-3 text-xs text-gray-400">Sudah punya akun?</span>
                </div>
            </div>

            {{-- Login link --}}
            <a href="{{ route('login') }}"
               class="block w-full text-center bg-gray-50 hover:bg-gray-100 text-gray-700
                      font-semibold py-2.5 rounded-xl text-sm transition-colors border border-gray-200">
                Masuk ke Akun
            </a>
        </div>

        {{-- Note --}}
        <p class="text-center text-xs text-gray-400 mt-6">
            Dengan mendaftar, kamu setuju untuk menggunakan platform ini
            sesuai dengan ketentuan shelter PawHome Banjarmasin.
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Toggle password visibility
    $('#togglePassword').on('click', function () {
        const input = $('#password');
        const isPassword = input.attr('type') === 'password';
        input.attr('type', isPassword ? 'text' : 'password');
        $(this).text(isPassword ? '🙈' : '👁️');
    });

    // Real-time password match indicator
    $('#password_confirmation').on('input', function () {
        const pass = $('#password').val();
        const confirm = $(this).val();
        if (confirm.length === 0) {
            $(this).removeClass('border-green-400 border-red-400').addClass('border-gray-200');
            return;
        }
        if (pass === confirm) {
            $(this).removeClass('border-red-400 border-gray-200').addClass('border-green-400');
        } else {
            $(this).removeClass('border-green-400 border-gray-200').addClass('border-red-400');
        }
    });
</script>
@endpush