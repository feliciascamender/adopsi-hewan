<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpeciesController extends Controller
{
    public function index(): View
    {
        $species = Species::withCount('animals')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.species.index', compact('species'));
    }

    public function create(): View
    {
        return view('admin.species.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:species,name'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        Species::create($validated);

        return redirect()
            ->route('admin.species.index')
            ->with('success', 'Data spesies berhasil ditambahkan.');
    }

    public function show(Species $species): View
    {
        $species->load('animals');

        return view('admin.species.show', compact('species'));
    }

    public function edit(Species $species): View
    {
        return view('admin.species.edit', compact('species'));
    }

    public function update(Request $request, Species $species): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:species,name,' . $species->id],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $species->update($validated);

        return redirect()
            ->route('admin.species.index')
            ->with('success', 'Data spesies berhasil diperbarui.');
    }

    public function destroy(Species $species): RedirectResponse
    {
        if ($species->animals()->exists()) {
            return back()->with('error', 'Spesies tidak dapat dihapus karena masih memiliki data hewan.');
        }

        $species->delete();

        return redirect()
            ->route('admin.species.index')
            ->with('success', 'Data spesies berhasil dihapus.');
    }
}
