<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Traemos clientes y productos que ya existen en tu BD
        $clientes = User::where('role_id', 2)->get();
        $productos = Product::all();

        // Chequeo de seguridad: si no hay clientes o productos, no podemos hacer pedidos
        if ($clientes->isEmpty() || $productos->isEmpty()) {
            return;
        }

        // Definimos 5 pedidos de prueba con distintos estados y fechas 
        // para que se reflejen en tus tarjetas de "Este Mes" vs "Históricos"
        $pedidosPrueba = [
            [
                'status' => 'pending',
                'created_at' => Carbon::now(), // Este mes
                'shipping_address' => 'San Martín 1540, Corrientes',
            ],
            [
                'status' => 'paid',
                'created_at' => Carbon::now()->subDays(2), // Este mes
                'shipping_address' => 'Junín 850, Corrientes',
            ],
            [
                'status' => 'cancelled',
                'created_at' => Carbon::now()->subDays(5), // Este mes
                'shipping_address' => 'Retira por sucursal',
            ],
            [
                'status' => 'delivered',
                'created_at' => Carbon::now()->subMonths(2), // Histórico (Hace 2 meses)
                'shipping_address' => 'Av. 3 de Abril 1200, Corrientes',
            ],
            [
                'status' => 'shipped',
                'created_at' => Carbon::now()->subMonths(1), // Histórico (Hace 1 mes)
                'shipping_address' => 'Mendoza 950, Corrientes',
            ]
        ];

        foreach ($pedidosPrueba as $indice => $datosPedido) {
            // Elegimos de 1 a 3 productos al azar para este pedido
            $productosComprados = $productos->random(rand(1, 3));
            $totalMonto = 0;

            // 1. Creamos la cabecera del pedido (Order)
            $order = Order::create([
                'user_id' => $clientes->random()->id,
                'status' => $datosPedido['status'],
                'total_amount' => 0, // Lo actualizamos enseguida
                'shipping_address' => $datosPedido['shipping_address'],
                'tracking_number' => 'MAT-000' . ($indice + 1) . rand(100, 999),
                'created_at' => $datosPedido['created_at'],
                'updated_at' => $datosPedido['created_at'],
            ]);

            // 2. Creamos los detalles de ese pedido (order_details)
            foreach ($productosComprados as $producto) {
                $cantidad = rand(1, 2);
                $precioCongelado = $producto->price;
                $subtotal = $precioCongelado * $cantidad;
                
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'product_id' => $producto->id,
                    'quantity' => $cantidad,
                    'unit_price' => $precioCongelado,
                    'created_at' => $datosPedido['created_at'],
                    'updated_at' => $datosPedido['created_at'],
                ]);

                $totalMonto += $subtotal;
            }

            // 3. Actualizamos el monto total real en la cabecera
            $order->update(['total_amount' => $totalMonto]);
        }
    }
}