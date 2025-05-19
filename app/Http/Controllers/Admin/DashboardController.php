<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        // ordine alfabetico
        $dish_query = Dish::query();
        $dishes = $dish_query->orderby('name', 'asc')->get();

        $categories = Category::all();

        // ordine alfabetico
        $ingredients_query = Ingredient::query();
        $ingredients = $ingredients_query->orderby('name', 'asc')->get();

        return view('dashboard', compact('dishes', 'categories', 'ingredients'));
    }
}
