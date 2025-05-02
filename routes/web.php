<?php

use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ! debug only no auth
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {

    $dishes = Dish::all();
    $categories = Category::All();
    $ingredients = Ingredient::all();

    return view('dashboard', compact('dishes', 'categories', 'ingredients'));
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('web')->resource('dishes', DishController::class);

Route::resource('categories', CategoryController::class);

Route::resource('ingredients', IngredientController::class);


require __DIR__ . '/auth.php';
