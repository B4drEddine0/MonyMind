<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepencesController;
use App\Http\Controllers\EpargneController;
use Illuminate\Support\Facades\Route;

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


    Route::resource('depences', DepencesController::class);
    Route::resource('epargner', EpargneController::class);
});

// Route::get('/depences', function () {
//     return view('depences');
// })->middleware(['auth', 'verified'])->name('depences');

Route::get('/depenses-recurrentes', function () {
    return view('depenses-recurrentes');
})->middleware(['auth', 'verified'])->name('depenses-recurrentes');

require __DIR__.'/auth.php';
