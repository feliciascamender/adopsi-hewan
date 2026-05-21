<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdoptionController extends Controller
{

    public function index(): View
    {
        $adoptions = Adoption::with(['user', 'animals.species'])
            ->when(request('status'), fn ($query, $status) => $query->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.adoptions.index', compact('adoptions'));
    }

    public function show(Adoption $adoption): View
    {
        $adoption->load(['user', 'animals.species']);

        return view('admin.adoptions.show', compact('adoption'));
    }

    public function approve(Request $request, Adoption $adoption): RedirectResponse
    {
        $validated = $request->validate([
            'admin_note' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($adoption->status !== 'pending') {
            return back()->with('error', 'Pengajuan ini sudah diproses sebelumnya.');
        }

        DB::transaction(function () use ($adoption, $validated) {
            $adoption->update([
                'status' => 'approved',
                'admin_note' => $validated['admin_note'] ?? null,
            ]);

            Animal::whereIn('id', $adoption->animals()->pluck('animals.id'))
                ->update(['status' => 'adopted']);
        });

        return redirect()
            ->route('admin.adoptions.index')
            ->with('success', 'Pengajuan adopsi berhasil disetujui.');
    }

    public function reject(Request $request, Adoption $adoption): RedirectResponse
    {
        $validated = $request->validate([
            'admin_note' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($adoption->status !== 'pending') {
            return back()->with('error', 'Pengajuan ini sudah diproses sebelumnya.');
        }

        DB::transaction(function () use ($adoption, $validated) {
            $adoption->update([
                'status' => 'rejected',
                'admin_note' => $validated['admin_note'] ?? null,
            ]);

            Animal::whereIn('id', $adoption->animals()->pluck('animals.id'))
                ->update(['status' => 'available']);
        });

        return redirect()
            ->route('admin.adoptions.index')
            ->with('success', 'Pengajuan adopsi berhasil ditolak.');
    }
}
