@extends('layouts.app')
@section('title', 'Contacto - Matiensos')
@section('content')
<section class="container my-5 ">
    <!-- Título y descripción -->
    <div class="container text-center">
        <div class="row align-items-end">
            <h1 class="display-5">Siempre cerca tuyo</h1>
            <div class="mb-4 mx-auto bg-matiensos" style="width: 50px; height: 3px;"></div>
            <p class="fs-5 text-secondary lead">
                En Matiensos, no solo vendemos productos, sino que también construimos puentes de comunicación con nuestra comunidad. 
                Queremos que cada matero se sienta parte de esta gran familia, y para eso, estamos siempre dispuestos a escuchar tus dudas, sugerencias o simplemente charlar sobre el maravilloso mundo del mate.
            </p>
        </div>
    </div>

    <!-- Sección de contacto-primera card -->
<div class="container my-5">
  <div class="card shadow-sm border-0">
    <div class="card-body p-4">

      <div class="row">
        <div class="col-md-6 border-end">
  <h2 class="card-title mb-4">Escribinos</h2>


  {{-- Info de contacto --}}
  <a href="https://wa.me/543782547040" target="_blank" class="d-flex align-items-center gap-2 fs-5 pt-5 text-decoration-none text-dark">
  <i class="bi bi-whatsapp text-success"></i> 
  +54 9 3782 547040

</a>

  <p class="d-flex align-items-center gap-2 fs-5">
    <i class="bi bi-envelope fs-3 text-dark"></i> 
    matiensos@gmail.com
  </p>
</div>
        <div class="col-md-6 ">
        
          <form action="{{ route('pagina-en-construccion') }}" method="GET">
          
            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" placeholder="Juan Ezequiel" required autofocus>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="ejemplo@gmail.com"  required autofocus>
            </div>

            <div class="mb-3">
              <label class="form-label">Mensaje</label>
              <textarea name="mensaje" class="form-control" placeholder="Escribe tu mensaje aquí..." rows="4" autofocus></textarea>
            </div>
          
            <button type="submit" class="btn btn-custom w-100">
              Enviar Consulta
            </button>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>
{{-- Secccion- titular- razon social --}}
 <div class="container my-5">
    <div class="card h-100 border-0 shadow-sm p-4">
       <div class="card-body">

        <div class="row g-4 mb-5">

        <div class="col-md-6 border-end">  
          <h2 class="card-title mb-4">Información legal</h2>
          <p class="align-items-center  fs-5">Titular: Cecilia Grierson </p>
           
             <p class="align-items-center  fs-5">Nombre de la empresa: Matiensos</p>
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-center ">
              <p class="align-items-center  fs-5">Razon social: Matiensos S.R.L.</p>
             <p class="align-items-center  fs-5">Domicilio legal: Av. Las Heras 727, Corrientes</p>
         </div>
        </div>
          
    </div>
</div>

<!-- Sección de contacto-Tercera card -->
 <div class="container my-5">
  <div class="card shadow-sm border-0">
    <div class="card-body p-4">

      <div class="row">
 
        <div class="col-md-6 border-end">
  <h2 class="card-title mb-4">Seguinos</h2>

  <div class="d-flex flex-column gap-3 pt-5">

    <a href="{{route('pagina-en-construccion')}}" 
       class="d-flex align-items-center gap-3 text-decoration-none text-dark fs-5">
      <i class="bi bi-facebook fs-3 text-primary"></i>
      Facebook
    </a>

    <a href="{{route('pagina-en-construccion')}}" 
       class="d-flex align-items-center gap-3 text-decoration-none text-dark fs-5">
      <i class="bi bi-twitter-x fs-3"></i>
      Twitter
    </a>

    <a href="{{route('pagina-en-construccion')}}" 
       class="d-flex align-items-center gap-3 text-decoration-none text-dark fs-5">
      <i class="bi bi-instagram fs-3 text-danger"></i>
      Instagram
    </a>

  </div>
</div>

    
        <div class="col-md-6 ">
            <h3>Ubicación</h3>
            <p> Av. Las Heras 727, Corrientes</p>
            {{-- Aquí podrías pegar un iframe de Google Maps --}}
            <div class="ratio ratio-16x9">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696.635675682519!2d-60.51340591527992!3d-31.735793535689236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b44df4ab54b2f7%3A0x83fe20507c164918!2sMates%20Parana%20Matiensos!5e0!3m2!1ses-419!2sar!4v1776908044512!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
  </div>
</div>

    
        
</section>
@endsection