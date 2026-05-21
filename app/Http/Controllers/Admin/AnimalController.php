<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnimalController extends Controller
{

    public function index(): View
    {
        $animals = Animal::with('species')
            ->when(request('status'), fn ($query, $status) => $query->where('status', $status))
            ->when(request('species_id'), fn ($query, $speciesId) => $query->where('species_id', $speciesId))
            ->when(request('search'), fn ($query, $search) => $query->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $species = Species::orderBy('name')->get();

        return view('admin.animals.index', compact('animals', 'species'));
    }

    public function create(): View
    {
        $species = Species::orderBy('name')->get();

        return view('admin.animals.create', compact('species'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'species_id' => ['required', 'exists:species,id'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Jantan,Betina'],
            'age_months' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'in:available,pending,adopted'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('animals', 'public');
        }

        Animal::create($validated);

        return redirect()
            ->route('admin.animals.index')
            ->with('success', 'Data hewan berhasil ditambahkan.');
    }

    public function show(Animal $animal): View
    {
        $animal->load(['species', 'medicalRecords']);

        return view('admin.animals.show', compact('animal'));
    }

    public function edit(Animal $animal): View
    {
        $species = Species::orderBy('name')->get();

        return view('admin.animals.edit', compact('animal', 'species'));
    }

    public function update(Request $request, Animal $animal): RedirectResponse
    {
        $validated = $request->validate([
            'species_id' => ['required', 'exists:species,id'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Jantan,Betina'],
            'age_months' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'in:available,pending,adopted'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            if ($animal->photo) {
                Storage::disk('public')->delete($animal->photo);
            }

            $validated['photo'] = $request->file('photo')->store('animals', 'public');
        }

        $animal->update($validated);

        return redirect()
            ->route('admin.animals.index')
            ->with('success', 'Data hewan berhasil diperbarui.');
    }

    public function destroy(Animal $animal): RedirectResponse
    {
        if ($animal->photo) {
            Storage::disk('public')->delete($animal->photo);
        }

        $animal->delete();

        return redirect()
            ->route('admin.animals.index')
            ->with('success', 'Data hewan berhasil dihapus.');
    }
}
