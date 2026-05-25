@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Productos | Matiensos')

@section('content')
<div class="row g-0">
    <div class="col-12 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Productos</h2>
                <small class="text-muted">Panel de control de inventario y catálogo</small>
            </div>
            <a href="#" class="btn btn-color-matiensos text-white px-3 fw-bold">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Producto
            </a>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>
                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Total Productos</h6>
                            <h3 class="fw-bold m-0 color-matiensos">48</h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>
                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Stock Total Físico</h6>
                            <h3 class="fw-bold m-0 color-matiensos">324 <span class="fs-6 fw-normal text-muted">unidades</span></h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-archive fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-secondary" style="width: 6px;"></div>
                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Productos Sin Stock</h6>
                            <h3 class="fw-bold m-0 text-secondary">3</h3>
                        </div>
                        <div class="bg-secondary bg-opacity-10 p-3 rounded text-secondary">
                            <i class="bi bi-exclamation-octagon fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-white p-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Listado de Productos</h5>
                        <div style="width: 300px;">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control border-start-0" placeholder="Buscar por nombre o código...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Imagen</th>
                                    <th>Nombre del Producto</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th class="text-end" style="width: 150px;">Acciones (ABM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('img/inicio/icon-mate-logo.png') }}" class="rounded bg-light" width="45" height="45" alt="Producto">
                                    </td>
                                    <td>
                                        <h6 class="m-0 fw-bold text-dark">Mate Camionero Premium</h6>
                                        <small class="text-muted">COD: MAT-001</small>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Mates</span></td>
                                    <td class="fw-bold color-matiensos">$18.500</td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success fw-bold">24 u.</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-light border text-primary" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-light border text-danger" title="Eliminar">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="m-0 fw-bold text-dark">Termo Media Manija 1L</h6>
                                        <small class="text-muted">COD: TER-042</small>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">Termos</span></td>
                                    <td class="fw-bold color-matiensos">$32.000</td>
                                    <td>
                                        <span class="badge bg-danger bg-opacity-10 text-danger fw-bold">0 u.</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-light border text-primary"><i class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-light border text-danger"><i class="bi bi-trash3"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection