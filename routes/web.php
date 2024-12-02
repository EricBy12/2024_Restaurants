<?php

use App\Http\Controllers\ReviewController;
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
    //creates all routes for reviews
    Route::resource('reviews', ReviewController::class);
    Route::post('restaurants/{restaurant}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
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
    
    // Creates all routes for Reviews
    Route::resource('reviews', ReviewController::class);

    //Overwrites the usual store route so it will accept a restaurant parameter
    Route::post('restaurats/{restaurant}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // creates all routes for suppliers
    Route::resource('suppliers', SuppliersController::class)->middleware('auth');
    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SuppliersController::class, 'create'])->name('suppliers.create');
    Route::get('/suppliers/{suppliers}', [SuppliersController::class, 'show'])->name('suppliers.show');
    Route::get('/suppliers/{suppliers}/edit', [SuppliersController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{suppliers}/update', [SuppliersController::class, 'update'])->name('suppliers.update');
    Route::post('/suppliers', [SuppliersController::class, 'store'])->name('suppliers.store');
    Route::delete('/suppliers/{suppliers}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
});



require __DIR__.'/auth.php';
