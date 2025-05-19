<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->all();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'color' => ['required', 'string', 'max:100'],
        ]);

        $newCategory = new Category();

        $newCategory->name = $validated['name'];
        $newCategory->color = $validated['color'];

        $newCategory->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();

        $category->name = $data['name'];
        $category->color = $data['color'];

        // dd($category);
        $category->save();

        return redirect()->route('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd('sei nella destroy per la categoria ' . $category->name);


        $category->delete();

        return redirect()->route('categories.index');
    }
}
