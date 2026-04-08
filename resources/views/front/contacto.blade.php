{{-- 1. "Llamamos" al diseño global (el que tiene el head, navbar y footer) --}}
@extends('layouts.app')

{{-- 2. Le pasamos el título específico para esta pestaña --}}
@section('title', 'Contacto - Matiensos')

{{-- 3. Aquí metemos el contenido real de la sección --}}
@section('content')
<section class="container my-5 ">
    <div class="row">
        <div class="col-md-6">
            <h2>Contacto</h2>
            <p>Si tenés dudas sobre los mates, completá el formulario.</p>
            
            <form action="/enviar-contacto" method="POST">
                @csrf {{-- ¡Importante! Laravel pide esto por seguridad en los formularios --}}
                
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea name="mensaje" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enviar Consulta</button>
            </form>
        </div>

        <div class="col-md-6">
            <h3>Ubicación</h3>
            <p>Ruta Nacional 12, Km 1030, Corrientes, Argentina.</p>
            {{-- Aquí podrías pegar un iframe de Google Maps --}}
            <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=..." allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
@endsection