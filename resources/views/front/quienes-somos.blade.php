@extends('layouts.app')
@section('titulo', 'Quiénes Somos | Matiensos') {{-- Titulo en el navegador de la pagina inicio --}}


@section('content')
<section> {{-- Contenido informatiovo --}}
    <div class="container my-5">
        
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 text-center">
                <h1 class="mb-4 display-5">Nuestra Esencia</h1>
                <p class="fs-5 text-secondary">
                    Nacimos en el corazón de la UNNE, entre apuntes y termos compartidos. 
                    Entendemos que el mate no es solo una bebida, sino el compañero fiel de cada estudio, 
                    cada charla y cada nuevo proyecto.
                </p>
                <p class="fs-5 text-secondary">
                    En <strong>Matiensos</strong>, seleccionamos productos regionales que representan 
                    nuestra identidad: calidad artesanal, durabilidad y ese toque moderno que el matero de hoy busca.
                </p>
            </div>
        </div>

        <div class="row g-4 py-5 border-top border-bottom mb-5 text-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <i class="bi bi-heart-fill fs-1 color-matiensos"></i>
                </div>
                <h4 class="fw-bold">Pasión Regional</h4>
                <p class="small text-muted">Apoyamos a artesanos locales del NEA en cada pieza que ofrecemos.</p>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <i class="bi bi-shield-check fs-1 color-matiensos"></i>
                </div>
                <h4 class="fw-bold">Calidad Premium</h4>
                <p class="small text-muted">Productos diseñados para durar años, no solo temporadas.</p>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <i class="bi bi-people-fill fs-1 color-matiensos"></i>
                </div>
                <h4 class="fw-bold">Comunidad</h4>
                <p class="small text-muted">Creamos un espacio para que cada matero encuentre su estilo único.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <h3 class="fw-bold">El Equipo detrás del Termo</h3>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 bg-light shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                    <img src="{{ asset('img/staff/staff2.png') }}" 
                            class="rounded-circle mx-auto d-block mb-3 shadow-sm border-matiensos" 
                            alt="Foto 1"
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="fw-bold mb-1">Romero Luana</h5>
                        <p class="text-muted small">Operaciones & Estrategia Digital</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="card border-0 bg-light shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                        <img src="{{ asset('img/staff/staff1.png') }}" 
                            class="rounded-circle mx-auto d-block mb-3 shadow-sm border-matiensos" 
                            alt="Foto 1"
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="fw-bold mb-1">Torres Cesia</h5>
                        <p class="text-muted small">Producto & Calidad</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section> {{-- banner inferior --}}
    <div class="row">
        <div class="col-12 px-0">
            <img src="{{ asset('img/others-pages/pava_mate.jpg') }}" 
                 class="img-fluid w-100 rounded shadow-sm" 
                 alt="Ritual del mate en la naturaleza"
                 style="height: 400px; object-fit: cover;">
            
        </div>
    </div>
</section>


@endsection