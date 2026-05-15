<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SpeciesController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\MedicalRecordController;
use App\Http\Controllers\Admin\AdoptionController as AdminAdoptionController;
use App\Http\Controllers\Adopter\DashboardController as AdopterDashboard;
use App\Http\Controllers\Adopter\AdoptionController as AdopterAdoptionController;
use App\Http\Controllers\HomeController;

//halaman publik sebelum login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/animals', [HomeController::class, 'animals'])->name('animals.index');
Route::get('/animals/{animal}', [HomeController::class, 'show'])->name('animals.show');

//autentikasi
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Spesies
    Route::resource('species', SpeciesController::class);

    // Hewan
    Route::resource('animals', AnimalController::class);

    // Riwayat Medis
    Route::get('animals/{animal}/medical-records', [MedicalRecordController::class, 'index'])->name('medical.index');
    Route::get('animals/{animal}/medical-records/create', [MedicalRecordController::class, 'create'])->name('medical.create');
    Route::post('animals/{animal}/medical-records', [MedicalRecordController::class, 'store'])->name('medical.store');
    Route::get('medical-records/{record}/edit', [MedicalRecordController::class, 'edit'])->name('medical.edit');
    Route::put('medical-records/{record}', [MedicalRecordController::class, 'update'])->name('medical.update');
    Route::delete('medical-records/{record}', [MedicalRecordController::class, 'destroy'])->name('medical.destroy');

    // Pengajuan Adopsi
    Route::get('adoptions', [AdminAdoptionController::class, 'index'])->name('adoptions.index');
    Route::get('adoptions/{adoption}', [AdminAdoptionController::class, 'show'])->name('adoptions.show');
    Route::patch('adoptions/{adoption}/approve', [AdminAdoptionController::class, 'approve'])->name('adoptions.approve');
    Route::patch('adoptions/{adoption}/reject', [AdminAdoptionController::class, 'reject'])->name('adoptions.reject');
});

//adopter routes
Route::prefix('adopter')->name('adopter.')->middleware(['auth', 'role:adopter'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdopterDashboard::class, 'index'])->name('dashboard');

    // Pengajuan Adopsi
    Route::get('adoptions', [AdopterAdoptionController::class, 'index'])->name('adoptions.index');
    Route::get('adoptions/create', [AdopterAdoptionController::class, 'create'])->name('adoptions.create');
    Route::post('adoptions', [AdopterAdoptionController::class, 'store'])->name('adoptions.store');
    Route::get('adoptions/{adoption}', [AdopterAdoptionController::class, 'show'])->name('adoptions.show');
});