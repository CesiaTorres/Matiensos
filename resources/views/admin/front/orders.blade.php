@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Pedidos | Matiensos')

@section('content')

{{-- VISTA PRINCIPAL DE PEDIDOS --}}
<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo--}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Pedidos</h2>
            </div>
            {{-- Boton exportar --}}
            
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Pedidos del Mes" value="{{ $metrics['pedidos_mes'] }}" icon="bi-box-seam" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Pedidos Pendientes" value="{{ $metricsGlobals['pendientes'] }}" icon="bi-clock-history"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Ticket Promedio Mensual" value="${{ number_format($metrics['ticket_promedio'], 0, ',', '.') }}" icon="bi-box-seam" />
            </div>
            <div class="col-md-3 mb-3">
                    <x-metric-card 
                        title="Recaudación Mensual" value="${{ number_format($metrics['recaudacion_mes'], 0, ',', '.') }}" icon="bi-cash-stack"/>
            </div>
        </div>
        
        <div class="row"> 
            <div class="col-8">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Listado de Ventas</h5> 
                        @include('admin.front.components.orders._search')                     
                    </div>
                    {{-- Tabla --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            {{-- Encabezado--}}
                            <thead class="table-light text-l">
                                <tr>
                                    <th>Ticket #</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>                            
                            {{-- Lista --}}
                            <tbody class="align-middle">
                                {{-- vacia --}}
                                @if($orders->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">                                            
                                            No hay pedidos para mostrar.
                                        </td>
                                    </tr>
                                @else 
                                    {{-- con pedidos --}}                          
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="fw-bold text-dark">#{{ $order->code }}</div>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $order->user->name ?? 'Usuario Eliminado' }} {{ $order->user->last_name ?? '' }}</div>
                                                <small class="text-muted d-block text-truncate" style="max-width: 150px;">{{ $order->user->email ?? 'N/A' }}</small>
                                            </td>
                                            <td>
                                                <div class="fw-semibold text-muted">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</div>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">$ {{ number_format($order->total_amount, 2, ',', '.') }}</div>
                                            </td>
                                            <td>
                                                <x-_order-status :status="$order->status" />
                                            </td>
                                            {{-- Acciones --}}
                                            <td>                                               
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Ver Detalle --}}
                                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary border-0" title="Ver Detalle completo">
                                                        <i class="bi bi-eye fs-6"></i>
                                                    </a>
                                                    {{-- Cambiar Estado --}}
                                                    <button type="button" class="btn btn-sm btn-outline-secondary border-0" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editStatusModal{{ $order->id }}" 
                                                            title="Actualizar Estado">
                                                        <i class="bi bi-pencil-square fs-6"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>                        
                    </div>
                    {{-- Navegacion de pedidos --}}
                    <x-_pagination :items="$orders" label="pedidos" />
                </div>
                @foreach ( $orders as $order )
                    @include('admin.front.components.orders._editStatus')
                @endforeach
            </div>

            {{-- Tabla informativa --}}
            <div class="col-4">                
                <div class="card border-0 shadow-sm bg-white mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3">Resumen Histórico</h5>
                        <ul class="list-group list-group-flush mb-0">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                                <span class="text-muted"><i class="bi bi-box2 me-2 text-dark"></i>Total Pedidos</span>
                                <span class="fw-bold text-dark">{{$metricsGlobals['historicos']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                                <span class="text-muted"><i class="bi bi-check2-circle me-2 color-matiensos"></i>Entregados con éxito</span>
                                <span class="fw-bold text-success"> {{ $metricsGlobals['entregados'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent border-bottom-0 pb-0">
                                <span class="text-muted"><i class="bi bi-x-circle me-2 text-danger"></i>Tasa de Cancelación</span>
                                <span class="fw-bold {{ 12 > 15 ? 'text-danger' : 'text-dark' }}">
                                    {{$metricsGlobals['tasa_cancelacion']}}%
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@include('admin.front.components.orders._filters')  
@include('admin.front.components._toast')
@include('admin.front.components.scripts')

@endsection