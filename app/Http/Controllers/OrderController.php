<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Pedidos en el panel.
     */
    public function index()
    {
        $orders = Order::with('user')->latest('created_at')->paginate(10);
         
        $historicos = Order::count();
        $cancelados = Order::where('status', 'cancelled')->count();
        
        $metricsGlobals = [    
            'historicos' => $historicos,
            'cancelados' => $cancelados,   
            'entregados' => Order::where('status', 'delivered')->count(),
            'pendientes' => Order::where('status', 'pending')->count(),
            'pagados' => Order::where('status', 'paid')->count(),
            'enviados' => Order::where('status', ['paid', 'shipped'])->count(),
            'tasa_cancelacion' => $historicos > 0 ? round(($cancelados / $historicos) * 100, 1) : 0,
            
        ];
        
        $pedidosMesQuery = Order::whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year);
        $exitosos_mes = (clone $pedidosMesQuery)->whereIn('status', ['paid', 'delivered'])->count();
        $recaudacion_mes = (clone $pedidosMesQuery)->whereIn('status', ['paid', 'delivered'])->sum('total_amount');   

        $metrics = [            
            'pedidos_mes' => (clone $pedidosMesQuery)->count(),      
            'recaudacion_mes' => $recaudacion_mes,
            'exitosos_mes'     => $exitosos_mes,
            'ticket_promedio' => $exitosos_mes > 0 ? ($recaudacion_mes / $exitosos_mes) : 0,                   
        ];

        return view('admin.front.orders', compact('orders', 'metrics', 'metricsGlobals'));
    }

    /**
     * Detalle de un pedido específico.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);

        return view('admin.front.orderDetails', compact('order'));
    }

    /**
     * Actualiza el estado y el numero de seguimiento de un pedido.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status'          => 'required|in:pending,paid,shipped,delivered,cancelled',
            'tracking_number' => 'nullable|string|max:255',
        ]);
        $order->update([
            'status'          => $request->status,
            'tracking_number' => $request->tracking_number,
        ]);

        return back()->with('success', 'El estado del pedido se actualizó correctamente.');
    }

    /**
     * Vista para imprimir el ticket.
     */
    public function print(Order $order)
    {
        $order->load(['user', 'items.product']);
        return view('admin.front.orderPrint', compact('order'));
    }
}