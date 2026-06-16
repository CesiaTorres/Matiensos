<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Muestra el listado de productos en BD y la vista
     */
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->latest()
            ->search($request->input('search'))
            ->byStockStatus($request->input('stock_filter'))
            ->byCategory($request->input('category_filter'))
            ->paginate(10);

        $categories = Category::orderBy('name', 'asc')->get();

        $metrics = [
            'total_products'        => Product::count(),
            'low_stock' => Product::where('stock', '>', 0)->where('stock', '<=', 5)->count(),
            'stock'        => Product::sum('stock'),
            'out_of_stock' => Product::where('stock', 0)->count(),
            'inventory_value' => Product::sum(DB::raw('price * stock')),
        ];
        $masVendidoMes = Product::select('products.name', DB::raw('SUM(order_details.quantity) as total_sold'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereMonth('orders.created_at', now()->month)
            ->whereYear('orders.created_at', now()->year)
            ->whereIn('orders.status', ['paid', 'shipped', 'delivered'])
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->first();

        $masVendidoHistorico = Product::select('products.name', DB::raw('SUM(order_details.quantity) as total_sold'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereIn('orders.status', ['paid', 'shipped', 'delivered'])
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->first();

        $categoriasConConteo = Category::withCount('products')->get();

        return view('admin.front.products', compact('products', 'categories', 'metrics', 'masVendidoMes', 'masVendidoHistorico', 'categoriasConConteo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Guarda un nuevo producto en BD
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'code' => 'required|string|max:50|regex:/^[^\s]+(\s+[^\s]+)*$/|unique:products,code',
            'name' => 'required|string|max:150|unique:products,name',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'code.unique' => 'No se pudo guardar: El código ingresado ya está en uso por otro producto.',
            'name.unique' => 'No se pudo guardar: Ya existe un producto registrado con ese mismo nombre.',
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
     * Actualiza el producto en BD
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'code'        => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:50|unique:products,code,' . $product->id,
            'name'        => 'required|string|max:150|unique:products,name,' . $product->id,
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image_url'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'code.unique' => 'No se pudo actualizar: El código ingresado ya está en uso por otro producto.',
            'name.unique' => 'No se pudo actualizar: Ya existe un producto registrado con ese mismo nombre.',
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('products', 'public'); //guarda la nueva foto      
            $product->image_url = $imagePath; //actualiza la ruta en el modelo
        }
        //actualiza campos
        $product->code        = strtoupper($request->code);
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price       = $request->price;
        $product->stock       = $request->stock;

        //guarda los cambios
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Producto actualizado con éxito.');
    }

    /**
     * Elimina el producto en BD.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Producto eliminado correctamente.');
    }

    public function catalog()
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->get();

        $categories = Category::all();

        return view('front.products', compact(
            'products',
            'categories'
        ));
    }
}
