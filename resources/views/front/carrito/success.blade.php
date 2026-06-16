@extends('layouts.app')
@section('titulo', '¡Pedido Confirmado! | Matiensos')

@section('content')
<div class="container py-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm py-5 px-4">
                <div class="mb-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                </div>
                
                <h2 class="fw-bold text-dark mb-3">¡Gracias por tu compra!</h2>
                <p class="text-muted fs-5 mb-4">Tu pedido ha sido procesado correctamente y ya estamos preparando tus mates.</p>
                
                @if(session('orderCode'))
                    <div class="bg-light rounded p-4 mb-4 d-inline-block w-100">
                        <span class="text-muted d-block mb-1">Código de tu pedido:</span>
                        <span class="fw-bold fs-3 text-dark">{{ session('orderCode') }}</span>
                    </div>
                @endif
                
                <p class="text-secondary small mb-5">
                    Nos pondremos en contacto con vos a la brevedad para coordinar los detalles del envío a la dirección ingresada.
                </p>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('inicio') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-medium">
                        <i class="bi bi-house-door me-2"></i>Volver al Inicio
                    </a>
                    <a href="{{ route('perfil_user') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-medium">
                        <i class="bi bi-person-circle me-2"></i>Ir a Mi Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection