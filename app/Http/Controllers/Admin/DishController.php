<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();

        // categories
        // $categories = Category::all();

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // categories
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('admin.dishes.create', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        // validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'price' => ['required', 'numeric'],
            'ingredients' => ['nullable', 'array'],
        ]);

        // dd($validated);

        $newDish = new Dish();

        $newDish->name = $validated['name'];
        $newDish->description = $validated['description'];
        $newDish->price = $validated['price'];
        $newDish->category_id = $validated['category_id'];


        if (isset($validated['image'])) {
            $newDish->image = Storage::disk('public')->putFile('uploads/dishes', $validated['image']);
        }

        // dd($newDish);
        //aggiungo il piatto al db
        $newDish->save();

        //collego gli ingredienti
        $newDish->ingredients()->attach($validated['ingredients']);

        return redirect('/dishes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        // dd($dish);
        $ingredients = Ingredient::all();
        $categories = Category::all();
        return view('admin.dishes.edit', compact('dish', 'ingredients', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'price' => ['required', 'numeric'],
        ]);


        $dish->name = $validated['name'];
        $dish->description = $validated['description'];
        $dish->price = $validated['price'];
        $dish->category_id = $validated['category_id'];

        if (isset($validated['image']) && $dish->image) {
            //elimina l'immagine precedente
            Storage::disk('public')->delete($dish->image);

            //aggiorna l'immagine
            $dish->image = Storage::disk('public')->putFile('uploads/dishes', $validated['image']);
        } else if (isset($validated['image'])) {
            $dish->image = Storage::disk('public')->putFile('uploads/dishes', $validated['image']);
        }

        $dish->save();

        if (isset($validated['ingredients'])) {
            $dish->ingredients()->sync($validated['ingredients']);
        } else {
            $dish->ingredients()->detach();
        }

        return redirect()->route('dishes.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        // dd('hai eliminato il piatto: ' . $dish->name);

        $dish->delete();

        return redirect()->route('dishes.index');
    }
}
