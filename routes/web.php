<?php

use App\Http\Controllers\ProfileController;
use App\Models\portofolio;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    // Ambil 3 portofolio terbaru untuk ditampilkan di halaman utama
    $portofolios = \App\Models\Portofolio::latest()->take(3)->get();

    return Inertia::render('home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'portofolios' => $portofolios,
    ]);
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/portofolios', [portofolioController::class, 'index'])->name('portofolios.index');
});

require __DIR__.'/auth.php';
