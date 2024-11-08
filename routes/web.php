<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/restaurants', [RestaurantsController::class, 'index'])->name('restaurants.index');
    Route::get('/restaurants/create', [RestaurantsController::class, 'create'])->name('restaurants.create');
    Route::get('/restaurants/{restaurants}', [RestaurantsController::class, 'show'])->name('restaurants.show');
    Route::get('/restaurants/{restaurants}/edit', [RestaurantsController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{restaurants}/update', [RestaurantsController::class, 'update'])->name('restaurants.update');
    Route::post('/restaurants', [RestaurantsController::class, 'store'])->name('restaurants.store');
    Route::delete('/restaurants/{restaurants}', [RestaurantsController::class, 'destroy'])->name('restaurants.destroy');
});



require __DIR__.'/auth.php';
