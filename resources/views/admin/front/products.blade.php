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
            <button type="button" class="btn btn-color-matiensos text-white px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#createProductModal">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Producto
            </button>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>
                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Total Productos</h6>
                            <h3 class="fw-bold m-0 text-dark">{{ $metrics['total_products'] }}</h3>
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
                            <h3 class="fw-bold m-0">{{ $metrics['stock']}} <span class="fs-6 fw-normal text-muted">unidades</span></h3>
                        </div>
                        <div class="bg-matiensos-light bg-opacity-10 p-3 rounded color-matiensos">
                            <i class="bi bi-archive fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
                    <div class="bg-matiensos" style="width: 6px;"></div>
                    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100">
                        <div>
                            <h6 class="text-muted text-uppercase fw-bold mb-2">Productos Sin Stock</h6>
                            <h3 class="fw-bold m-0">{{ $metrics['out_of_stock']}}</h3>
                        </div>
                        <div class="bg-secondary bg-opacity-10 p-3 rounded text-danger ">
                            <i class="bi bi-exclamation-octagon fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Listado de Productos --}}
        <div class="row">
            <div class="col-12">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Listado de Productos</h5>
                        @include('admin.front.components.products._search')
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            {{-- Encabezado de la tabla --}}
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Código</th>
                                    <th>Imagen</th>
                                    <th>Nombre/Descripción</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th class="text-base" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            {{-- Productos de la tabla --}}
                            <tbody class="align-middle">
                                {{-- Lista vacia --}}
                                @if($products->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            <i class="bi bi-box-open fs-3 d-block mb-2"></i>
                                            No hay productos para mostrar.
                                        </td>
                                    </tr>
                                @else 
                                {{-- Lista con productos --}}                          
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="fw-bold text-secondary">{{ $product->code }}</td>
                                            
                                            <td>
                                                @if($product->image_url)
                                                    <img src="{{ asset("storage/$product->image_url") }}" alt="{{ $product->name }}" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted shadow-sm" style="width: 45px; height: 45px;">
                                                        <i class="bi bi-image small"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <div class="fw-bold text-dark">{{ $product->name }}</div>
                                                @if($product->description)
                                                    <small class="text-muted d-block text-truncate" style="max-width: 250px;">{{ $product->description }}</small>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <span class="badge bg-light text-dark border px-2 py-1.5 small fw-semibold">
                                                    {{ $product->category ? $product->category->name : 'Sin Categoría' }}
                                                </span>
                                            </td>
                                            
                                            <td class="fw-bold text-dark">${{ number_format($product->price, 2, ',', '.') }}</td>    

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
                                        @include('admin.front.components.products._edit')
                                        @include('admin.front.components.products._delete')
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        {{-- Navegación de productos --}}
                        <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Navegación de productos">
                                <ul class="pagination m-0">                  
                                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->appends(request()->query())->previousPageUrl() }}">&laquo;</a>
                                    </li>                 
                                    @foreach ($products->appends(request()->query())->getUrlRange(1, $products->lastPage()) as $page => $url)
                                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a> {{-- href=".../productos?page=2">2< --}}
                                        </li>
                                    @endforeach
                                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $products->appends(request()->query())->nextPageUrl() }}">&raquo;</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@include('admin.front.components.products._create')
@include('admin.front.components.products._filters')

@endsection