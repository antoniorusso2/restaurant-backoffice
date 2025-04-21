<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
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

        return view('admin.dishes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        $newDish = new Dish();

        $newDish->name = $data['name'];
        $newDish->description = $data['description'];
        $newDish->price = $data['price'];

        if (isset($data['image'])) {
            $newDish->image = Storage::disk('public')->putFile('uploads/dishes', $data['image']);
        }


        // dd($newDish);
        $newDish->save();

        return redirect()->route('dishes.index');
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
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $request->all();
        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];

        if (isset($data['image'])) {
            $dish->image = Storage::disk('public')->putFile('uploads/dishes', $data['image']);
        }

        $dish->save();

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
