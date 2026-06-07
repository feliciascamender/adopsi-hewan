<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdoptionController extends Controller
{
    public function index(): View
    {
        $adoptions = Adoption::with('animals.species')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('adopter.adoptions.index', compact('adoptions'));
    }

    public function create(): View|RedirectResponse
    {
        $availableAnimals = Animal::with('species')
            ->where('status', 'available')
            ->get();

        if ($availableAnimals->isEmpty()) {
            return redirect()
                ->route('adopter.dashboard')
                ->with('error', 'Belum ada hewan yang tersedia untuk diadopsi saat ini.');
        }

        return view('adopter.adoptions.create', compact('availableAnimals'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'ktp_address' => ['required', 'string', 'max:500'],
            'house_photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'reason' => ['required', 'string', 'min:50', 'max:1000'],
            'animal_ids' => ['required', 'array', 'min:1'],
            'animal_ids.*' => ['integer', 'exists:animals,id'],
        ], [
            'reason.min' => 'Alasan adopsi minimal 50 karakter.',
            'animal_ids.required' => 'Pilih minimal 1 hewan.',
            'house_photo.required' => 'Foto rumah wajib diupload.',
        ]);

        DB::beginTransaction();

        try {
            $animalIds = Animal::query()
                ->whereIn('id', $validated['animal_ids'])
                ->where('status', 'available')
                ->pluck('id')
                ->all();

            if (count($animalIds) !== count($validated['animal_ids'])) {
                return back()
                    ->withInput()
                    ->with('error', 'Sebagian hewan yang dipilih sudah tidak tersedia.');
            }

            $housePath = $request->file('house_photo')->store('adoptions/house-photos', 'public');

            $adoption = Adoption::create([
                'user_id' => auth()->id(),
                'full_name' => $validated['full_name'],
                'ktp_address' => $validated['ktp_address'],
                'house_photo' => $housePath,
                'reason' => $validated['reason'],
                'status' => 'pending',
            ]);

            $adoption->animals()->attach($animalIds);
            Animal::whereIn('id', $animalIds)->update(['status' => 'pending']);

            DB::commit();

            return redirect()
                ->route('adopter.adoptions.index')
                ->with('success', 'Pengajuan adopsi berhasil dikirim. Admin akan meninjau permohonan Anda.');
        } catch (\Throwable $e) {
            DB::rollBack();

            if (isset($housePath)) {
                Storage::disk('public')->delete($housePath);
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan pengajuan. Silakan coba lagi.');
        }
    }

    public function show(Adoption $adoption): View
    {
        abort_if($adoption->user_id !== auth()->id(), 403, 'Anda tidak memiliki akses ke pengajuan ini.');

        $adoption->load(['animals.species', 'user']);

        return view('adopter.adoptions.show', compact('adoption'));
    }
}