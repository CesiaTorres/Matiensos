<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) {
            return view('front.profile.perfil_user', [
                'user' => $user,
                'orders' => null 
            ]);
        }

        $orders = Order::where('user_id', $user->id)
            ->latest()
            ->paginate(5);

        $totalOrders = Order::where('user_id', $user->id)->count();

        $ordersInProgress = Order::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'paid', 'shipped'])
            ->count();

        $ordersDelivered = Order::where('user_id', $user->id)
            ->where('status', 'delivered')
            ->count();

        return view('front.profile.perfil_user', compact(
            'user',
            'orders',
            'totalOrders',
            'ordersInProgress',
            'ordersDelivered'
        ));
    }

    /**
     * Muestra el detalle de una orden específica en el perfil del usuario.
     */
    public function showUserOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load(['items.product']);

        return view('front.profile.order_detail', compact('order'));
    }
}