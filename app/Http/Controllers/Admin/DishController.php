<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dishes\FilterDishRequest;
use App\Http\Requests\Dishes\StoreDishRequest;
use App\Http\Requests\Dishes\UpdateDishRequest;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterDishRequest $request): View
    {

        $filters = $request->all();

        $query = Dish::query();

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $request->category_id);
        }

        if (!empty($filters['filter'])) {
            $query->where('name', 'like', '%' . $request->filter . '%');
        }

        // dd($dishes);

        $dishes = $query->paginate(4);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // categories
        $categories = Category::all();
        //ingredients
        $ingredients = Ingredient::all();

        return view('admin.dishes.create', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request): RedirectResponse
    {

        // dd($request->all());

        $validated = $request->all();

        $newDish = new Dish();

        $newDish->name = $validated['name'];
        $newDish->description = $validated['description'];
        $newDish->price = $validated['price'];
        $newDish->category_id = $validated['category_id'];

        if (isset($validated['image'])) {
            $newDish->image = Storage::disk('public')->putFile('uploads/dishes', $validated['image']);
        }

        //aggiungo il piatto al db
        $newDish->save();

        //collego gli ingredienti
        $newDish->ingredients()->attach($validated['ingredients']);

        return redirect('/dishes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish): View
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
    public function update(UpdateDishRequest $request, Dish $dish): RedirectResponse
    {
        // dd($request->all());
        $validated = $request->all();

        $dish->name = $validated['name'];
        $dish->description = $validated['description'];
        $dish->price = $validated['price'];
        $dish->category_id = $validated['category_id'];

        if ($dish->image && isset($validated['image'])) {
            // dd('immagine ' . $dish->name);
            //elimina l'immagine precedente
            Storage::disk('public')->delete($dish->image);

            //aggiorna l'immagine
            $dish->image = Storage::disk('public')->putFile('uploads/dishes', $validated['image']);
        } else if (isset($validated['image'])) {
            $dish->image = Storage::disk('public')->putFile('uploads/dishes', $validated['image']);
        }

        $dish->save();

        if (isset($request->ingredients)) {
            $dish->ingredients()->sync($request['ingredients']);
        } else {
            $dish->ingredients()->detach();
        }

        return redirect()->route('dishes.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish): RedirectResponse
    {
        // dd('hai eliminato il piatto: ' . $dish->name);
        // eliminazione immagine da local storage
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }

        $dish->delete();

        return redirect()->route('dishes.index');
    }

    public function destroyImage(Dish $dish): RedirectResponse
    {

        // dd('destroy image for ' . $dish->name);

        if ($dish->image) {
            // dd('destroy image for ' . $dish->name);
            Storage::disk('public')->delete($dish->image);
            $dish->image = null;
            $dish->save();
        }

        return redirect()->route('dishes.show', $dish);
    }
}
