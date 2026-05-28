@extends('admin.layouts.app-admin')
@section('titulo', 'Dashboard | Matiensos')

@section('content')
<div class="row g-0">

    <div class="col-12 p-4">
        {{-- Titulo pagina --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark fw-bold m-0">Dashboard General</h2>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>

                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Pedidos Pendientes</h6>
                            <h3 class="fw-bold m-0 text-dark">5</h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-cart-dash fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>

                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Mensajes Nuevos</h6>
                            <h3 class="fw-bold m-0 text-dark">5</h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-envelope-open fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>

                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Stock Crítico</h6>
                            <h3 class="fw-bold m-0 text-dark">5</h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-exclamation-triangle fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>

                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Ventas del Mes</h6>
                            <h3 class="fw-bold m-0 text-dark">5</h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-cash-coin fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        <div/>
        
        {{-- Tabla "Ultimos Pedidos Recientes" --}}
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div class="card border-0 shadow-sm bg-white p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0"><i class="bi bi-list-stars me-2 text-success"></i>Últimos
                            Pedidos Recientes</h5>
                        <a href="#" class="btn btn-sm btn-outline-success">Ver todos</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nº Pedido</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th class="text-end">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">#1024</td>
                                    <td>Juan Pérez</td>
                                    <td class="fw-bold">$25.500</td>
                                    <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#1023</td>
                                    <td>María Luz</td>
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
            
            {{-- Tabla "Top 5 Más Vendidos" --}}
            <div class="col-lg-5 mb-4">
                <div class="card border-0 shadow-sm bg-white p-4 h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="bi bi-trophy me-2 text-warning"></i>Top 5 Más Vendidos
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <div>
                                <h6 class="m-0 fw-bold text-dark">Mate Camionero Premium</h6>
                                <small class="text-muted">Mates</small>
                            </div>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill">124 u.</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <div>
                                <h6 class="m-0 fw-bold text-dark">Termo Media Manija 1L</h6>
                                <small class="text-muted">Termos</small>
                            </div>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill">98 u.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection