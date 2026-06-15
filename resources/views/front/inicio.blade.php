@extends('layouts.app')
@section('titulo', 'Inicio | Matiensos')


@section('content')
{{--Banner de inicio con carrusel de imágenes --}}
<section class="w-100 carousel-banner position-relative">
    <div id="carouselExampleAutoplaying" class="carousel slide carousel-dark-theme" data-bs-ride="carousel">

        <div class="carousel-inner">
            @foreach($banner as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                <div class="hero-banner position-relative">

                    @if($item->image && file_exists(public_path('img/inicio/' . $item->image)))
                    <img src="{{ asset('img/inicio/' . $item->image) }}"
                        class="d-block w-100 img-banner"
                        alt="{{ $item->name ?? 'banner' }}">
                    @else
                    {{-- Contenedor gris prolijo con ícono si la imagen no está físicamente subida --}}
                    <div class="d-flex flex-column align-items-center justify-content-center bg-secondary bg-opacity-10 w-100 text-muted border-bottom" style="height: 450px;">
                        <i class="bi bi-images text-secondary mb-2" style="font-size: 4rem; opacity: 0.3;"></i>
                        <h4 class="fw-bold m-0 text-uppercase tracking-wider fs-6 text-dark opacity-50">SIN IMAGEN</h4>

                    </div>
                    @endif

                    @if(Auth::check() && Auth::user()->role_id == 1)
                    <div class="carousel-caption d-none d-md-block bg-success bg-opacity-50 rounded-4 p-4 mb-4"
                        style="max-width: 500px; margin: 0 auto; backdrop-filter: blur(4px);">

                        <p class="mb-3 text-white fw-semibold fs-5">{{ $item->description }}</p>

                        <button class="btn btn-outline-light px-4" data-bs-toggle="modal" data-bs-target="#editBannerModal">
                            <i class="bi bi-pencil me-2"></i>Editar imagen
                        </button>

                    </div>
                    @endif
                </div>

            </div>
            @endforeach
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


{{-- Seccion Productos principales (Categorías) --}}
<div class="container mt-3 mt-md-5">
    <h1 class="text-center mb-3 mb-md-5">Categorías</h1>

    <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">

        @foreach($categories as $category)
        <div class="col d-flex justify-content-center">

            <div class="card card-categoria text-white border-0 w-100" style="min-height: 250px; overflow: hidden;">
                @if($category->image_url && file_exists(public_path('img/categories/' . $category->image_url)))
                <img src="{{ asset('img/categories/' . $category->image_url) }}"
                    class="card-img h-100"
                    style="object-fit: cover;"
                    alt="{{ $category->name }}">
                @else

                <div class="d-flex flex-column align-items-center justify-content-center bg-secondary bg-opacity-10 w-100 h-100 rounded text-muted"
                    style="min-height: 250px; background-color: #f8f9fa;">
                    <i class="bi bi-images text-secondary mb-2" style="font-size: 3.5rem; opacity: 0.3;"></i>
                    <span class="small fw-semibold text-uppercase tracking-wider mt-1" style="font-size: 0.7rem; color: #6c757d; opacity: 0.6;">Sin imagen</span>
                </div>
                @endif

                <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center bg-dark bg-opacity-25 rounded">

                    <h5 class="card-title fw-bold fs-3 text-white text-shadow">
                        {{ strtoupper($category->name) }}
                    </h5>

                    <a href="{{ route('productos') }}#categoria-{{ $category->id }}"
                        class="btn btn-categoria mt-2">
                        Ver Colección
                    </a>

                </div>

            </div>

        </div>
        @endforeach

    </div>
</div>
{{-- Fin productos principales --}}

{{--Inicio seccion productos destacados--}}

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

                            <div class="card-img-top-container position-relative w-100" style="height: 200px; overflow: hidden;">

                                {{-- Validamos si el campo tiene texto Y si el archivo físico realmente existe en el servidor --}}
                                @if($product->image_url && file_exists(public_path('img/products/' . $product->image_url)))
                                <img src="{{ asset('img/products/' . $product->image_url) }}"
                                    class="card-img-top w-100 h-100"
                                    alt="{{ $product->name }}"
                                    style="object-fit: cover;">
                                @else
                                {{-- Si el archivo no existe o el campo está vacío, dibuja el marcador de posición gris --}}
                                <div class="d-flex flex-column align-items-center justify-content-center bg-light text-muted w-100 h-100 rounded-top" style="background-color: #f8f9fa;">
                                    <i class="bi bi-box-seam text-secondary" style="font-size: 3rem; opacity: 0.5;"></i>
                                    <span class="small fw-semibold text-uppercase tracking-wider mt-2" style="font-size: 0.7rem; color: #6c757d;">Sin imagen</span>
                                </div>
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    {{ $product->name }}
                                </h5>

                                <p class="card-text fw-bold fs-4">
                                    ${{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <div class="mt-auto">

                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        {{-- Input oculto para que por defecto se agregue de a 1 unidad por click --}}
                                        <input type="hidden" name="quantity" value="1">

                                        <button type="submit" class="btn btn-custom w-100">
                                            <i class="bi bi-cart-plus me-2"></i>Agregar al carrito
                                        </button>
                                    </form>
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

                            <div class="card-img-top-container position-relative w-100" style="height: 200px; overflow: hidden;">

                                {{-- Validamos si el campo tiene texto Y si el archivo físico realmente existe en el servidor --}}
                                @if($product->image_url && file_exists(public_path('img/products/' . $product->image_url)))
                                <img src="{{ asset('img/products/' . $product->image_url) }}"
                                    class="card-img-top w-100 h-100"
                                    alt="{{ $product->name }}"
                                    style="object-fit: cover;">
                                @else
                                {{-- Si el archivo no existe o el campo está vacío, dibuja el marcador de posición gris --}}
                                <div class="d-flex flex-column align-items-center justify-content-center bg-light text-muted w-100 h-100 rounded-top" style="background-color: #f8f9fa;">
                                    <i class="bi bi-box-seam text-secondary" style="font-size: 3rem; opacity: 0.5;"></i>
                                    <span class="small fw-semibold text-uppercase tracking-wider mt-2" style="font-size: 0.7rem; color: #6c757d;">Sin imagen</span>
                                </div>
                                @endif
                            </div>

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

{{-- MODAL IMAGEN DEL BANNER --}}
<div class="modal fade" id="editBannerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Editar banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form action="{{ route('admin.banner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="text-center mb-4">

                        @if($item->image && file_exists(public_path('img/inicio/' . $item->image)))
                        <img src="{{ asset('img/inicio/' . $item->image) }}"
                            class="d-block w-100 img-banner rounded-3 mb-3 shadow-sm"
                            alt="{{ $item->name ?? 'banner' }}"
                            style="height: 150px; object-fit: cover;">
                        @else
                        <div class="hero-banner position-relative bg-light border-bottom d-flex align-items-center justify-content-center" style="height: 400px;">
                            <div class="text-center text-muted p-4">
                                <i class="bi bi-images text-secondary mb-2 d-block" style="font-size: 4rem; opacity: 0.3;"></i>
                                <h3 class="fw-bold m-0 text-uppercase tracking-wider fs-5 text-dark">Matiensos</h3>
                                <p class="small text-secondary mb-0">Espacio disponible para Banner Principal</p>
                            </div>
                        </div>
                        @endif

                        <div>
                            <input type="file" name="banner_image" class="form-control ">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label  d-block mb-3">Descripción del Banner</label>
                        <input type=" text" name="description" class="form-control" value="{{ $item->description }}">
                    </div>

                    <button type="submit" class="btn btn-color-matiensos text-white w-100 rounded-3 mt-3 fw-bold">
                        Guardar cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection