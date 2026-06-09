@extends('layouts.adopter')
 
@section('title', 'Ajukan Adopsi — PawHome')
 
@section('content')
 
{{-- Breadcrumb --}}
<div class="flex items-center gap-2 text-xs text-surface-muted mt-6 mb-6">
    <a href="{{ route('adopter.dashboard') }}" class="hover:text-brand-secondary transition-colors">Beranda</a>
    <span>/</span>
    <a href="{{ route('adopter.adoptions.index') }}" class="hover:text-brand-secondary transition-colors">Pengajuan Saya</a>
    <span>/</span>
    <span class="font-semibold text-surface-dark">Buat Pengajuan</span>
</div>
 
{{-- Page header --}}
<div class="mb-6">
    <div class="inline-flex items-center gap-1.5 bg-brand-soft text-brand-secondary text-xs font-semibold px-3 py-1.5 rounded-full border border-brand-light mb-3">
        📋 Form adopsi
    </div>
    <h1 class="font-brand font-black text-2xl text-surface-dark">Ajukan Adopsi</h1>
    <p class="text-sm text-surface-muted mt-1">Isi formulir dengan data yang benar dan lengkap.</p>
</div>
 
{{-- Layout 2 kolom --}}
<div class="grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-6 pb-10">
 
    {{-- ══════════════════════════════════════
         KIRI: FORM UTAMA
    ══════════════════════════════════════ --}}
    <form id="adoption-form"
          method="POST"
          action="{{ route('adopter.adoptions.store') }}"
          enctype="multipart/form-data"
          novalidate
          class="space-y-5">
        @csrf
 
        {{-- Error summary --}}
        @if($errors->any())
        <div class="flex items-start gap-3 bg-status-rejected-bg border border-status-rejected-text/30
                    rounded-2xl px-5 py-4">
            <span class="text-lg flex-shrink-0">⚠️</span>
            <div>
                <p class="text-sm font-bold text-status-rejected-text mb-1">Terdapat kesalahan pada formulir:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li class="text-xs text-status-rejected-text">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
 
        {{-- ── SECTION 1: Identitas Diri ── --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">👤</span>
                    <p class="text-sm font-bold text-surface-dark">Identitas Diri</p>
                </div>
                <p class="text-xs text-surface-muted mt-0.5 ml-6">Sesuai dengan KTP yang berlaku</p>
            </div>
            <div class="p-6 space-y-4">
 
                {{-- Nama lengkap --}}
                <div>
                    <label for="full_name" class="block text-xs font-bold text-surface-dark mb-1.5">
                        Nama Lengkap <span class="text-status-rejected-text">*</span>
                    </label>
                    <input type="text"
                           id="full_name" name="full_name"
                           value="{{ old('full_name', auth()->user()->name) }}"
                           placeholder="Nama sesuai KTP"
                           class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                                  bg-surface-alt placeholder-surface-muted transition-all
                                  focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                  @error('full_name') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror">
                    <p class="field-error text-xs text-status-rejected-text mt-1.5 hidden" id="err-full_name"></p>
                    @error('full_name')
                        <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Alamat KTP --}}
                <div>
                    <label for="ktp_address" class="block text-xs font-bold text-surface-dark mb-1.5">
                        Alamat Sesuai KTP <span class="text-status-rejected-text">*</span>
                    </label>
                    <textarea id="ktp_address" name="ktp_address"
                              rows="3"
                              placeholder="Jl. ..."
                              class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                                     bg-surface-alt placeholder-surface-muted transition-all resize-none
                                     focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                     @error('ktp_address') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror">{{ old('ktp_address', auth()->user()->address) }}</textarea>
                    <p class="field-error text-xs text-status-rejected-text mt-1.5 hidden" id="err-ktp_address"></p>
                    @error('ktp_address')
                        <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
 
            </div>
        </div>
 
        {{-- ── SECTION 2: Foto Rumah ── --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">🏠</span>
                    <p class="text-sm font-bold text-surface-dark">Foto Rumah / Ruangan</p>
                </div>
                <p class="text-xs text-surface-muted mt-0.5 ml-6">Foto tempat yang akan ditinggali hewan</p>
            </div>
            <div class="p-6">
 
                {{-- Upload area --}}
                <label for="house_photo"
                       id="upload-label"
                       class="flex flex-col items-center justify-center w-full h-44 border-2 border-dashed
                              border-surface-border rounded-2xl cursor-pointer
                              hover:border-brand-light hover:bg-brand-soft/30
                              transition-all duration-200 relative overflow-hidden"
                       @error('house_photo') style="border-color: var(--color-status-rejected-text);" @enderror>
 
                    {{-- Preview gambar --}}
                    <img id="photo-preview"
                         src=""
                         alt="Preview"
                         class="absolute inset-0 w-full h-full object-cover hidden rounded-2xl">
 
                    {{-- Placeholder --}}
                    <div id="upload-placeholder" class="flex flex-col items-center gap-2 text-center px-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-soft border border-brand-light flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-brand-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-surface-dark">Klik untuk upload foto</p>
                            <p class="text-xs text-surface-muted mt-0.5">PNG, JPG, JPEG — maks. 2MB</p>
                        </div>
                    </div>
 
                    <input type="file"
                           id="house_photo" name="house_photo"
                           accept="image/*"
                           class="sr-only">
                </label>
 
                <p class="field-error text-xs text-status-rejected-text mt-2 hidden" id="err-house_photo"></p>
                @error('house_photo')
                    <p class="text-xs text-status-rejected-text mt-2">{{ $message }}</p>
                @enderror
 
                {{-- Tombol ganti foto (muncul setelah ada preview) --}}
                <button type="button" id="change-photo"
                        class="hidden mt-3 text-xs font-semibold text-surface-muted hover:text-status-rejected-text transition-colors">
                    × Ganti foto
                </button>
 
            </div>
        </div>
 
        {{-- ── SECTION 3: Pilih Hewan ── --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">🐾</span>
                    <p class="text-sm font-bold text-surface-dark">Pilih Hewan</p>
                </div>
                <p class="text-xs text-surface-muted mt-0.5 ml-6">Pilih satu atau lebih hewan yang ingin diadopsi</p>
            </div>
            <div class="p-6">
 
                @if($availableAnimals->isEmpty())
                <div class="text-center py-8">
                    <span class="text-3xl">🐾</span>
                    <p class="text-sm text-surface-muted mt-2">Tidak ada hewan tersedia saat ini.</p>
                </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($availableAnimals as $animal)
                    <label class="animal-card flex items-center gap-3 border border-surface-border rounded-xl p-3.5
                                  cursor-pointer transition-all duration-200
                                  hover:border-brand-light hover:bg-brand-soft/40
                                  has-[:checked]:border-brand-primary has-[:checked]:bg-brand-soft">
 
                        <input type="checkbox"
                               name="animal_ids[]"
                               value="{{ $animal->id }}"
                               @checked(in_array($animal->id, old('animal_ids', [])))
                               class="w-4 h-4 rounded accent-brand-primary flex-shrink-0">
 
                        {{-- Foto mini --}}
                        <div class="w-10 h-10 rounded-lg bg-brand-soft flex items-center justify-center flex-shrink-0 overflow-hidden border border-surface-border">
                            @if($animal->photo)
                                <img src="{{ asset('storage/' . $animal->photo) }}"
                                     alt="{{ $animal->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <span class="text-lg">
                                    @switch($animal->species?->name)
                                        @case('Kucing') 🐱 @break
                                        @case('Anjing') 🐶 @break
                                        @case('Kelinci') 🐰 @break
                                        @default 🐾
                                    @endswitch
                                </span>
                            @endif
                        </div>
 
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-surface-dark truncate">{{ $animal->name }}</p>
                            <p class="text-xs text-surface-muted">
                                {{ $animal->species?->name }} · {{ $animal->age_months }} bln · {{ $animal->gender }}
                            </p>
                        </div>
 
                    </label>
                    @endforeach
                </div>
                @endif
 
                <p class="field-error text-xs text-status-rejected-text mt-3 hidden" id="err-animal_ids"></p>
                @error('animal_ids')
                    <p class="text-xs text-status-rejected-text mt-3">{{ $message }}</p>
                @enderror
 
            </div>
        </div>
 
        {{-- ── SECTION 4: Alasan Adopsi ── --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-surface-border bg-surface-alt/50">
                <div class="flex items-center gap-2">
                    <span class="text-base">💬</span>
                    <p class="text-sm font-bold text-surface-dark">Alasan Adopsi</p>
                </div>
                <p class="text-xs text-surface-muted mt-0.5 ml-6">Ceritakan kenapa kamu ingin mengadopsi</p>
            </div>
            <div class="p-6">
                <textarea id="reason" name="reason"
                          rows="5"
                          placeholder="Contoh: Saya ingin mengadopsi karena... (minimal 50 karakter)"
                          class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                                 bg-surface-alt placeholder-surface-muted transition-all resize-none
                                 focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                                 @error('reason') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror">{{ old('reason') }}</textarea>
 
                {{-- Counter karakter --}}
                <div class="flex items-center justify-between mt-1.5">
                    <p class="field-error text-xs text-status-rejected-text hidden" id="err-reason"></p>
                    <p class="text-xs text-surface-muted ml-auto">
                        <span id="reason-count">0</span> karakter
                        <span class="text-surface-muted">(min. 50)</span>
                    </p>
                </div>
 
                @error('reason')
                    <p class="text-xs text-status-rejected-text mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
 
        {{-- Submit --}}
        <div class="flex items-center gap-3 pt-2">
            <button type="submit" id="submit-btn"
                    class="inline-flex items-center gap-2 bg-brand-primary hover:bg-brand-secondary
                           text-white font-bold text-sm px-8 py-3.5 rounded-xl
                           hover:-translate-y-0.5 transition-all duration-200
                           shadow-lg shadow-brand-primary/25 disabled:opacity-50 disabled:cursor-not-allowed">
                <span id="submit-text">Kirim Pengajuan →</span>
                <span id="submit-spinner" class="hidden">
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>
                </span>
            </button>
            <a href="{{ route('adopter.adoptions.index') }}"
               class="text-sm font-semibold text-surface-muted hover:text-surface-dark transition-colors">
                Batal
            </a>
        </div>
 
    </form>
 
    {{-- ══════════════════════════════════════
         KANAN: Info & Tips
    ══════════════════════════════════════ --}}
    <div class="space-y-4">
 
        {{-- Tips card --}}
        <div class="bg-brand-primary rounded-2xl p-5 sticky top-20">
            <p class="text-sm font-bold text-white mb-4">💡 Tips Pengajuan</p>
            <div class="space-y-3">
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-accent-base/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-xs font-bold text-accent-base">1</span>
                    </div>
                    <p class="text-xs text-white/60 leading-relaxed">Pastikan nama dan alamat sesuai dengan KTP yang masih berlaku.</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-accent-base/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-xs font-bold text-accent-base">2</span>
                    </div>
                    <p class="text-xs text-white/60 leading-relaxed">Upload foto ruangan yang bersih dan cukup luas untuk hewan.</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 rounded-full bg-accent-base/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-xs font-bold text-accent-base">3</span>
                    </div>
                    <p class="text-xs text-white/60 leading-relaxed">Tulis alasan adopsi dengan jujur dan detail agar lebih mudah disetujui.</p>
                </div>
            </div>
 
            <div class="mt-5 border-t border-white/10 pt-4">
                <p class="text-xs text-white/40 leading-relaxed">
                    Pengajuan akan ditinjau oleh tim shelter dalam 1-3 hari kerja.
                </p>
            </div>
        </div>
 
        {{-- Proses review --}}
        <div class="bg-surface-white border border-surface-border rounded-2xl p-5">
            <p class="text-xs font-bold text-surface-dark mb-3"><i class="fa-solid fa-inbox" style="color: #debd5b;"></i> Setelah Submit</p>
            <div class="space-y-2.5">
                <div class="flex items-center gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-status-pending-bg text-status-pending-text text-[10px] font-bold flex items-center justify-center flex-shrink-0">1</span>
                    <p class="text-xs text-surface-muted">Pengajuan masuk status <span class="font-semibold text-status-pending-text">Pending</span></p>
                </div>
                <div class="flex items-center gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-brand-soft text-brand-secondary text-[10px] font-bold flex items-center justify-center flex-shrink-0">2</span>
                    <p class="text-xs text-surface-muted">Admin shelter meninjau pengajuanmu</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-status-available-bg text-status-available-text text-[10px] font-bold flex items-center justify-center flex-shrink-0">3</span>
                    <p class="text-xs text-surface-muted">Notifikasi <span class="font-semibold text-status-available-text">Disetujui</span> atau <span class="font-semibold text-status-rejected-text">Ditolak</span></p>
                </div>
            </div>
        </div>
 
    </div>
 
</div>
 
@endsection
 
@push('scripts')
<script>
$(document).ready(function () {
 
    // ── Preview foto rumah ──────────────────────────────
    $('#house_photo').on('change', function () {
        const file = this.files[0];
        if (!file) return;
 
        // Validasi ukuran (maks 2MB)
        if (file.size > 2 * 1024 * 1024) {
            showError('house_photo', 'Ukuran foto maksimal 2MB.');
            $(this).val('');
            return;
        }
 
        clearError('house_photo');
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#photo-preview').attr('src', e.target.result).removeClass('hidden');
            $('#upload-placeholder').addClass('hidden');
            $('#change-photo').removeClass('hidden');
        };
        reader.readAsDataURL(file);
    });
 
    // Tombol ganti foto
    $('#change-photo').on('click', function () {
        $('#house_photo').val('');
        $('#photo-preview').addClass('hidden').attr('src', '');
        $('#upload-placeholder').removeClass('hidden');
        $(this).addClass('hidden');
    });
 
    // ── Counter karakter alasan ─────────────────────────
    $('#reason').on('input', function () {
        const len = $(this).val().length;
        $('#reason-count').text(len);
        if (len >= 50) {
            $('#reason-count').removeClass('text-status-rejected-text').addClass('text-status-available-text');
            clearError('reason');
        } else {
            $('#reason-count').removeClass('text-status-available-text').addClass('text-status-rejected-text');
        }
    });
 
    // Trigger counter saat load (kalau ada old value)
    $('#reason').trigger('input');
 
    // ── Validasi sebelum submit ─────────────────────────
    $('#adoption-form').on('submit', function (e) {
        let valid = true;
 
        // Nama lengkap
        const name = $('#full_name').val().trim();
        if (name.length < 3) {
            showError('full_name', 'Nama lengkap minimal 3 karakter.');
            valid = false;
        } else {
            clearError('full_name');
        }
 
        // Alamat KTP
        const address = $('#ktp_address').val().trim();
        if (address.length < 10) {
            showError('ktp_address', 'Alamat KTP minimal 10 karakter.');
            valid = false;
        } else {
            clearError('ktp_address');
        }
 
        // Foto rumah
        if ($('#house_photo')[0].files.length === 0) {
            showError('house_photo', 'Foto rumah wajib diupload.');
            valid = false;
        } else {
            clearError('house_photo');
        }
 
        // Pilih hewan
        if ($('input[name="animal_ids[]"]:checked').length === 0) {
            showError('animal_ids', 'Pilih minimal satu hewan untuk diadopsi.');
            valid = false;
        } else {
            clearError('animal_ids');
        }
 
        // Alasan
        const reason = $('#reason').val().trim();
        if (reason.length < 50) {
            showError('reason', 'Alasan adopsi minimal 50 karakter.');
            valid = false;
        } else {
            clearError('reason');
        }
 
        if (!valid) {
            e.preventDefault();
            // Scroll ke error pertama
            $('html, body').animate({
                scrollTop: $('.field-error:not(.hidden)').first().offset().top - 120
            }, 400);
            return;
        }
 
        // Loading state
        $('#submit-btn').prop('disabled', true);
        $('#submit-text').text('Mengirim...');
        $('#submit-spinner').removeClass('hidden');
    });
 
    // ── Helpers ─────────────────────────────────────────
    function showError(field, msg) {
        $('#err-' + field).text(msg).removeClass('hidden');
        if (field !== 'animal_ids' && field !== 'house_photo') {
            $('#' + field).addClass('border-status-rejected-text bg-status-rejected-bg');
        }
    }
 
    function clearError(field) {
        $('#err-' + field).addClass('hidden').text('');
        if (field !== 'animal_ids' && field !== 'house_photo') {
            $('#' + field).removeClass('border-status-rejected-text bg-status-rejected-bg')
                          .addClass('border-surface-border');
        }
    }
 
    // Clear error saat user mulai ngetik
    $('#full_name, #ktp_address, #reason').on('input', function () {
        const field = $(this).attr('id');
        clearError(field);
    });
 
});
</script>
@endpush