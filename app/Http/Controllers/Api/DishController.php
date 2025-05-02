<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request)
    {
        //query build con parametri di ricerca
        //valore iniziale
        $query = Dish::query()->with(['category', 'ingredients']);

        if ($request->has('name')) {
            // where name like %$request->name%
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // paginazione 
        $dishes = $query->paginate(10);

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
