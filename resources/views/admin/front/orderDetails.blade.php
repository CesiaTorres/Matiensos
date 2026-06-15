@extends('admin.layouts.app-admin')
@section('titulo', 'Detalle del Pedido | Matiensos')

@section('content')
<div class="container-fluid px-4 pt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            {{-- Boton volver --}}
            <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-color-matiensos border mb-2">
                <i class="bi bi-arrow-left me-1"></i> Volver a Pedidos
            </a>
            {{-- Pedido y estado --}}
            <h2 class="fw-bold text-dark m-0 d-flex align-items-center gap-3">
                Pedido #{{ $order->code }}
                <x-_order-status :status="$order->status" />
            </h2>
            <small class="text-muted">Fecha de compra: {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</small>
        </div>

        {{-- Botones de acción --}}
        <a href="{{ route('admin.orders.print', $order->id) }}" target="_blank" class="btn btn-color-matiensos fw-bold me-2">
            <i class="bi bi-printer me-2"></i> Imprimir Ticket
        </a>
    </div>

    <div class="row">
        {{-- Detalles de pedido --}}
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold text-dark mb-4">Productos del Pedido</h5>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Precio Unitario</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            {{-- ⬇️ CONTROL UNIFICADO PARA CARPETA PUBLIC_PATH ⬇️ --}}
                                            @if($item->product && $item->product->image_url && file_exists(public_path('img/products/' . $item->product->image_url)))
                                            <img src="{{ asset('img/products/' . $item->product->image_url) }}"
                                                alt="{{ $item->product->name }}"
                                                class="rounded shadow-sm me-3"
                                                style="width: 45px; height: 45px; object-fit: cover;">
                                            @elseif($item->product && $item->product->image_url && file_exists(storage_path('app/public/products/' . $item->product->image_url)))
                                            {{-- Caso de respaldo: Por si las dudas se subieron mediante el Storage enlazado --}}
                                            <img src="{{ asset('storage/products/' . $item->product->image_url) }}"
                                                alt="{{ $item->product->name }}"
                                                class="rounded shadow-sm me-3"
                                                style="width: 45px; height: 45px; object-fit: cover;">
                                            @else
                                            {{-- PLACEHOLDER: Si el archivo físico no existe en ningún lado --}}
                                            <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center border shadow-sm"
                                                style="width: 45px; height: 45px; background-color: #f8f9fa;">
                                                <i class="bi bi-images text-secondary opacity-50" style="font-size: 1.2rem;"></i>
                                            </div>
                                            @endif
                                            {{-- ⬆️ TERMINA EL BLOQUE DE CONTROL DE IMAGEN ⬆️ --}}

                                            <div>
                                                <div class="fw-bold text-dark">{{ $item->product->name ?? 'Producto Eliminado' }}</div>
                                                <small class="text-muted">Cod: {{ $item->product->code ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center text-muted">
                                        $ {{ number_format($item->unit_price, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center fw-bold text-dark">
                                        x{{ $item->quantity }}
                                    </td>
                                    <td class="text-end fw-bold text-dark">
                                        $ {{ number_format($item->unit_price * $item->quantity, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td colspan="3" class="text-end fw-bold text-dark">TOTAL DEL PEDIDO:</td>
                                    <td class="text-end fw-bold color-matiensos fs-5">
                                        $ {{ number_format($order->total_amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tarjetas --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-3">Datos del Cliente</h6>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-secondary bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-person text-dark fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark">{{ $order->user->name ?? 'Usuario Eliminado' }} {{ $order->user->last_name ?? '' }}</div>
                            <div class="text-muted small">{{ $order->user->email ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-3">Información de Envío</h6>
                    <div class="mb-3">
                        <small class="text-muted d-block fw-bold mb-1">DOMICILIO DE ENTREGA</small>
                        <div class="text-dark">
                            <i class="bi bi-geo-alt me-2 text-muted"></i>
                            {{ $order->shipping_address ?? 'Retiro en sucursal / Sin dirección' }}
                        </div>
                    </div>
                    @if($order->tracking_number)
                    <div class="mb-0">
                        <small class="text-muted d-block fw-bold mb-1">CÓDIGO DE SEGUIMIENTO</small>
                        <div class="fw-bold color-matiensos">
                            <i class="bi bi-upc-scan me-2 text-muted"></i>
                            {{ $order->tracking_number }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection