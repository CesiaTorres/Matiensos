@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Categorias | Matiensos')

@section('content')

{{-- VISTA PRINCIPAL DE CATEGORIAS --}}
<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo y boton para crear categoria --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Categorias</h2>
            </div>
            <button type="button" class="btn btn-color-matiensos text-white px-3 fw-bold" 
                    data-bs-toggle="modal" 
                    data-bs-target="#createCategoryModal">
                <i class="bi bi-plus-circle me-2"></i> Nueva Categoria
            </button>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Total Categorias" value="{{ $metrics['total'] }}" icon="bi-grid" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Más Vendida" value="{{ $metrics['top_category'] }}" icon="bi-graph-up-arrow"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Menos Vendida" value="{{ $metrics['bottom_category'] }}" icon="bi-graph-down-arrow"/>
            </div>
        </div>

        {{-- Listado de Categorias --}}
        <div class="row">
            <div class="col-8">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Listado de Categorias</h5>                      
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            {{-- Encabezado de la tabla --}}
                            <thead class="table-light text-l">
                                <tr>
                                    <th>Nombre / Descripción</th>
                                    <th>Productos</th>
                                    <th>Stock Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            
                            {{-- Categorías de la tabla --}}
                            <tbody class="align-middle">
                                {{-- Lista vacía --}}
                                @if($categories->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            <i class="bi bi-collection fs-3 d-block mb-2"></i>
                                            No hay categorías para mostrar.
                                        </td>
                                    </tr>
                                @else 
                                    {{-- Lista con categorías --}}                          
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $category->name }}</div>
                                                @if($category->description)
                                                    <small class="text-muted d-block text-truncate" style="max-width: 200px;">{{ $category->description }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $category->products_count }}</div>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $category->products_sum_stock ?? 0 }}</div>
                                            </td>
                                            <td>
                                                @if($category->is_active)
                                                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 fw-bold">
                                                        Activa
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 fw-bold">
                                                        Inactiva
                                                    </span>
                                                @endif
                                            </td>
                                            {{-- Acciones --}}
                                            <td>                                               
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Modificar --}}
                                                    <button type="button" class="btn btn-sm btn-outline-secondary border-0" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editCategoryModal{{ $category->id }}" 
                                                            title="Editar Categoría">
                                                        <i class="bi bi-pencil-square fs-6"></i>
                                                    </button>
                                                    {{-- Eliminar --}}
                                                    <button type="button" class="btn btn-sm btn-outline-danger border-0" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#deleteCategoryModal{{ $category->id }}" 
                                                            title="Eliminar Categoría">
                                                        <i class="bi bi-trash3 fs-6"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-4">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Auditoria</h5>
                        
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            {{-- Encabezado de la tabla --}}
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Código</th>
                                    <th>Imagen</th>
                                    <th class="text-base" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            {{-- Productos de la tabla --}}
                            <tbody class="align-middle">
                                {{-- Lista vacia --}}
                               
                                {{-- Lista con productos --}}                          
                                   
                            </tbody>
                        </table>

                    </div>
                    @foreach ( $categories as $category )
                        @include('admin.front.components.categories._edit')
                        @include('admin.front.components.categories._delete')
                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.front.components.categories._create')
@include('admin.front.components._toast')
@include('admin.front.components.scripts')

@endsection