@extends('layouts.app')
@section('titulo', 'Inicio | Matiensos') {{-- Titulo en el navegador de la pagina inicio --}}


@section('content')
    <section>
        {{--Banner de inicio con carrusel de imágenes --}}
        <section class="w-100 carousel-banner">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/banner-1.0.svg') }}" class="d-block" alt="banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/banner-2.0.svg') }}" class="d-block" alt="banner 2">
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


        <div class="container my-5">
            <h1 class="text-center mb-5">Categorías</h1>
            <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
                {{-- MATE--}}
                <div class="col d-flex justify-content-center">
                    <div class="card card-categoria text-white border-0 ">
                        <img src="img/mate.svg" class="card-img h-100" alt="Promoción de Mates">

                        <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center">
                            <h5 class="card-title fw-bold fs-3">MATES</h5>
                            <a href="{{ route('productos') }}#mates" class="btn btn-categoria">Ver Colección</a>
                        </div>
                    </div>
                </div>
                {{-- BOMBILLAS --}}
                <div class="col d-flex justify-content-center">
                    <div class="card card-categoria text-white border-0 ">
                        <img src="img/bombillas1.0.svg" class="card-img h-100" alt="Promoción de Mates">

                        <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center">
                            <h5 class="card-title fw-bold fs-3">BOMBILLAS</h5>
                            <a href="{{ route('productos') }}#bombillas" class="btn btn-categoria mx-auto">Ver Colección</a>
                        </div>
                    </div>
                </div>
                {{-- TERMOS --}}
                <div class="col d-flex justify-content-center">
                    <div class="card card-categoria text-white border-0 ">
                        <img src="img/termos1.0.svg" class="card-img h-100" alt="Promoción de Mates">

                        <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center">
                            <h5 class="card-title fw-bold fs-3">TERMOS</h5>
                            <a href="{{ route('productos') }}#termos" class="btn btn-categoria mx-auto">Ver Colección</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- Primer Sección de productos destacados con Carrusel --}}
        <div class="container my-5">
            <h1 class="text-center mb-5">Productos Destacados</h1>

            <div id="carouselProductos" class="carousel slide" data-bs-interval="false">
                <div class="carousel-inner">

                    {{-- GRUPO 1: Primeros 4 productos --}}
                    <div class="carousel-item active">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                            {{-- Producto 1 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/producM3.png') }}" class="card-img-top"
                                        alt="Mate Imperial Premium">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Mate Personalizado</h5>
                                        <p class="card-text fw-bold  fs-4">$25.000</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Producto 2 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top " alt="Yerba Mate">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                                        <p class="card-text fw-bold  fs-4">$4.500</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Producto 3 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/prodcuM5.webp') }}" class="card-img-top " alt="Kit Selección">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">"El Campeón"</h5>
                                        <p class="card-text fw-bold  fs-4">$45.000</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Producto 4 (Ejemplo para completar la fila) --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/producT2.svg') }}" class="card-img-top " alt="Termo">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                                        <p class="card-text fw-bold fs-4">$32.000</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- Fin Row --}}
                    </div> {{-- Fin Carousel Item --}}
                    {{-- GRUPO 1: ultimos 4 productos --}}
                    <div class="carousel-item ">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                            {{-- Producto 5 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/product2M.avif') }}" class="card-img-top" alt="Mate Imperial">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                                        <p class="card-text fw-bold fs-4">$25.000</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Producto 6 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/producT1.svg') }}" class="card-img-top " alt="Yerba Mate">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Termo militar 1L </h5>
                                        <p class="card-text fw-bold fs-4">$4.500</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Producto 7 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/productB4.jpg') }}" class="card-img-top " alt="Kit Selección">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Combo "6x5"</h5>
                                        <p class="card-text fw-bold fs-4">$45.000</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Producto 8 --}}
                            <div class="col">
                                <div class="card card-producto h-100 shadow-sm border-0">
                                    <img src="{{ asset('img/producT3.webp') }}" class="card-img-top " alt="Termo">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">Termo ATQM 1L</h5>
                                        <p class="card-text fw-bold fs-4">$32.000</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('pagina-en-construccion') }}"
                                                class="btn btn-custom  w-100">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- Fin Row --}}
                    </div>

                </div>

                {{-- Botones de navegación --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev"
                    style="width: 2%; filter: invert(1);">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next"
                    style="width: 2%; filter: invert(1);">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>


        {{--boton de ver mas prodcutos--}}
        <div class="container text-center mb-5">
            <a href="{{ route('productos') }}" class="btn btn-custom ">Ver todos los productos</a>
        </div>
        {{--fin de boton de ver mas productos--}}




@endsection