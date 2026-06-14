@extends('layouts.app')
@section('titulo', 'Inicio | Matiensos')


@section('content')
{{--Banner de inicio con carrusel de imágenes --}}
<section class="w-100 carousel-banner">
    <div id="carouselExampleAutoplaying" class="carousel slide carousel-dark-theme" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/inicio/banner-1.0.svg') }}" class="d-block img-banner" alt="banner 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/inicio/banner-2.0.svg') }}" class="d-block img-banner" alt="banner 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
{{--Fin carousel--}}

{{-- Seccion Productos principales--}}


<div class="container mt-3 mt-md-5">
    <h1 class="text-center mb-3 mb-md-5">Categorías</h1>
    <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
        {{-- MATE--}}
        <div class="col d-flex justify-content-center">
            <div class="card card-categoria text-white border-0 ">
                <img src="{{ asset('img/products/mate.svg') }}" class="card-img h-100" alt="Promoción de Mates">

                <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center">
                    <h5 class="card-title fw-bold fs-3">MATES</h5>
                    <a href="{{ route('productos') }}#mates" class="btn btn-categoria">Ver Colección</a>
                </div>
            </div>
        </div>
        {{-- BOMBILLAS --}}
        <div class="col d-flex justify-content-center">
            <div class="card card-categoria text-white border-0 ">
                <img src="{{ asset('img/products/bombillas1.0.svg') }}" class="card-img h-100" alt="Promoción de Mates">

                <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center">
                    <h5 class="card-title fw-bold fs-3">BOMBILLAS</h5>
                    <a href="{{ route('productos') }}#bombillas" class="btn btn-categoria mx-auto">Ver Colección</a>
                </div>
            </div>
        </div>
        {{-- TERMOS --}}
        <div class="col d-flex justify-content-center">
            <div class="card card-categoria text-white border-0 ">
                <img src="{{ asset('img/products/termos1.0.svg') }}" class="card-img h-100" alt="Promoción de Mates">

                <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center">
                    <h5 class="card-title fw-bold fs-3">TERMOS</h5>
                    <a href="{{ route('productos') }}#termos" class="btn btn-categoria mx-auto">Ver Colección</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{ $featuredProducts->count() }}

@php
$firstGroup = $featuredProducts->take(4);
$secondGroup = $featuredProducts->slice(4, 4);
@endphp

<div class="container my-5">
    <h1 class="text-center mb-5">Productos Destacados</h1>

    <div id="carouselProductos" class="carousel slide carousel-ligth-theme" data-bs-interval="false">
        <div class="carousel-inner">

            {{-- Primer slide, primeros 4 productos--}}
            <div class="carousel-item active">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                    @foreach($firstGroup as $product)
                    <div class="col">
                        <div class="card card-producto h-100 shadow-sm border-0">

                            @if($product->image_url)
                            <img src="{{ asset('img/products/' . $product->image_url) }}"
                                class="card-img-top"
                                alt="{{ $product->name }}">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    {{ $product->name }}
                                </h5>

                                <p class="card-text fw-bold fs-4">
                                    ${{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('pagina-en-construccion') }}"
                                        class="btn btn-custom w-100">
                                        Agregar al carrito
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- Segundo slide, segundos 4 productos--}}
            @if($secondGroup->count())
            <div class="carousel-item">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                    @foreach($secondGroup as $product)
                    <div class="col">
                        <div class="card card-producto h-100 shadow-sm border-0">

                            @if($product->image_url)
                            <img src="{{ asset('img/products/' . $product->image_url) }}"
                                class="card-img-top"
                                alt="{{ $product->name }}">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    {{ $product->name }}
                                </h5>

                                <p class="card-text fw-bold fs-4">
                                    ${{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('pagina-en-construccion') }}"
                                        class="btn btn-custom w-100">
                                        Agregar al carrito
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif

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




@endsection