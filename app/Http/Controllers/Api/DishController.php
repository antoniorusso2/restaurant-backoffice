<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DishController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:20'],
            'name' => ['nullable', 'string', 'max:150'],
            'category' => ['nullable', 'string', 'max:50'],
            'ingredients' => ['nullable', 'string', 'max:50'],
            'price' => ['nullable', 'numeric', 'min:0', 'max:200'],
        ]);

        // dd($validated);

        //query build con parametri di ricerca
        //valore iniziale
        $query = Dish::query();

        if ($request->filled('name')) {
            // where name like %$request->name%
            $name = trim($request->name);

            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('category') && $request->category != '') {

            // dati parametro query separati da virgola
            $formattedCategories = str_replace('-', ' ', $request->category);
            $requestedCategories = explode(',', $formattedCategories);

            // dd($requestedCategories);

            // ottengo id delle categorie richieste
            foreach ($requestedCategories as $category) {
                //ritorna null in caso il campo categoria sia presente ma vuoto causando un errore nel momento in cui viene eseguito first() che in questo caso ritorna null e quindi si tenta di accedere a proprietà non esistenti
                // $categoryIds[] = Category::where('name', $category)->first()->id;

                $categoryIds = Category::whereIn('name', $requestedCategories)->pluck('id')->toArray();
            }

            // dd($categoryIds);

            // concatenazione query
            $query->whereIn('category_id', $categoryIds);
        }

        // paginazione 
        //limite elementi per pagina (default 10)
        $limit = $request->input('limit', 10);

        $dishes = $query->with(['category', 'ingredients'])->paginate($limit);

        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }

    public function show(Dish $dish): JsonResponse
    {
        // aggiunta ingredienti
        $dish->load(['category', 'ingredients']);

        return response()->json([
            'success' => true,
            'results' => $dish
        ]);
    }
}
