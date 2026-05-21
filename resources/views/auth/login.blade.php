@extends('layouts.app')

@section('title', 'Masuk — PawHome Banjarmasin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-rose-50 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">

        {{-- Back to home --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 text-gray-400 hover:text-pink-600
                      text-sm transition-colors mb-6">
                ← Kembali ke Beranda
            </a>
            <div class="flex flex-col items-center">
                <span class="text-4xl mb-3">🐾</span>
                <h1 class="text-2xl font-bold text-gray-900">Masuk ke PawHome</h1>
                <p class="text-gray-400 text-sm mt-1">Selamat datang kembali!</p>
            </div>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

            {{-- Error umum --}}
            @if ($errors->any() && !$errors->has('email'))
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm
                            px-4 py-3 rounded-xl mb-5">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Alamat Email
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="contoh@email.com"
                           autocomplete="email"
                           autofocus
                           class="w-full px-4 py-2.5 rounded-xl border text-sm transition-colors
                                  focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent
                                  @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <span>⚠️</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="••••••••"
                               autocomplete="current-password"
                               class="w-full px-4 py-2.5 pr-10 rounded-xl border border-gray-200 text-sm transition-colors
                                      focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                        {{-- Toggle password visibility --}}
                        <button type="button"
                                id="togglePassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400
                                       hover:text-gray-600 text-sm transition-colors">
                            👁️
                        </button>
                    </div>
                </div>

                {{-- Remember me --}}
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox"
                               name="remember"
                               class="w-4 h-4 rounded border-gray-300 text-pink-600
                                      focus:ring-pink-500 cursor-pointer">
                        <span class="text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full bg-pink-600 hover:bg-pink-700 active:bg-pink-800
                               text-white font-semibold py-2.5 rounded-xl text-sm
                               transition-colors shadow-sm shadow-pink-200">
                    Masuk →
                </button>
            </form>

            {{-- Divider --}}
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-100"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-3 text-xs text-gray-400">Belum punya akun?</span>
                </div>
            </div>

            {{-- Register link --}}
            <a href="{{ route('register') }}"
               class="block w-full text-center bg-gray-50 hover:bg-gray-100 text-gray-700
                      font-semibold py-2.5 rounded-xl text-sm transition-colors border border-gray-200">
                Daftar sebagai Adopter
            </a>
        </div>

        {{-- Admin note --}}
        <p class="text-center text-xs text-gray-400 mt-6">
            Admin shelter? Gunakan akun admin yang telah diberikan.
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
</script>
@endpush