<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div><label class="form-label">Nama</label><input name="name" value="{{ old('name', $animal?->name) }}" class="form-input" required>@error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror</div>
    
    <div><label class="form-label">Spesies</label><select name="species_id" class="form-input" required><option value="">Pilih spesies</option>@foreach($species as $item)<option value="{{ $item->id }}" @selected(old('species_id', $animal?->species_id) == $item->id)>{{ $item->name }}</option>@endforeach</select>@error('species_id')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror</div>
    
    <div><label class="form-label">Gender</label><select name="gender" class="form-input" required>@foreach(['Jantan','Betina'] as $gender)<option value="{{ $gender }}" @selected(old('gender', $animal?->gender) === $gender)>{{ $gender }}</option>@endforeach</select>@error('gender')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror</div>
    
    <div><label class="form-label">Usia (bulan)</label><input type="number" min="0" name="age_months" value="{{ old('age_months', $animal?->age_months ?? 0) }}" class="form-input" required>@error('age_months')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror</div>
    
    <div><label class="form-label">Status</label><select name="status" class="form-input" required>@foreach(['available','pending','adopted'] as $status)<option value="{{ $status }}" @selected(old('status', $animal?->status ?? 'available') === $status)>{{ ucfirst($status) }}</option>@endforeach</select>@error('status')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror</div>
    
    <div>
        <label class="form-label">Foto</label>
        <input type="file" name="photo" class="form-input">
        @error('photo')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        
        @if($animal?->photo)
            <div class="mt-3">
                <p class="text-sm text-gray-500 mb-1">Foto saat ini:</p>
                <img src="{{ asset('storage/' . $animal->photo) }}" class="h-24 w-24 object-cover rounded border">
            </div>
        @endif
    </div>
</div>

<div class="mt-4">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-input" rows="4">{{ old('description', $animal?->description) }}</textarea>
    @error('description')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
</div>