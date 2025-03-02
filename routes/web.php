<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepencesController;
use App\Http\Controllers\EpargneController;
use App\Http\Controllers\SouhaitController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('depences', DepencesController::class);
    Route::resource('epargner', EpargneController::class);
    Route::resource('souhait', SouhaitController::class);
});


require __DIR__.'/auth.php';
