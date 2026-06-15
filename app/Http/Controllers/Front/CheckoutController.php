<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Muestra el formulario de envio y pago.
     */
    public function index()
    {
        $cart = $this->cartService->getContent();

        if (empty($cart)) {
            return redirect()->route('cart')->with('info', 'Tu carrito está vacío. Sumá algunos productos primero.');
        }

        $total = $this->cartService->getTotal();
        return view('front.carrito.checkout', compact('cart', 'total'));
    }

    /**
     * Procesa la compra, guarda en BD y descuenta stock.
     */
    public function process(Request $request)
    {
        $cart = $this->cartService->getContent();
        if (empty($cart)) {
            return redirect()->route('cart');
        }

        $request->validate([
            'calle' => ['required', 'string', 'max:150', 'regex:/[a-zA-Z]/'],
            'altura' => 'required|string|max:20',
            'piso' => 'nullable|string|max:50',
        ], [
            'calle.required' => 'Necesitamos saber la calle para el envío.',
            'calle.regex' => 'El nombre de la calle debe contener al menos una letra.',
            'altura.required' => 'Falta la altura de la calle.'
        ]);

        try {
            DB::beginTransaction();

            $direccionCompleta = $request->calle . ' ' . $request->altura;
            if (!empty($request->piso)) {
                $direccionCompleta .= ', Piso/Dpto: ' . $request->piso;
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $this->cartService->getTotal(),
                'status' => 'pending',
                'shipping_address' => $direccionCompleta,
            ]);

            foreach ($cart as $item) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                ]);

                $product = Product::find($item['id']);
                if($product) {
                    $product->decrement('stock', $item['quantity']);
                }
            }
            DB::commit();


        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al procesar tu pedido: ' . $e->getMessage()]);
        }

        $this->cartService->clear();

        return redirect()->route('checkout.success') ->with('success', '¡Pedido confirmado con éxito!')
            ->with('orderCode', $order->code);
    }
}