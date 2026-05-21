<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Species;
use Illuminate\View\View;

class AnimalController extends Controller
{
    public function index(): View
    {
        $species = Species::withCount('animals')->get();

        $animals = Animal::with('species')
            ->where('status', 'available')
            ->when(request('species_id'), fn ($query, $speciesId) => $query->where('species_id', $speciesId))
            ->when(request('search'), fn ($query, $search) => $query->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('adopter.animals.index', compact('animals', 'species'));
    }

    public function show(Animal $animal): View
    {
        $animal->load(['species', 'medicalRecords']);

        return view('adopter.animals.show', compact('animal'));
    }
}
