<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepencesController;
use App\Http\Controllers\EpargneController;
use App\Http\Controllers\SouhaitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlertController;
use App\Http\Middleware\AdminMiddleware;
use App\Mail\GlobalAlert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('depences', DepencesController::class);
    Route::resource('epargner', EpargneController::class);
    Route::resource('souhait', SouhaitController::class);
    Route::resource('admin', AdminDashController::class)->middleware(AdminMiddleware::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('alert', AlertController::class);
});

require __DIR__.'/auth.php';
