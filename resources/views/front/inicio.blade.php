@extends('layouts.app')
@section('titulo', 'Inicio | Matiensos')


@section('content')

{{-- BANNER --}}
@include('front.inicio._banner')

{{-- CATEGORIAS --}}
<div class="container mt-3 mt-md-5">
    <h1 class="text-center mb-3 mb-md-5">Categorías</h1>

    <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
        @foreach($categories as $category)
            @include('front.inicio._card-category')
        @endforeach
    </div>
</div>

{{-- PRODUCTOS DESTACADOS --}}
<div class="container my-5">
    <h1 class="text-center mb-5">Productos Destacados</h1>

    <div id="carouselProductos" class="carousel slide carousel-ligth-theme" data-bs-interval="false">
        <div class="carousel-inner">
           @foreach($featuredProducts->chunk(4) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">                
                        @foreach($chunk as $product)
                            @include('front.inicio._card-product')
                        @endforeach          
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Controles --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</div>

{{--boton de ver mas prodcutos--}}
<div class="container text-center mb-5">
    <a href="{{ route('productos') }}" class="btn btn-custom ">Ver todos los productos</a>
</div>
{{--fin de boton de ver mas productos--}}

{{-- MODAL IMAGEN DEL BANNER --}}
@if(auth()->check() && auth()->user()->role_id == 1)
    @include('front.components.inicio._edit-banner')
    @include('front.components.inicio._create-banner')
@endif

@endsection