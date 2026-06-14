<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Contact;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        $metricsOrders = [    
            'pendientes' => Order::where('status', 'pending')->count(),
            'latest_orders' => Order::with('user')->latest()->take(5)->get(),
        ];
        $pedidosMesQuery = Order::whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year);
        $exitosos_mes = (clone $pedidosMesQuery)->whereIn('status', ['paid', 'delivered', 'shipped'])->count();
        $recaudacion_mes = (clone $pedidosMesQuery)->whereIn('status', ['paid', 'delivered','shipped'])->sum('total_amount');   
        $ticket_promedio = $exitosos_mes > 0 ? ($recaudacion_mes / $exitosos_mes) : 0;

        $metricsContacts = [
            'sin_leer' => Contact::unread()->count(),
            'latest_contacts' => Contact::unread()->latest()->take(5)->get(),
        ];

        $metricsProducts = [
            'low_stock' => Product::where('stock', '>', 0)->where('stock', '<=', 5)->count(),
            'out_of_stock' => Product::where('stock', 0)->count(),
            'masVendidoMes' => Product::select('products.name', DB::raw('SUM(order_details.quantity) as total_sold'))
                ->join('order_details', 'products.id', '=', 'order_details.product_id')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->whereMonth('orders.created_at', now()->month)
                ->whereYear('orders.created_at', now()->year)
                ->whereIn('orders.status', ['paid', 'shipped', 'delivered'])
                ->groupBy('products.id', 'products.name')
                ->orderByDesc('total_sold')
                ->first()
        ];
        $metricsUsers = [
            'total_customer' => User::where('role_id', 2)->count(),
        ];

        $metricsCategories = [
            'top_category' => Category::withCount('products')->orderBy('products_count', 'desc')->first()->name ?? '--',
            'bottom_category' => Category::withCount('products')->orderBy('products_count', 'asc')->first()->name ?? '--',
        ];

        

        return view('admin.front.dashboard', 
            compact('metricsOrders', 'metricsCategories', 'metricsContacts', 'ticket_promedio', 'metricsProducts', 'metricsUsers'));
    }
}
