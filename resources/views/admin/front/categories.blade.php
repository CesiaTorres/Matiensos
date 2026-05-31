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
            <button type="button" class="btn btn-color-matiensos text-white px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <i class="bi bi-plus-circle me-2"></i> Nueva Categoria
            </button>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Total Categorias" value="--" icon="bi-grid" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Más Vendida" value="--" icon="bi-graph-up-arrow"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Menos Vendida" value="--" icon="bi-graph-down-arrow"/>
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
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Nombre</th>
                                    <th>Productos</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
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

                </div>
            </div>
        </div>
    </div>
</div>

@endsection