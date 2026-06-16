@extends('layouts.app')
@section('titulo', 'Todos los Productos | Matiensos')

@section('content')
<div class="container py-5">
    
    {{-- Encabezado y Buscador --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-3 mb-md-0">
            <h2 class="fw-bold text-dark m-0">Nuestro Catálogo</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <form action="{{ route('productos') }}" method="GET" class="d-flex justify-content-md-end">
                <div class="input-group" style="max-width: 350px;">
                    <input type="text" class="form-control" name="search" 
                           placeholder="Buscar por nombre..." 
                           value="{{ request('search') }}">
                    <button class="btn btn-color-matiensos text-white border-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    {{-- BotOn para limpiar la búsqueda --}}
                    @if(request('search'))
                        <a href="{{ route('productos') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Grilla --}}
    @if($products->count() > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
            @foreach($products as $product)
                    @include('front.inicio._card-product')
            @endforeach
        </div>
        
        {{-- Paginación --}}
        <x-_pagination :items="$products" label="productos" />

    @else
        <div class="text-center py-5">
            <i class="bi bi-search text-muted mb-3" style="font-size: 4rem;"></i>
            <h4 class="text-muted fw-bold">No encontramos productos que coincidan con "{{ request('search') }}"</h4>
            <a href="{{ route('productos') }}" class="btn btn-color-matiensos text-white mt-3">Ver todos los productos</a>
        </div>
    @endif

</div>
@endsection