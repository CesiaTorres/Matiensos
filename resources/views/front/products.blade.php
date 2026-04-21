@extends('layouts.app')
@section('titulo', 'Productos | Matiensos')

@section('content')
<section>
<div class="container my-5">

    {{-- ================= MATES ================= --}}
    <div id="mates">
        <h2 class="text-start mb-5">Mates</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

            {{-- Producto 1 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producM3.png') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                        <p class="card-text fw-bold fs-4">$25.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 2 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/product2M.avif') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                        <p class="card-text fw-bold fs-4">$25.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 3 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/prodcuM5.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Combo "El Campeón"</h5>
                        <p class="card-text fw-bold fs-4">$45.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 4 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producT2.svg') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                        <p class="card-text fw-bold fs-4">$32.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 5 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producM3.png') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                        <p class="card-text fw-bold fs-4">$25.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 6 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/prodcuM5.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Combo "El Campeón"</h5>
                        <p class="card-text fw-bold fs-4">$45.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 7 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producT2.svg') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                        <p class="card-text fw-bold fs-4">$32.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 8 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producT3.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Termo de Acero 1L</h5>
                        <p class="card-text fw-bold fs-4">$32.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- ================= BOMBILLAS ================= --}}
    <div id="bombillas" class="mt-5">
        <h2 class="text-start mb-5">Bombillas</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

            {{-- Producto 1 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 2 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB7.jpeg') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla Premium</h5>
                        <p class="card-text fw-bold fs-4">$6.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Producto 3 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 4 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- ================= TERMOS ================= --}}
    <div id="termos" class="mt-5">
        <h2 class="text-start mb-5">Termos</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

             {{-- Producto 1 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producT3.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Termo Acero Negro</h5>
                        <p class="card-text fw-bold fs-4">$35.000</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 2 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 3 --}}

            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 4 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Producto 5 --}}
            <div class="col">
                <div class="card card-producto h-100 shadow-sm border-0">
                    <img src="{{ asset('img/producB2.webp') }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de alpaca</h5>
                        <p class="card-text fw-bold fs-4">$4.500</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-custom w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</section>
@endsection