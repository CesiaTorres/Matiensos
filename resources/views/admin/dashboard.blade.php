@extends('admin.layouts.app-admin')
@section('titulo', 'Dashboard | Matiensos')

@section('content')
<div class="container-fluidl">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark fw-bold m-0">Dashboard General</h2>
        <span class="badge bg-success p-2 fs-6">Modo Operativo</span>
    </div>

    <div class="row mb-4">
        
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100 border-start border-warning border-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase fs-7 fw-bold">Pedidos Pendientes</h6>
                        <h3 class="fw-bold m-0 text-dark">5</h3> {{-- Número harcodeado por ahora --}}
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded text-warning">
                        <i class="bi bi-cart-dash fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100 border-start border-primary border-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase fs-7 fw-bold">Mensajes Nuevos</h6>
                        <h3 class="fw-bold m-0 text-dark">3</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded text-primary">
                        <i class="bi bi-envelope-open fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100 border-start border-danger border-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase fs-7 fw-bold">Stock Crítico</h6>
                        <h3 class="fw-bold m-0 text-dark">2</h3>
                    </div>
                    <div class="bg-danger bg-opacity-10 p-3 rounded text-danger">
                        <i class="bi bi-exclamation-triangle fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm bg-white p-3 h-100 border-start border-success border-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted text-uppercase fs-7 fw-bold">Ventas del Mes</h6>
                        <h3 class="fw-bold m-0 text-dark">$145.200</h3>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded text-success">
                        <i class="bi bi-cash-coin fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm bg-white p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark m-0"><i class="bi bi-list-stars me-2 text-success"></i>Últimos Pedidos Recientes</h5>
                    <a href="#" class="btn btn-sm btn-outline-success">Ver todos los pedidos</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nº Pedido</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th class="text-end">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Fila de prueba 1 --}}
                            <tr>
                                <td class="fw-bold">#1024</td>
                                <td>Juan Pérez</td>
                                <td>Hoy, 14:30</td>
                                <td class="fw-bold">$25.500</td>
                                <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                            {{-- Fila de prueba 2 --}}
                            <tr>
                                <td class="fw-bold">#1023</td>
                                <td>María Luz</td>
                                <td class="text-muted">Ayer, 18:15</td>
                                <td class="fw-bold">$42.000</td>
                                <td><span class="badge bg-success">Pagado</span></td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection