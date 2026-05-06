<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Adoption;
use App\Models\User;
use App\Models\Species;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_animals' => Animal::count(),
            'available' => Animal::where('status', 'available')->count(),
            'pending_adoption' => Adoption::where('status', 'pending')->count(),
            'approved' => Adoption::where('status', 'approved')->count(),
            'total_adopters' => User::where('role', 'adopter')->count(),
            'total_species' => Species::count(),
        ];

        $recent_adoptions = Adoption::with('animals', 'user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_adoptions'));
    }
    //
}
