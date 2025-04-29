<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::paginate(4);
        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }

    public function show(Dish $dish)
    {
        return response()->json([
            'success' => true,
            'results' => $dish
        ]);
    }
}
