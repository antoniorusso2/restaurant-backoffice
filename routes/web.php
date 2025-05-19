<?php

use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dishes', DishController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('ingredients', IngredientController::class);

    //image destroy
    Route::delete('/dishes/{dish}/image', [DishController::class, 'destroyImage'])->name('dishes.destroy_image');
});

require __DIR__ . '/auth.php';
