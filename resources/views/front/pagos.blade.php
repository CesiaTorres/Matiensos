@extends('layouts.app')
@section('titulo', 'Medios de Pago | Matiensos')

@section('content')
<div class="container py-5">
    <section class="text-center mb-5">
        <h1 class="display-5">Medios de Pago</h1>
        <p class="text-muted">Elegí la forma de pago que más te convenga de manera segura.</p>
        <div class="mx-auto bg-matiensos" style="width: 50px; height: 3px;"></div>
    </section>

    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-credit-card-2-front fs-1 color-matiensos"></i>
                    </div>
                    <h5 class="fw-bold">Tarjetas de Crédito y Débito</h5>
                    <p class="text-secondary small">Aceptamos Visa, Mastercard, Maestro y Cabal a través de nuestra plataforma segura.</p>
                    <p class="fw-bold text-success color-matiensos">¡Hasta 3 cuotas sin interés!</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-bank fs-1 color-matiensos"></i>
                    </div>
                    <h5 class="fw-bold">Transferencia Bancaria</h5>
                    <p class="text-secondary small">Realizá tu pago vía CBU/Alias. Al finalizar la compra te enviaremos los datos para transferir.</p>
                    <div class="badge bg-light text-dark border">10% de Descuento</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-wallet2 fs-1 color-matiensos"></i>
                    </div>
                    <h5 class="fw-bold">Billeteras Virtuales</h5>
                    <p class="text-secondary small">Pagá de forma rápida con Mercado Pago o MODO usando tu saldo o tarjetas vinculadas.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-8">
            <div class="p-4 rounded-3 border d-flex align-items-center bg-light">
                <div class="me-4 d-none d-md-block">
                    <i class="bi bi-shield-lock-fill fs-1 text-muted"></i>
                </div>
                <div>
                    <h4 class="h6 fw-bold mb-1 text-uppercase text-muted">Compra Protegida</h4>
                    <p class="small mb-0 text-secondary">
                        Tus datos están encriptados con tecnología SSL de 256 bits. En <strong>Matiensos</strong> priorizamos tu seguridad financiera en cada transacción.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection