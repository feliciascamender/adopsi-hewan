<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Adoption;
use App\Models\User;

class Dashboard extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $my_adoptions = Adoption::with('animals')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

            $available_animals = Animal::with('species')
            ->where('status', 'available')
            ->latest()
            ->take(6)
            ->get();

            $stats = [
                'total_pengajuan' => Adoption::where('user_id', $user->id)->count(),
                'pending' => Adoption::where('user_id', $user->id)->where('status', 'pending')->count(),
                'approved' => Adoption::where('user_id', $user->id)->where('status', 'approved')->count(),
            ];

        return view('adopter.dashboard', compact('my_adoptions', 'available_animals', 'stats'));
    }

}
