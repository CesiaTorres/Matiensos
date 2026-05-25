<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController
{
    /**
     * Muestra el listado de categorías
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.front.categories', compact('categories'));
    }

    /**
     * Guarda una nueva categoría creada desde el panel.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Categoría creada exitosamente.');
    }
}