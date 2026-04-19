@extends('layouts.app')
@section('titulo', 'Inicio | Matiensos') {{-- Titulo en el navegador de la pagina inicio --}}


@section('content')
<section>
    {{--Banner de inicio con carrusel de imágenes --}}
<section class="w-100">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/banner-1.0.svg') }}" class="d-block img-banner" alt="banner 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/banner-2.0.svg') }}" class="d-block img-banner" alt="banner 2">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
{{--Fin carousel--}}

{{-- Primer Sección de productos destacados con Carrusel --}}
<div class="container my-5">
    <h2 class="text-center mb-5">Productos Destacados</h2>

    <div id="carouselProductos" class="carousel slide" data-bs-interval="false">
        <div class="carousel-inner">
            
            {{-- GRUPO 1: Primeros 4 productos --}}
            <div class="carousel-item active">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    
                    {{-- Producto 1 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Mate Imperial">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                                <p class="card-text fw-bold text-success fs-4">$25.000</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 2 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Yerba Mate">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Yerba Mate Orgánica 1kg</h5>
                                <p class="card-text fw-bold text-success fs-4">$4.500</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 3 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Kit Selección">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Combo "El Campeón"</h5>
                                <p class="card-text fw-bold text-success fs-4">$45.000</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 4 (Ejemplo para completar la fila) --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Termo">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                                <p class="card-text fw-bold text-success fs-4">$32.000</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
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
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Mate Imperial">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                                <p class="card-text fw-bold text-success fs-4">$25.000</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 6 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Yerba Mate">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Yerba Mate Orgánica 1kg</h5>
                                <p class="card-text fw-bold text-success fs-4">$4.500</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 7 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Kit Selección">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Combo "El Campeón"</h5>
                                <p class="card-text fw-bold text-success fs-4">$45.000</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 8  --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Termo">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                                <p class="card-text fw-bold text-success fs-4">$32.000</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> {{-- Fin Row --}}
            </div>

        </div>

        {{-- Botones de navegación  --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev" style="width: 2%; filter: invert(1);">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next" style="width: 2%; filter: invert(1);">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
    

{{-- Fin productos destacados --}}

{{-- Segunda Sección de productos destacados con Carrusel --}}
<div class="container my-5">
    <h2 class="text-center mb-5">Productos en promo</h2>

    <div id="carouselProductos" class="carousel slide" data-bs-interval="false">
        <div class="carousel-inner">
            
            {{-- GRUPO 2: Primeros 4 productos --}}
            <div class="carousel-item active">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    
                    {{-- Producto 1 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Mate Imperial">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Mates</small>
                                <h5 class="card-title fw-bold">Mate Imperial de Calabaza</h5>
                                <p class="card-text fw-bold text-success fs-4">$4.500</p>
                                <p class="card-text text-secondary small">Calabaza forrada en cuero con virola de alpaca cincelada.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 2 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Yerba Mate">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Termos</small>
                                <h5 class="card-title fw-bold">Termo Stanley Clasico 1L</h5>
                                <p class="card-text fw-bold text-success fs-4">$12.500</p>
                                <p class="card-text text-secondary small">Estacionamiento natural de 24 meses. Sabor suave.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 3 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Kit Selección">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Bombillas</small>
                                <h5 class="card-title fw-bold">Bombilla de Alpaca Premium</h5>
                                <p class="card-text fw-bold text-success fs-4">$2.800</p>
                                <p class="card-text text-secondary small">Incluye termo, mate y bombilla con logo oficial AFA.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 4  --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Termo">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Accesorios</small>
                                <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                                <p class="card-text fw-bold text-success fs-4">$32.000</p>
                                <p class="card-text text-secondary small">Mantiene el agua caliente por 24hs. Resistente a golpes.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> {{-- Fin Row --}}
            </div> {{-- Fin Carousel Item --}}
                      {{-- GRUPO 2: ultimos 4 productos --}}
            <div class="carousel-item ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    
                    {{-- Producto 5 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Mate Imperial">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Mates</small>
                                <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                                <p class="card-text fw-bold text-success fs-4">$25.000</p>
                                <p class="card-text text-secondary small">Calabaza forrada en cuero con virola de alpaca cincelada.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 6 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Yerba Mate">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Yerbas</small>
                                <h5 class="card-title fw-bold">Yerba Mate Orgánica 1kg</h5>
                                <p class="card-text fw-bold text-success fs-4">$4.500</p>
                                <p class="card-text text-secondary small">Estacionamiento natural de 24 meses. Sabor suave.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 7 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Kit Selección">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Kits</small>
                                <h5 class="card-title fw-bold">Combo "El Campeón"</h5>
                                <p class="card-text fw-bold text-success fs-4">$45.000</p>
                                <p class="card-text text-secondary small">Incluye termo, mate y bombilla con logo oficial AFA.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Producto 8 --}}
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('img/produc1.png') }}" class="card-img-top p-2" alt="Termo">
                            <div class="card-body d-flex flex-column">
                                <small class="text-muted mb-2">Accesorios</small>
                                <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                                <p class="card-text fw-bold text-success fs-4">$32.000</p>
                                <p class="card-text text-secondary small">Mantiene el agua caliente por 24hs. Resistente a golpes.</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> {{-- Fin Row --}}
            </div>
           

        </div>

        {{-- Botones de navegación  --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev" style="width: 2%; filter: invert(1);">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next" style="width: 2%; filter: invert(1);">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
    
{{-- Fin productos destacados --}}

{{--boton de ver mas prodcutos--}}
<div class="container text-center ">
    <a href="{{ route('inicio') }}" class="btn btn-dark text-center">Ver todos los productos</a>
</div>
{{--fin de boton de ver mas productos--}}
{{-- Seccion Productos principales--}}

{{-- MATE--}}
<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

 <div class="card bg-dark text-white border-0 shadow-sm">
  <img src="img/mate.png" class="card-img" alt="Promoción de Mates" style="filter: brightness(0.6);">
  
  <div class="card-img-overlay d-flex flex-column justify-content-center text-center">
    <h5 class="card-title fw-bold fs-3">MATES</h5>
    <p class="card-text">La mejor calidad para tu ritual diario.</p>
    <a href="#" class="btn btn-outline-light mx-auto" style="width: fit-content;">Ver Colección</a>
  </div>
</div>
{{-- BOMBILLAS --}}
<div class="card bg-dark text-white border-0 shadow-sm">
  <img src="img/bombillas1.0.svg" class="card-img" alt="Promoción de Mates" style="filter: brightness(0.6);">
  
  <div class="card-img-overlay d-flex flex-column justify-content-center text-center">
    <h5 class="card-title fw-bold fs-3">BOMBILLAS</h5>
    <p class="card-text">La mejor calidad para tu ritual diario.</p>
    <a href="#" class="btn btn-outline-light mx-auto" style="width: fit-content;">Ver Colección</a>
  </div>
</div>
{{-- TERMOS --}}
<div class="card bg-dark text-white border-0 shadow-sm">
  <img src="img/termos1.0.svg" class="card-img" alt="Promoción de Mates" style="filter: brightness(0.6);">
  
  <div class="card-img-overlay d-flex flex-column justify-content-center text-center">
    <h5 class="card-title fw-bold fs-3">TERMOS</h5>
    <p class="card-text">La mejor calidad para tu ritual diario.</p>
    <a href="#" class="btn btn-outline-light mx-auto" style="width: fit-content;">Ver Colección</a>
  </div>
</div>

</div>
  </div>    


@endsection