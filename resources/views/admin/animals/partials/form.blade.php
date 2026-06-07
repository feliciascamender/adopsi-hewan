<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
 
    {{-- Nama --}}
    <div>
        <label class="block text-xs font-bold text-surface-dark mb-1.5">
            Nama Hewan <span class="text-status-rejected-text">*</span>
        </label>
        <input type="text"
               name="name"
               value="{{ old('name', $animal?->name) }}"
               placeholder="Contoh: Luna"
               class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                      bg-surface-alt placeholder-surface-muted transition-all
                      focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                      @error('name') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror"
               required>
        @error('name')
            <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
        @enderror
    </div>
 
    {{-- Spesies --}}
    <div>
        <label class="block text-xs font-bold text-surface-dark mb-1.5">
            Spesies <span class="text-status-rejected-text">*</span>
        </label>
        <select name="species_id"
                class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                       bg-surface-alt transition-all
                       focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                       @error('species_id') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror"
                required>
            <option value="">Pilih spesies</option>
            @foreach($species as $item)
                <option value="{{ $item->id }}" @selected(old('species_id', $animal?->species_id) == $item->id)>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        @error('species_id')
            <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
        @enderror
    </div>
 
    {{-- Gender --}}
    <div>
        <label class="block text-xs font-bold text-surface-dark mb-1.5">
            Gender <span class="text-status-rejected-text">*</span>
        </label>
        <select name="gender"
                class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                       bg-surface-alt transition-all
                       focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                       @error('gender') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror"
                required>
            @foreach(['Jantan', 'Betina'] as $gender)
                <option value="{{ $gender }}" @selected(old('gender', $animal?->gender) === $gender)>
                    {{ $gender }}
                </option>
            @endforeach
        </select>
        @error('gender')
            <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
        @enderror
    </div>
 
    {{-- Usia --}}
    <div>
        <label class="block text-xs font-bold text-surface-dark mb-1.5">
            Usia <span class="text-status-rejected-text">*</span>
            <span class="text-surface-muted font-normal">(dalam bulan)</span>
        </label>
        <input type="number"
               name="age_months"
               min="0"
               value="{{ old('age_months', $animal?->age_months ?? 0) }}"
               placeholder="Contoh: 6"
               class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                      bg-surface-alt placeholder-surface-muted transition-all
                      focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                      @error('age_months') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror"
               required>
        @error('age_months')
            <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
        @enderror
    </div>
 
    {{-- Status --}}
    <div>
        <label class="block text-xs font-bold text-surface-dark mb-1.5">
            Status <span class="text-status-rejected-text">*</span>
        </label>
        <select name="status"
                class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                       bg-surface-alt transition-all
                       focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                       @error('status') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror"
                required>
            <option value="available" @selected(old('status', $animal?->status ?? 'available') === 'available')>Tersedia</option>
            <option value="pending"   @selected(old('status', $animal?->status ?? 'available') === 'pending')>Pending</option>
            <option value="adopted"   @selected(old('status', $animal?->status ?? 'available') === 'adopted')>Diadopsi</option>
        </select>
        @error('status')
            <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
        @enderror
    </div>
 
    {{-- Foto --}}
    <div>
        <label class="block text-xs font-bold text-surface-dark mb-1.5">
            Foto
            <span class="text-surface-muted font-normal">(JPG, PNG — maks. 2MB)</span>
        </label>
 
        @if($animal?->photo)
        {{-- Preview foto existing --}}
        <div class="flex items-center gap-4 mb-3 p-3 bg-surface-alt rounded-xl border border-surface-border">
            <img src="{{ asset('storage/' . $animal->photo) }}"
                 alt="Foto saat ini"
                 class="w-14 h-14 object-cover rounded-xl border border-surface-border flex-shrink-0">
            <div>
                <p class="text-xs font-semibold text-surface-dark">Foto saat ini</p>
                <p class="text-xs text-surface-muted mt-0.5">Upload foto baru untuk mengganti</p>
            </div>
        </div>
        @endif
 
        <input type="file"
               name="photo"
               accept="image/*"
               class="w-full px-4 py-3 rounded-xl border border-surface-border bg-surface-alt
                      text-sm text-surface-dark transition-all
                      focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                      file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0
                      file:text-xs file:font-bold file:bg-brand-soft file:text-brand-secondary
                      hover:file:bg-brand-primary hover:file:text-white file:transition-colors
                      @error('photo') border-status-rejected-text @enderror">
        @error('photo')
            <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
        @enderror
    </div>
 
</div>
 
{{-- Deskripsi --}}
<div class="mt-4">
    <label class="block text-xs font-bold text-surface-dark mb-1.5">Deskripsi</label>
    <textarea name="description"
              rows="4"
              placeholder="Ceritakan tentang hewan ini..."
              class="w-full px-4 py-3 rounded-xl border text-sm text-surface-dark
                     bg-surface-alt placeholder-surface-muted transition-all resize-none
                     focus:outline-none focus:ring-2 focus:ring-brand-light focus:border-transparent
                     @error('description') border-status-rejected-text bg-status-rejected-bg @else border-surface-border @enderror">{{ old('description', $animal?->description) }}</textarea>
    @error('description')
        <p class="text-xs text-status-rejected-text mt-1.5">{{ $message }}</p>
    @enderror
</div>