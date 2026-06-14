@extends('admin.layouts.app-admin')
@section('titulo', 'Dashboard | Matiensos')

@section('content')

<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark fw-bold m-0">Dashboard General</h2>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Pedidos Pendientes" value="{{ $metricsOrders ['pendientes'] }}" icon="bi-clock-history" color=" text-warning"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Sin Leer" value="{{ $metricsContacts ['sin_leer'] }}" icon="bi-envelope-exclamation" color="text-primary"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Stock Critico" value="{{ $metricsProducts ['low_stock'] }}" icon="bi-exclamation-triangle"  color="text-danger" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Clientes" value="{{ $metricsUsers ['total_customer'] }}" icon="bi-person-x"/>
            </div>
        <div/>
        
        <div class="row">
            {{-- Ultimos pedidos --}}
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-dark m-0"><i class="bi bi-cart3 me-2 color-matiensos"></i>Últimos Pedidos</h5>
                        <a href="{{ route('admin.orders')}}" 
                            class="btn btn-sm btn-link text-decoration-none p-0 text-muted">Ver todas</a>
                
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-l">
                                    <tr>
                                        <th>Código</th>
                                        <th>Cliente</th>
                                        <th>Monto</th>
                                        <th class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @if($metricsOrders['latest_orders']->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">                                            
                                                No hay pedidos para mostrar.
                                            </td>
                                        </tr>
                                    @else 
                                        @foreach($metricsOrders['latest_orders'] as $order)
                                            <tr>
                                                <td class="text-muted">#{{ $order->code }}</td>
                                                <td class="fw-bold text-dark" style="max-width: 150px;">{{ $order->user->name ?? 'Consumidor Final' }} {{ $order->user->last_name ?? '' }}</td>
                                                <td>${{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <x-_order-status :status="$order->status" />
                                                </td>
                                            </tr>                                        
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ultimas consultas --}}
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-dark m-0"><i class="bi bi-envelope me-2 color-matiensos"></i>Consultas Pendientes</h5>
                        <a href="{{ route('admin.contacts', ['status_filter' => 'unread']) }}" 
                            class="btn btn-sm btn-link text-decoration-none p-0 text-muted">Ver todas</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-l">
                                    <tr>
                                        <th>Remitente</th>
                                        <th>Asunto</th>
                                        <th class="text-center">Tiempo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($metricsContacts['latest_contacts']->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">                                            
                                                No hay pedidos para mostrar.
                                            </td>
                                        </tr>
                                    @else 
                                        @foreach($metricsContacts['latest_contacts'] as $contact)
                                            <tr>
                                                <td class="fw-bold text-dark">{{ $contact->name }}</td>
                                                <td class="text-muted text-truncate" >{{ $contact->subject ?? 'Sin asunto' }}</td>
                                                <td class="text-center text-muted">
                                                    {{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Ticket Promedio Mensual" value="${{ number_format($ticket_promedio, 0, ',', '.') }}" icon="bi-box-seam" />
            </div>

            <div class="col-md-3">                
                <div class="card border-0 shadow-sm bg-white">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark text-muted text-uppercase">
                            <i class="bi bi-star-fill text-warning"></i> 
                            Producto del Mes</h6>
                        <div class="fw-bold small">{{ $metricsProducts ['masVendidoMes'] ? $metricsProducts ['masVendidoMes']->name : '-' }}
                            @if($metricsProducts ['masVendidoMes'])                                    
                                <div class="small text-success">{{ $metricsProducts ['masVendidoMes']->total_sold }} vendidos</div>
                            @endif                                    
                        </div>     
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Categoria Más   Vendida" value="{{ $metricsCategories['top_category']}}" icon="bi-graph-up-arrow"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Categoria Menos Vendida" value="{{ $metricsCategories['bottom_category'] }}" icon="bi-graph-down-arrow"/>
            </div>

             

            
        </div>
    </div>
</div>

@endsection