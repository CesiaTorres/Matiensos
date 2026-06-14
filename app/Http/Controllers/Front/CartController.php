<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;

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

        return view('front.cart', compact('cart', 'total'));
    }

    /**
     * Recibe la petición del botón "Agregar al Carrito".
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1|max:50'
        ]);

        $quantity = $request->input('quantity', 1);
        $this->cartService->add($product, $quantity);

        return back()->with('success', '¡' . $product->name . ' se agregó al carrito!');
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