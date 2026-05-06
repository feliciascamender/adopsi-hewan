<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Adopter\Dashboard as AdopterDashboard;

//halman publik sebelum login
Route::get('/', [HomeController::class, 'index']->name ('home');
Route::get('/animals', [HomeController::class, 'animals'])->name('animals.index');
Route::get('/animals/{animal}', [HomeController::class, 'show'])->name('animals.show');

//auth
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

//admin's routes
Routes::prefix('admin')->name('admin.')->middleware('role:admin')->group(function() {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    //spesies
    Route::resource('/species', \App\Http\Controllers\Admin\SpeciesController::class);
    //hewan
    Route::resource('/animals', \App\Http\Controllers\Admin\AnimalController::class);
    //riwayat medis
    Route::resource('animals.medical-records', \App\Http\Controllers\Admin\MedicalRecordController::class)
         ->shallow();

    // pengajuan adopsi
    Route::get('/adoptions', [\App\Http\Controllers\Admin\AdoptionController::class, 'index'])
         ->name('adoptions.index');
    Route::get('/adoptions/{adoption}', [\App\Http\Controllers\Admin\AdoptionController::class, 'show'])
         ->name('adoptions.show');
    Route::patch('/adoptions/{adoption}/approve', [\App\Http\Controllers\Admin\AdoptionController::class, 'approve'])
         ->name('adoptions.approve');
    Route::patch('/adoptions/{adoption}/reject', [\App\Http\Controllers\Admin\AdoptionController::class, 'reject'])
         ->name('adoptions.reject');
});

//adopters routes
Route::prefix('adopter')->name('adopter.')->middleware('role:adopter')->group(function() {
    Route::get('/dashboard', [AdopterDashboard::class, 'index'])->name('dashboard');

    //pengajuan adopsi
    Route::get('/adoptions', [\App\Http\Controllers\Adopter\AdoptionController::class, 'index'])
         ->name('adoptions.index');
    Route::get('/adoptions/create', [\App\Http\Controllers\Adopter\AdoptionController::class, 'create'])
         ->name('adoptions.create');
    Route::post('/adoptions', [\App\Http\Controllers\Adopter\AdoptionController::class, 'store'])
         ->name('adoptions.store');
    Route::get('/adoptions/{adoption}', [\App\Http\Controllers\Adopter\AdoptionController::class, 'show'])
         ->name('adoptions.show');
});