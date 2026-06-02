@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Usuarios | Matiensos')

@section('content')

{{-- VISTA PRINCIPAL DE USUARIOS --}}
<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo y boton para crear categoria --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Usuarios</h2>
            </div>
            <button type="button" class="btn btn-color-matiensos text-white px-3 fw-bold" 
                    data-bs-toggle="modal" 
                    data-bs-target="#createCategoryModal">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Admin
            </button>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Total Categorias" value="----" icon="bi-grid" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Más Vendida" value="----" icon="bi-graph-up-arrow"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Menos Vendida" value="----" icon="bi-graph-down-arrow"/>
            </div>
        </div>

        {{-- Listado de Categorias --}}
        <div class="row">
            <div class="col-8">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Listado de Usuarios</h5>                      
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
                            
                            {{-- Usuarios de la tabla --}}
                            <tbody class="align-middle">
                                {{-- Lista vacía --}}
                                
                                    {{-- Lista con categorías --}}                          
                                    
                                            {{-- Acciones --}}
                                            <td>                                               
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Modificar --}}
                                                    <button type="button" class="btn btn-sm btn-outline-secondary border-0" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editCategoryModal" 
                                                            title="Editar Categoría">
                                                        <i class="bi bi-pencil-square fs-6"></i>
                                                    </button>
                                                    {{-- Eliminar --}}
                                                    <button type="button" class="btn btn-sm btn-outline-danger border-0" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#deleteCategoryModal" 
                                                            title="Eliminar Categoría">
                                                        <i class="bi bi-trash3 fs-6"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                   
                               
                            </tbody>
                        </table>                        
                    </div>
                    
                </div>
            </div>

            <div class="col-4">                
                <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold text-dark mb-4">Distribución del Catálogo</h5>
                            <canvas id="categoriasChart" style="max-height: 250px;"></canvas>                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@include('admin.front.components._toast')




@endsection