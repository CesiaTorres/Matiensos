@extends('layouts.app')
@section('titulo', 'Términos y Usos | Matiensos')


@section('content')
<div class="contaner my-5">
    {{-- Titulo y descripción --}}
     <section class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 text-center">
                <h1 class="display-5"> Términos y Condiciones de Uso</h1>
                <p class="text-muted"> Información legal sobre nuestros servicios, políticas y compromisos con el cliente.</p>
                <div class="mx-auto bg-matiensos" style="width: 50px; height: 3px;"></div>
            </div>
        </div>
    </section>
    {{-- Contenido informativo --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- Aviso legal gral --}}
            <section class="container">
                <h2 class="mb-3">Aviso Legal</h2>
                <p class="text-secondary">
                    Bienvenido a Matiensos. Al acceder y utilizar este sitio web, usted acepta cumplir con los términos 
                    descritos a continuación. Este sitio tiene como objetivo la comercialización de productos regionales 
                    y accesorios para el mate de alta calidad.
                </p>
            </section>
            {{-- Info en acordion --}}
            <section class="container">
                <div class="accordion accordion-flush shadow-sm rounded border" id="#terminos">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrivacidad">
                            Política de Privacidad
                        </button>
                    </h2>
                    <div id="collapsePrivacidad" class="accordion-collapse collapse" data-bs-parent="#terminos">
                        <div class="accordion-body text-secondary">
                            En Matiensos protegemos tus datos personales. La información solicitada en el registro (Nombre y Email) 
                            se utiliza exclusivamente para procesar tus pedidos y mejorar tu experiencia de compra. No compartimos 
                            datos con terceros bajo ninguna circunstancia.
                        </div>
                    </div>   
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVentas">
                            Garantías y Soporte Postventa
                        </button>
                    </h2>
                    <div id="collapseVentas" class="accordion-collapse collapse" data-bs-parent="#terminos">
                        <div class="accordion-body text-secondary">
                            <p><strong>Garantía:</strong> Todos nuestros productos cuentan con una garantía de 30 días por fallas 
                            de fabricación (ej. mates filtrados o termos con pérdida de vacío).</p>
                            <p><strong>Soporte:</strong> Ante cualquier duda, nuestro equipo de soporte está disponible vía WhatsApp, 
                            Email para guiarte en el curado del mate o el uso óptimo de tu termo.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas">
                            Formas de Entrega y Tiempos
                        </button>
                    </h2>
                    <div id="collapseEntregas" class="accordion-collapse collapse" data-bs-parent="#terminos">
                        <div class="accordion-body text-secondary">
                            Los tiempos de entrega varían según la zona: 24-48hs hábiles para Corrientes/Resistencia y hasta 8 días 
                            hábiles para el resto del país. El costo de envío se calcula al momento de la compra. Una vez despachado, 
                            recibirás un código de seguimiento por correo.
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection