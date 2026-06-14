<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartService
{
    protected $sessionKey = 'cart';

    /**
     * Devuelve todo el contenido del carrito.
     */
    public function getContent()
    {
        return Session::get($this->sessionKey, []);
    }

    /**
     * Agrega un producto al carrito o suma la cantidad si ya existía.
     */
    public function add(Product $product, $quantity = 1)
    {
        $cart = $this->getContent();

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image_url' => $product->image ?? null, 
                'quantity' => $quantity,
            ];
        }
        Session::put($this->sessionKey, $cart);
    }

    /**
     * Calcula el monto total a pagar.
     */
    public function getTotal()
    {
        $cart = $this->getContent();
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    /**
     * Cuenta cuantos productos distintos hay.
     */
    public function count()
    {
        return count($this->getContent());
    }
}