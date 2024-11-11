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
// List of defined routes and their corresponding method
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/restaurants', [RestaurantsController::class, 'index'])->name('restaurants.index'); //Uses the index method from the RestaurantController to display a list of all of the records
    Route::get('/restaurants/create', [RestaurantsController::class, 'create'])->name('restaurants.create'); //Dispalys the create form
    Route::get('/restaurants/{restaurants}', [RestaurantsController::class, 'show'])->name('restaurants.show'); //Displays an indevidual record
    Route::get('/restaurants/{restaurants}/edit', [RestaurantsController::class, 'edit'])->name('restaurants.edit'); //Displays the edit form
    Route::put('/restaurants/{restaurants}/update', [RestaurantsController::class, 'update'])->name('restaurants.update'); //Updates a record in the database
    Route::post('/restaurants', [RestaurantsController::class, 'store'])->name('restaurants.store'); //Adds a record to the database
    Route::delete('/restaurants/{restaurants}', [RestaurantsController::class, 'destroy'])->name('restaurants.destroy'); //Delets a record from the database
});



require __DIR__.'/auth.php';
