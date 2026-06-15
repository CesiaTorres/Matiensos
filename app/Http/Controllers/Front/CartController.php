<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Muestra la página principal del carrito con el resumen.
     */
    public function index()
    {
        $cart = $this->cartService->getContent();
        $total = $this->cartService->getTotal();

        return view('front.carrito.carts', compact('cart', 'total'));
    }

    /**
     * Recibe la petición del botón "Agregar al Carrito".
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1|max:' . $product->stock
        ]);

        $quantity = $request->input('quantity', 1);

        $cart = $this->cartService->getContent();
        $currentQuantity = isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 0;

        if (($currentQuantity + $quantity) > $product->stock) {
            return back()->withErrors(['quantity' => 'No podés agregar más. Solo tenemos ' . $product->stock . ' unidades disponibles.']);
        }

        $this->cartService->add($product, $quantity);

        return back()->with('success', '¡' . $product->name . ' se agregó al carrito!');
    }

    /**
     * Actualiza la cantidad desde la vista del carrito.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|regex:/^[^\s]+(\s+[^\s]+)*$/|min:1|max:' . $product->stock
        ], [
            'quantity.max' => 'Solo tenemos ' . $product->stock . ' unidades disponibles de este producto.'
        ]);

        $this->cartService->update($product->id, $request->quantity);

        return back();
    }

    /**
     * Saca un producto de la lista.
     */
    public function remove(Product $product)
    {
        $this->cartService->remove($product->id);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    /**
     * Vacia todo el carrito.
     */
    public function clear()
    {
        $this->cartService->clear();

        return back()->with('info', 'El carrito ha sido vaciado.');
    }
}