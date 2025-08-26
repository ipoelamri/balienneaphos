<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PortofolioControllerText;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Models\portofolio;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;







Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/portofolios', [PortofolioController::class, 'publicIndex'])->name('portofolios.public');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     
   
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('portofolios', PortofolioController::class)->names('portofolios');
    });
     Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('portofolios', PortofolioControllerText::class)->names('portofolios');
    });
    
});

require __DIR__.'/auth.php';
