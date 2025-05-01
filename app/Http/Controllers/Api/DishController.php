<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        // paginazione 
        $dishes = Dish::with(['category', 'ingredients'])->paginate(10);

        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }

    public function show(Dish $dish)
    {
        // aggiunta ingredienti
        $dish->load([
            'ingredients' => fn($query) => $query->select('id', 'name'),
            'category'
        ]);

        return response()->json([
            'success' => true,
            'results' => $dish
        ]);
    }
}
