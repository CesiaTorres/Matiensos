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

        return redirect()->route('checkout.payment', $order->code);
    }

    /**
     * Muestra la vista de pago simulada.
     */
    public function payment(Order $order)
    {
        if ($order->user_id !== Auth::id() || $order->status !== 'pending') {
            abort(403, 'Acceso no autorizado a este pedido.');
        }

        return view('front.carrito.payment', compact('order'));
    }

    /**
     * Procesa el pago simulado.
     */
    public function processPayment(Request $request, Order $order)
    {
        $request->validate([
            'card_number' => ['required', 'string', 'regex:/^[\d\s]{16,19}$/'],
            'expiry'      => ['required', 'string', 'regex:/^(0[1-9]|1[0-2])\/?([0-9]{2})$/'],
            'cvc'         => ['required', 'digits_between:3,4'],
        ], [
            'card_number.required' => 'Ingresá el número de tu tarjeta.',
            'card_number.regex'    => 'El número de tarjeta no es válido. Ingresá solo números.',
            'expiry.required'      => 'Ingresá la fecha de vencimiento.',
            'expiry.regex'         => 'El formato debe ser MM/AA (Ej: 12/28).',
            'cvc.required'         => 'Ingresá el código de seguridad.',
            'cvc.digits_between'   => 'El CVC debe tener 3 o 4 números.',
        ]);
        $order->update([
            'status' => 'paid'
        ]);

        return redirect()->route('checkout.success')
            ->with('success', '¡Pago procesado y aprobado con éxito!')
            ->with('orderCode', $order->code);
    }
}