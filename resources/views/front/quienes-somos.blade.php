@extends('layouts.app')
@section('titulo', 'Quiénes Somos | Matiensos') {{-- Titulo en el navegador de la pagina inicio --}}


@section('content')
<section class="container my-5">
    <div class="row align-items-center">
        <h2 class="display-4 text-center">Nuestra Esencia</h2>
         <p class="lead text-center">
            Somos un dos estudiantes universitarias que transformamos nuestra pasión por el mate en un proyecto que conecta 
            tradición, calidad y comunidad en cada producto que ofrecemos.
         </p>
    </div>
   
    <div class="container my-5" >
        <div class="text-center mb-5">
            <h2 class="display-4 font-titles">Nuestro Propósito</h2>
            <p class="lead opacity-75">Lo que nos impulsa a mejorar cada mañana.</p>
        </div>

        <div class="row g-4 justify-content-center">
            {{-- Tarjeta: Misión --}}
            <div class="col-md-5">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-bullseye fs-1 text-success"></i>
                    </div>
                    <h3 class="h4 mb-3 font-titles">Nuestra Misión</h3>
                    <p class="text-muted">
                        Revalorizar la cultura matera ofreciendo productos artesanales de excelencia, 
                        conectando el trabajo de pequeños productores regionales con el hogar de cada argentino.
                    </p>
                </div>
            </div>

            {{-- Tarjeta: Visión --}}
            <div class="col-md-5">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-eye fs-1 text-success"></i>
                    </div>
                    <h3 class="h4 mb-3 font-titles">Nuestra Visión</h3>
                    <p class="text-muted">
                        Convertirnos en el referente nacional para el cebador exigente, 
                        siendo reconocidos por la calidad, la transparencia y el respeto por nuestras tradiciones.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection