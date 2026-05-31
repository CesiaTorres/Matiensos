<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController
{
    /**
     * Muestra el listado de categorías
     */
    public function index()
    {
        $categories = Category::withCount('products')
            ->withSum('products', 'stock')
            ->latest()
            ->paginate(10);

        // Busco la categoría con más productos y la que tiene menos (MODIFICAR LUEGO)
        $mostPopulous = Category::withCount('products')->orderBy('products_count', 'desc')->first();
        $leastPopulous = Category::withCount('products')->orderBy('products_count', 'asc')->first();

        $metrics = [
            'total' => Category::count(),
            'top_category' => $mostPopulous ? $mostPopulous->name : '--',
            'bottom_category' => $leastPopulous ? $leastPopulous->name : '--',
        ];
        
        return view('admin.front.categories', compact('categories', 'metrics'));
    }

    /**
     * Guarda una nueva categoría en la BD.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ], [
            'name.unique' => 'No se pudo guardar: Ya existe una categoría registrada con ese nombre.',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Actualiza una categoría existente.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:255',
        ], [
            'name.unique' => 'No se pudo actualizar: Ya existe otra categoría con ese nombre.',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Categoría actualizada con éxito.');
    }

    /**
     * Elimina una categoría (con protección de integridad).
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories')
                ->withErrors(['error' => 'No podés eliminar esta categoría porque tiene productos asociados.']);
        }

        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Categoría eliminada correctamente.');
    }
}