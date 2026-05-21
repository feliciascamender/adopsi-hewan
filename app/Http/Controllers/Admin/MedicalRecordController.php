<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\MedicalRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MedicalRecordController extends Controller
{
    public function index(Animal $animal): View
    {
        $animal->load('species');
        $records = $animal->medicalRecords()
            ->latest('record_date')
            ->paginate(10);

        return view('admin.medical.index', compact('animal', 'records'));
    }

    public function create(Animal $animal): View
    {
        return view('admin.medical.create', compact('animal'));
    }

    public function store(Request $request, Animal $animal): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'record_date' => ['required', 'date'],
        ]);

        $animal->medicalRecords()->create($validated);

        return redirect()
            ->route('admin.medical.index', $animal)
            ->with('success', 'Riwayat medis berhasil ditambahkan.');
    }

    public function edit(MedicalRecord $record): View
    {
        $record->load('animal');

        return view('admin.medical.edit', compact('record'));
    }

    public function update(Request $request, MedicalRecord $record): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'record_date' => ['required', 'date'],
        ]);

        $record->update($validated);

        return redirect()
            ->route('admin.medical.index', $record->animal_id)
            ->with('success', 'Riwayat medis berhasil diperbarui.');
    }

    public function destroy(MedicalRecord $record): RedirectResponse
    {
        $animalId = $record->animal_id;
        $record->delete();

        return redirect()
            ->route('admin.medical.index', $animalId)
            ->with('success', 'Riwayat medis berhasil dihapus.');
    }
}
