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
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7080.200537470057!2d-58.826259866732926!3d-27.46613759999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1776813762023!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection