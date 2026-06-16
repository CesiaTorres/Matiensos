@extends('layouts.app')
@section('titulo', 'Productos | Matiensos')

@section('content')

<section>
    <div class="container my-5">

        @foreach($categories as $category)

        <div id="categoria-{{ $category->id }}"
            class="{{ !$loop->first ? 'mt-5' : '' }}
            " style="scroll-margin-top: 120px" ;>

            <h2 class=" text-start mb-5">
                {{ $category->name }}
            </h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                @foreach($products->where('category_id', $category->id) as $product)

                <div class="col">
                    <div class="card card-producto h-100 shadow-sm border-0">

                        <div class="card-img-top-container position-relative w-100" style="height: 200px; overflow: hidden;">
                            @if($product->image_url && file_exists(storage_path('app/public/products/' . $product->image_url)))
                            {{-- CAPA 1: Intenta leer desde el Storage Oficial (storage/app/public/products/) --}}
                            <img src="{{ asset('storage/products/' . $product->image_url) }}"
                                class="card-img-top w-100 h-100"
                                alt="{{ $product->name }}"
                                style="object-fit: cover;">

                            @else
                            {{-- CAPA 2: Si el archivo físico no existe en NINGÚN lado, muestra el recuadro gris --}}
                            <div class="d-flex flex-column align-items-center justify-content-center bg-light text-muted w-100 h-100 rounded-top shadow-sm border"
                                style="background-color: #f8f9fa; min-height: 250px;">
                                <i class="bi bi-images text-secondary opacity-50" style="font-size: 3rem;"></i>
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

                                    <div class="mt-auto">
                                        {{-- 1. Evaluamos si es un visitante o un cliente común --}}
                                        @if(!auth()->check())
                                        <a href="{{ route('login') }}" class="btn btn-custom w-100">
                                            <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar sesión para comprar
                                        </a>

                                        {{-- CASO 2: Está logueado y es ADMINISTRADOR (Filtramos por descarte si tu BD usa admin, ADMIN o número) --}}
                                        @elseif(auth()->user()->role === 'admin' || auth()->user()->role === 'ADMIN' || auth()->user()->is_admin == 1 || auth()->user()->role_id == 1)
                                        <button type="button" class="btn btn-secondary w-100 disabled" style="cursor: not-allowed; opacity: 0.7;">
                                            <i class="bi bi-shield-lock me-2"></i> Vista de Admin
                                        </button>

                                        {{-- CASO 3: Si no es ninguno de los anteriores, es un cliente común logueado -> Puede comprar --}}
                                        @else
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-custom w-100">
                                                <i class="bi bi-cart-plus me-2"></i> Agregar al carrito
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                @endforeach

            </div>

        </div>

        @endforeach

    </div>
</section>

@endsection