<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Species;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::with('species')
            ->where('status', 'available')
            ->when(request('search'), fn($q) => $q->where('name', 'like', '%'.request('search').'%'))
            ->when(request('species_id'), fn($q) => $q->where('species_id', request('species_id')))
            ->when(request('gender'), fn($q) => $q->where('gender', request('gender')))
            ->when(request('age'), function($q) {
                return match(request('age')) {
                    'baby'   => $q->where('age_months', '<', 6),
                    'young'  => $q->whereBetween('age_months', [6, 12]),
                    'adult'  => $q->where('age_months', '>', 12),
                    default  => $q
                };
            })
            ->latest()
            ->paginate(12);

        $species = Species::all();

        return view('adopter.animals.index', compact('animals', 'species'));
    }

    public function show(Animal $animal)
    {
        return view('adopter.animals.show', compact('animal'));
    }
}