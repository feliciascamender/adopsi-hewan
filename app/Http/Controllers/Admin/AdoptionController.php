<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdoptionController extends Controller
{
    /**
     * Tampilkan daftar pengajuan adopsi milik user
     */
    public function index()
    {
        $adoptions = Adoption::with('animals.species')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('adopter.adoptions.index', compact('adoptions'));
    }

    /**
     * Form buat pengajuan adopsi baru
     */
    public function create()
    {
        $availableAnimals = Animal::with('species')
            ->where('status', 'available')
            ->get();

        if ($availableAnimals->isEmpty()) {
            return redirect()->route('adopter.dashboard')
                ->with('error', 'Belum ada hewan yang tersedia untuk diadopsi saat ini.');
        }

        return view('adopter.adoptions.create', compact('availableAnimals'));
    }

    /**
     * Simpan pengajuan adopsi baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'    => 'required|string|max:255',
            'ktp_address'  => 'required|string|max:500',
            'house_photo'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reason'       => 'required|string|min:50|max:1000',
            'animal_ids'   => 'required|array|min:1',
            'animal_ids.*' => 'exists:animals,id',
        ], [
            'reason.min' => 'Alasan adopsi minimal 50 karakter.',
            'animal_ids.required' => 'Pilih minimal 1 hewan.',
            'house_photo.required' => 'Foto rumah wajib diupload.',
        ]);

        DB::beginTransaction();
        try {
            // Upload foto rumah
            $housePath = $request->file('house_photo')
                ->store('adoptions/house-photos', 'public');

            // Buat adoption record
            $adoption = Adoption::create([
                'user_id'      => auth()->id(),
                'full_name'    => $validated['full_name'],
                'ktp_address'  => $validated['ktp_address'],
                'house_photo'  => $housePath,
                'reason'       => $validated['reason'],
                'status'       => 'pending',
            ]);

            // Attach hewan yang dipilih (Many-to-Many)
            $adoption->animals()->attach($validated['animal_ids']);

            // Update status hewan jadi 'pending'
            Animal::whereIn('id', $validated['animal_ids'])
                ->update(['status' => 'pending']);

            DB::commit();

            return redirect()->route('adopter.adoptions.index')
                ->with('success', 'Pengajuan adopsi berhasil dikirim! Admin akan meninjau permohonan Anda.');

        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus foto jika ada error
            if (isset($housePath)) {
                Storage::disk('public')->delete($housePath);
            }

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Detail pengajuan adopsi milik user
     */
    public function show(Adoption $adoption)
    {
        // Pastikan user hanya bisa lihat pengajuannya sendiri
        if ($adoption->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke pengajuan ini.');
        }

        $adoption->load(['animals.species', 'user']);

        return view('adopter.adoptions.show', compact('adoption'));
    }
}