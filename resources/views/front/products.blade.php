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
                            @if($product->image_url && file_exists(public_path('img/products/' . $product->image_url)))
                            <img src="{{ asset('img/products/' . $product->image_url) }}"
                                class="card-img-top w-100 h-100"
                                alt="{{ $product->name }}"
                                style="object-fit: cover;">
                            @else
                            {{-- PLACEHOLDER: Ícono de Bootstrap para productos sin imagen --}}
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

        @endforeach

    </div>
</section>

@endsection