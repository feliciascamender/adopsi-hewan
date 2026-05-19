<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Adoption;
use App\Models\User;
use App\Models\Species;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_animals'   => Animal::count(),
            'available'       => Animal::where('status', 'available')->count(),
            'pending_animals' => Animal::where('status', 'pending')->count(),
            'adopted'         => Animal::where('status', 'adopted')->count(),
            'pending_adoptions' => Adoption::where('status', 'pending')->count(),
            'approved'        => Adoption::where('status', 'approved')->count(),
            'rejected'        => Adoption::where('status', 'rejected')->count(),
            'total_adopters'  => User::where('role', 'adopter')->count(),
            'total_species'   => Species::count(),
        ];

        $latestAdoptions = Adoption::with(['user', 'animals.species'])
            ->latest()
            ->take(5)
            ->get();

        $latestAnimals = Animal::with('species')
            ->latest()
            ->take(4)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestAdoptions', 'latestAnimals'));
    }
}