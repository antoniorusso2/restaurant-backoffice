<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

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
        $dish->load(['category', 'ingredients']);

        return response()->json([
            'success' => true,
            'results' => $dish
        ]);
    }
}
