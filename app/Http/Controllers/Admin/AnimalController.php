<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Species;

class AnimalController extends Controller
{
    /**
     * Tampilkan daftar hewan untuk adopter
     */
    public function index()
    {
        $species = Species::withCount('animals')->get();

        $animals = Animal::with('species')
            ->where('status', 'available')
            ->when(request('species_id'), function ($query, $speciesId) {
                $query->where('species_id', $speciesId);
            })
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(12);

        return view('adopter.animals.index', compact('animals', 'species'));
    }

    /**
     * Tampilkan detail satu hewan untuk adopter
     */
    public function show(Animal $animal)
    {
        $animal->load(['species', 'medicalRecords']);

        return view('adopter.animals.show', compact('animal'));
    }
}