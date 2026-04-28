@extends('layouts.app')
@section('title', 'Contacto - Matiensos')

@section('content')
<div class="container pt-4 pb-5" id="contacto">
    <!-- Título y descripción -->
    <section class="text-center mb-5" >
        <div class="row justify-content-center">
            <h1 class="display-5">Siempre cerca tuyo</h1>
            <div class="mb-4 mx-auto bg-matiensos" style="width: 50px; height: 3px;"></div>
            <p class="text-secondary lead mx-auto">
                En Matiensos, no solo vendemos productos, sino que también construimos puentes de comunicación con
                nuestra comunidad.
                Queremos que cada matero se sienta parte de esta gran familia, y para eso, estamos siempre dispuestos a
                escuchar tus dudas, sugerencias o simplemente charlar sobre el maravilloso mundo del mate.
            </p>
        </div>
    </section>

    <!-- Sección de contacto-primera card -->
        <div class="card shadow-sm border-0 mb-5">
            <div class="card-body p-4 p-md-5">
                <div class="row">
                    {{-- Info de contacto --}}
                    <div class="col-md-6 border-end text-center text-md-start">
                        <h2 class="card-title mb-4">Escribinos</h2>
                        <a href="https://wa.me/3782456372" target="_blank"
                            class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 pt-md-3 text-decoration-none text-dark lead">
                            <i class="bi bi-whatsapp fs-5 text-success"></i>3782456372
                        </a>
                        <p class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 pt-md-3 lead">
                            <i class="bi bi-envelope fs-5 text-dark"></i>matiensos@gmail.com
                        </p>
                    </div>
                    {{-- Formulario de contacto --}}
                    <div class="col-md-6">
                        <form action="{{ route('pagina-en-construccion') }}" method="GET">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Juan Ezequiel"
                                    required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="ejemplo@gmail.com"
                                    required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mensaje</label>
                                <textarea name="mensaje" class="form-control" placeholder="Escribe tu mensaje aquí..."
                                    rows="4" autofocus></textarea>
                            </div>
                            <button type="submit" class="btn btn-custom w-100">
                                Enviar Consulta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <!-- Sección de contacto-segunda card -->
    <section class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    {{-- Info de redes sociales --}}
                    <div class="col-md-6 border-end">
                        <h2 class="card-title mb-4">Seguinos</h2>
                        <div class="d-flex flex-column gap-3 pt-md-2">
                            <a href="{{route('pagina-en-construccion')}}"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 text-decoration-none text-dark lead">
                                <i class="bi bi-facebook fs-5 text-primary"></i>
                                Facebook
                            </a>
                            <a href="{{route('pagina-en-construccion')}}"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 text-decoration-none text-dark lead">
                                <i class="bi bi-twitter-x fs-5"></i>
                                Twitter
                            </a>
                            <a href="{{route('pagina-en-construccion')}}"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 text-decoration-none text-dark lead">
                                <i class="bi bi-instagram fs-5 text-danger"></i>
                                Instagram
                            </a>
                        </div>
                    </div>
                    {{-- Info ubicacion --}}
                    <div class="col-md-6 ">
                        <h3>Ubicación</h3>
                        <p> Av. Las Heras 727, Corrientes</p>
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5005.905499395225!2d-58.84603663376136!3d-27.47829494733318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456c97299bfc51%3A0x8982b7ed9aeb855f!2sLas%20Heras%20727%2C%20W3400%20Corrientes!5e0!3m2!1ses!2sar!4v1777339190426!5m2!1ses!2sar" 
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection