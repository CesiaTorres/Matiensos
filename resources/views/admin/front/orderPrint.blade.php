<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remito Pedido {{ $order->code }} - Matiensos</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; }
        .ticket-box { max-width: 800px; margin: 2rem auto; background: white; padding: 3rem; border: 1px solid #dee2e6; border-radius: 8px; }
                
        @media print {
            body { background-color: white; }
            .ticket-box { margin: 0; padding: 0; border: none; max-width: 100%; }
            .no-print { display: none; }
            @page { margin: 1.5cm; }
        }
    </style>
</head>

<body>
    <div class="ticket-box shadow-sm">
        {{-- Botones--}}
        <div class="mb-4 no-print">
            <button onclick="window.close()" class="btn btn-outline-secondary btn-sm">
                Cerrar pestaña
            </button>
            <button onclick="window.print()" class="btn btn-dark btn-sm ms-2">
                Imprimir
            </button>
        </div>

        {{-- Cabecera del Ticket --}}
        <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">MATIENSOS</h2>
            </div>
            <div class="text-end">
                <h3 class="text-uppercase text-secondary mb-1" style="letter-spacing: 2px;">Ticket</h3>
                <h5 class="fw-bold text-dark mb-0">#{{ $order->code }}</h5>
                <small class="text-muted">Fecha: {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</small>
            </div>
        </div>

        {{-- Datos del Cliente y Envío --}}
        <div class="row mb-5">
            <div class="col-6">
                <h6 class="fw-bold text-secondary border-bottom pb-2 mb-3">DATOS DEL CLIENTE</h6>
                <div class="fw-bold text-dark fs-5">{{ $order->user->name ?? 'Consumidor Final' }} {{ $order->user->last_name ?? '' }}</div>
                <div class="text-muted">{{ $order->user->email ?? '' }}</div>
            </div>
            <div class="col-6 text-end">
                <h6 class="fw-bold text-secondary border-bottom pb-2 mb-3">DATOS DE ENVÍO</h6>
                <div class="fw-bold text-dark fs-5">{{ $order->shipping_address ?? 'Retiro en Sucursal' }}</div>
                <div class="text-muted">Corrientes, Argentina</div>
            </div>
        </div>

        {{-- Tabla de Productos --}}
        <table class="table table-bordered border-dark align-middle mb-5 >
            <thead class="table-light border-dark">
                <tr>
                    <th class="text-center" style="width: 10%;">CANT.</th>
                    <th style="width: 50%;">DESCRIPCIÓN DEL PRODUCTO</th>
                    <th class="text-end" style="width: 20%;">P. UNITARIO</th>
                    <th class="text-end" style="width: 20%;">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td class="text-center fw-bold fs-5">{{ $item->quantity }}</td>
                    <td>
                        <div class="fw-bold">{{ $item->product->name ?? 'Producto Eliminado' }}</div>
                        <small class="text-muted">Código: {{ $item->product->code ?? 'N/A' }}</small>
                    </td>
                    <td class="text-end text-muted">$ {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                    <td class="text-end fw-bold">$ {{ number_format($item->unit_price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold fs-5 border-0 pt-4">TOTAL:</td>
                    <td class="text-end fw-bold fs-4 border-0 pt-4">$ {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        {{-- Pie del Ticket --}}
        <div class="text-center mt-5 pt-4 text-muted small">
            <p class="mb-0">¡Gracias por tu compra en Matiensos!</p>
        </div>
    </div>
    
</body>
</html>