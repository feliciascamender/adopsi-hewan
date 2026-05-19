<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Adoption;

class DashboardController extends Controller
{
    public function index()
    {
        $availableAnimals = Animal::with('species')
            ->where('status', 'available')
            ->latest()->take(4)->get();

        $myAdoptions = Adoption::with('animals.species')
            ->where('user_id', auth()->id())
            ->latest()->take(3)->get();

        return view('adopter.dashboard', compact('availableAnimals', 'myAdoptions'));
    }
}