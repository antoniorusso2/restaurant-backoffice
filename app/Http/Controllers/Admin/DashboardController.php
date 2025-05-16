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

        $dishes = Dish::all();
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('dashboard', compact('dishes', 'categories', 'ingredients'));
    }
}
