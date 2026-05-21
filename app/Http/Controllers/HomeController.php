<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_animals' => Animal::count(),
            'available' => Animal::where('status', 'available')->count(),
            'adopted' => Animal::where('status', 'adopted')->count(),
            'total_adoptions' => Adoption::where('status', 'approved')->count(),
        ];

        $latestAnimals = Animal::with('species')
            ->where('status', 'available')
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('stats', 'latestAnimals'));
    }

    public function animals(): string
    {
        return 'Halaman Daftar Hewan';
    }

    public function show(Animal $animal): string
    {
        return 'Detail Hewan ID: ' . $animal->id;
    }
}
