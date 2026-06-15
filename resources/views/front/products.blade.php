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

                        @if($product->image_url)
                        <img src="{{ asset('img/products/' . $product->image_url) }}"
                            class="card-img-top"
                            alt="{{ $product->name }}">
                        @else
                        <img src="{{ asset('img/products/sin-imagen.png') }}"
                            class="card-img-top"
                            alt="Sin imagen">
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

        @endforeach

    </div>
</section>

@endsection