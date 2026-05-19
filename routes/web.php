<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

//controllers admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SpeciesController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\MedicalRecordController;
use App\Http\Controllers\Admin\AdoptionController as AdminAdoptionController;

//adopter controllers
use App\Http\Controllers\Adopter\DashboardController as AdopterDashboard;
use App\Http\Controllers\Adopter\AdoptionController as AdopterAdoptionController;
use pp\Http\Controllers\Adopter\AnimalController as AdopterAnimalController;


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
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Spesies
    Route::resource('species', SpeciesController::class);

    // Hewan
    Route::resource('animals', AnimalController::class);

    // Riwayat Medis
    Route::prefix('animals/{animal}/medical-records')->name('medical.')->group(function () {
    Route::get('/', [MedicalRecordController::class, 'index'])->name('index');
    Route::get('/create', [MedicalRecordController::class, 'create'])->name('create');
    Route::post('/', [MedicalRecordController::class, 'store'])->name('store');
    });

    Route::prefix('medical-records/{record}')->name('medical.')->group(function () {
    Route::get('/edit', [MedicalRecordController::class, 'edit'])->name('edit');
    Route::put('/', [MedicalRecordController::class, 'update'])->name('update');
    Route::delete('/', [MedicalRecordController::class, 'destroy'])->name('destroy');
    });


    // Pengajuan Adopsi
    Route::prefix('adoptions')->name('adoptions.')->group(function () {
    Route::get('/', [AdminAdoptionController::class, 'index'])->name('index');
    Route::get('/{adoption}', [AdminAdoptionController::class, 'show'])->name('show');
    Route::patch('/{adoption}/approve', [AdminAdoptionController::class, 'approve'])->name('approve');
    Route::patch('/{adoption}/reject', [AdminAdoptionController::class, 'reject'])->name('reject');
        });
    });

//adopter routes
Route::prefix('adopter')->name('adopter.')->middleware(['auth', 'role:adopter'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdopterDashboard::class, 'index'])->name('dashboard');

    // Hewan
    Route::get('/animals', [AdopterAnimalController::class, 'index'])->name('animals.index');
    Route::get('/animals/{animal}', [AdopterAnimalController::class, 'show'])->name('animals.show');

    // Pengajuan Adopsi
    Route::prefix('adoptions')->name('adoptions.')->group(function () {
    Route::get('/', [AdopterAdoptionController::class, 'index'])->name('index');
    Route::get('/create', [AdopterAdoptionController::class, 'create'])->name('create');
    Route::post('/', [AdopterAdoptionController::class, 'store'])->name('store');
    });
    });