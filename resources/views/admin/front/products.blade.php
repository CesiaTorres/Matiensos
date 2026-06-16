@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Productos | Matiensos')

@section('content')

{{-- VISTA PRINCIPAL DE PRODUCTOS --}}
<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo y boton para crear producto --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Productos</h2>
            </div>
            <button type="button" class="btn btn-color-matiensos text-white px-3 fw-bold"
                data-bs-toggle="modal"
                data-bs-target="#createProductModal">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Producto
            </button>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3">
            <div class="col-md-3 mb-3">
                <x-metric-card
                    title="Total Productos" value="{{ $metrics['total_products'] }}" icon="bi-box-seam" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card
                    title="Stock Critico" value="{{ $metrics['low_stock'] }}" icon="bi-exclamation-triangle" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card
                    title="Sin Stock" value="{{ $metrics['out_of_stock'] }}" icon="bi-cart-x" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card
                    title="Valor del Inventario" value="{{ number_format($metrics['inventory_value'], 0, ',', '.') }}" icon="bi-cash-coin" />
            </div>
        </div>

        {{-- Lista de Prod --}}
        <div class="row">
            <div class="col-9">
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Listado de Productos</h5>
                        @include('admin.front.components.products._search')
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            {{-- Encabezado --}}
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 110px;">Código</th>
                                    <th style="width: 90px;">Imagen</th>
                                    <th>Nombre/Descripción</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th class="text-base" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            {{-- Listado --}}
                            <tbody class="align-middle">
                                {{-- vacio --}}
                                @if($products->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        No hay productos para mostrar.
                                    </td>
                                </tr>
                                @else
                                {{-- con productos --}}
                                @foreach($products as $product)
                                <tr>
                                    <td class="fw-bold text-secondary">{{ $product->code }}</td>

                                    <td>
                                        @if($product->image_url)
                                            <img src="{{ asset("storage/$product->image_url") }}" 
                                                alt="{{ $product->name }}" class="rounded shadow-sm" 
                                                style="width: 45px; height: 45px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted shadow-sm" style="width: 45px; height: 45px;">
                                                <i class="bi bi-image small"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="fw-bold text-dark">{{ $product->name }}</div>
                                        @if($product->description)
                                        <small class="text-muted d-block text-truncate" style="max-width: 220px;">{{ $product->description }}</small>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="badge bg-light text-dark border px-2 py-1.5 small fw-semibold">
                                            {{ $product->category ? $product->category->name : 'Sin Categoría' }}
                                        </span>
                                    </td>

                                    <td class="fw-bold text-dark">${{ number_format($product->price, 0, ',', '.') }}</td>

                                    <td>
                                        @if($product->stock > 0)
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 fw-bold">
                                            {{ $product->stock }} un.
                                        </span>
                                        @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 fw-bold">
                                            Sin Stock
                                        </span>
                                        @endif
                                    </td>
                                    {{-- Acciones --}}
                                    <td>
                                        <div class="d-flex gap-2">
                                            {{-- Modificar --}}
                                            <button type="button" class="btn btn-sm btn-outline-secondary border-0"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $product->id }}"
                                                title="Editar Producto">
                                                <i class="bi bi-pencil-square fs-6"></i>
                                            </button>
                                            {{-- Eliminar --}}
                                            <button type="button" class="btn btn-sm btn-outline-danger border-0"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal{{ $product->id }}"
                                                title="Eliminar Producto">
                                                <i class="bi bi-trash3 fs-6"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{-- Navegación de productos --}}
                        <x-_pagination :items="$products" label="productos" />
                    </div>
                    @foreach($products as $product)
                    @include('admin.front.components.products._edit')
                    @include('admin.front.components.products._delete')
                    @endforeach
                </div>
            </div>
            {{-- Tabla informativa --}}
            <div class="col-3">
                <div class="card border-0 shadow-sm bg-white mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            Productos Estrellas
                        </h5>
                        <ul class="list-group list-group-flush mb-0 small">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                                <span class="">Mes Actual</span>
                                <div class="fw-bold text-end small">{{ $masVendidoMes ? $masVendidoMes->name : '-' }}
                                    @if($masVendidoMes)
                                    <div class="small text-success">{{ $masVendidoMes->total_sold }} vendidos</div>
                                    @endif
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                                <span class="text-muted">Historico</span>
                                <div class="fw-bold text-end small">
                                    {{ $masVendidoHistorico ? $masVendidoHistorico->name : '-' }}
                                    @if($masVendidoHistorico)
                                    <div class="small text-success">{{ $masVendidoHistorico->total_sold }} vendidos</div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('admin.front.components.products._create')
@include('admin.front.components.products._filters')
@include('admin.front.components._toast')
@include('admin.front.components.scripts')
@endsection