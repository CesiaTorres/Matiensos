<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController
{
    /**
     * Muestra el listado de productos en BD y la vista
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        $categories = Category::orderBy('name', 'asc')->get();

        $metrics = [
            'total_products'        => Product::count(),
            'stock'        => Product::sum('stock'),
            'out_of_stock' => Product::where('stock', 0)->count(),
        ];

        return view('admin.front.products', compact('products', 'categories', 'metrics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Guarda un nuevo producto
     */
    public function store(Request $request)
    {
        //Validación
        $request->validate([
            'code' => 'required|string|unique:products,code|max:50',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('products', 'public');
        }

        Product::create([
            'code' => strtoupper($request->code),
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $imagePath,
        ]);
        return redirect()->route('admin.products')->with('success', 'Producto agregado exitosamente al catálogo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Elimina el producto de la base de datos.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Producto eliminado correctamente.');
    }
}
