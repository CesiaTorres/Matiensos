@extends('layouts.app')
@section('titulo', 'Inicio | Matiensos') {{-- Titulo en el navegador de la pagina inicio --}}


@section('content')
<section>
    {{--Banner de inicio con carrusel de imágenes --}}

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/banneroficial1.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/banner-2.png') }}" class="d-block w-100" alt="...">
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
{{--Fin carousel--}}

{{-- Seccion de productos destacados --}}
<div>
    <h2 class="text-start my-5 ">Productos Destacados</h2>
<div class="container my-5">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    {{-- Producto 1 --}}
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-mate.jpg" class="card-img-top" alt="Mate Imperial">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Mates</small>
          <h5 class="card-title">Mate Imperial Premium</h5>
          <p class="card-text fw-bold text-success fs-4">$25.000</p>
          <p class="card-text text-secondary small">Calabaza forrada en cuero con virola de alpaca cincelada.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Producto 2 --}}
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-yerba.jpg" class="card-img-top" alt="Yerba Mate">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Yerbas</small>
          <h5 class="card-title">Yerba Mate Orgánica 1kg</h5>
          <p class="card-text fw-bold text-success fs-4">$4.500</p>
          <p class="card-text text-secondary small">Estacionamiento natural de 24 meses. Sabor suave.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
{{-- Producto 3 --}}
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-kit-seleccion.jpg" class="card-img-top" alt="Kit Selección">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Kits</small>
          <h5 class="card-title">Combo "El Campeón"</h5>
          <p class="card-text fw-bold text-success fs-4">$45.000</p>
          <p class="card-text text-secondary small">Incluye termo, mate y bombilla con logo oficial AFA.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
{{-- Producto 4 --}}
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-bombilla.jpg" class="card-img-top" alt="Bombilla Pico Loro">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Bombillas</small>
          <h5 class="card-title">Bombilla Pico de Loro</h5>
          <p class="card-text fw-bold text-success fs-4">$8.200</p>
          <p class="card-text text-secondary small">Acero inoxidable quirúrgico, desarmable para limpieza.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
{{-- Producto 5 --}}
     <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-bombilla.jpg" class="card-img-top" alt="Bombilla Pico Loro">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Bombillas</small>
          <h5 class="card-title">Bombilla Pico de Loro</h5>
          <p class="card-text fw-bold text-success fs-4">$8.200</p>
          <p class="card-text text-secondary small">Acero inoxidable quirúrgico, desarmable para limpieza.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
{{-- Producto 6 --}}    
     <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-bombilla.jpg" class="card-img-top" alt="Bombilla Pico Loro">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Bombillas</small>
          <h5 class="card-title">Bombilla Pico de Loro</h5>
          <p class="card-text fw-bold text-success fs-4">$8.200</p>
          <p class="card-text text-secondary small">Acero inoxidable quirúrgico, desarmable para limpieza.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
{{-- Producto 7 --}}
     <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-bombilla.jpg" class="card-img-top" alt="Bombilla Pico Loro">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Bombillas</small>
          <h5 class="card-title">Bombilla Pico de Loro</h5>
          <p class="card-text fw-bold text-success fs-4">$8.200</p>
          <p class="card-text text-secondary small">Acero inoxidable quirúrgico, desarmable para limpieza.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
{{-- Producto 8 --}}
     <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="images/producto-bombilla.jpg" class="card-img-top" alt="Bombilla Pico Loro">
        <div class="card-body d-flex flex-column">
          <small class="text-muted mb-2">Bombillas</small>
          <h5 class="card-title">Bombilla Pico de Loro</h5>
          <p class="card-text fw-bold text-success fs-4">$8.200</p>
          <p class="card-text text-secondary small">Acero inoxidable quirúrgico, desarmable para limpieza.</p>
          <div class="mt-auto">
            <a href="#" class="btn btn-dark w-100">Agregar al carrito</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Fin productos destacados --}}

{{-- Seccion promos--}}

{{-- promo 1--}}
<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

 <div class="card bg-dark text-white border-0 shadow-sm">
  <img src="img/mate.png" class="card-img" alt="Promoción de Mates" style="filter: brightness(0.6);">
  
  <div class="card-img-overlay d-flex flex-column justify-content-end text-center">
    <h5 class="card-title fw-bold fs-3">MATES</h5>
    <p class="card-text">La mejor calidad para tu ritual diario.</p>
    <a href="#" class="btn btn-outline-light mx-auto" style="width: fit-content;">Ver Colección</a>
  </div>
</div>
{{-- Promo 2 --}}
<div class="card bg-dark text-white border-0 shadow-sm">
  <img src="img/mate.png" class="card-img" alt="Promoción de Mates" style="filter: brightness(0.6);">
  
  <div class="card-img-overlay d-flex flex-column justify-content-start text-center">
    <h5 class="card-title fw-bold fs-3">TERMOS</h5>
    <p class="card-text">La mejor calidad para tu ritual diario.</p>
    <a href="#" class="btn btn-outline-light mx-auto" style="width: fit-content;">Ver Colección</a>
  </div>
</div>
{{-- Promo 3 --}}
<div class="card bg-dark text-white border-0 shadow-sm">
  <img src="img/mate.png" class="card-img" alt="Promoción de Mates" style="filter: brightness(0.6);">
  
  <div class="card-img-overlay d-flex flex-column justify-content-center text-center">
    <h5 class="card-title fw-bold fs-3">KITS ARTESANALES</h5>
    <p class="card-text">La mejor calidad para tu ritual diario.</p>
    <a href="#" class="btn btn-outline-light mx-auto" style="width: fit-content;">Ver Colección</a>
  </div>
</div>

</div>
  </div>    


@endsection