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
     * Agrega un producto al carrito o suma la cantidad si ya existia.
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
                'stock' => $product->stock,
            ];
        }
        Session::put($this->sessionKey, $cart);
    }

    /**
     * Actualiza la cantidad de un producto específico en el carrito.
     */
    public function update($productId, $quantity)
    {
        $cart = $this->getContent();

        if (isset($cart[$productId]) && $quantity > 0) {
            $cart[$productId]['quantity'] = $quantity;

            Session::put($this->sessionKey, $cart);
        }
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

    /**
     * Elimina un producto específico del carrito.
     */
    public function remove($productId)
    {
        $cart = $this->getContent();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put($this->sessionKey, $cart);
        }
    }

    /**
     * Vacia el carrito por completo.
     */
    public function clear()
    {
        Session::forget($this->sessionKey);
    }
}