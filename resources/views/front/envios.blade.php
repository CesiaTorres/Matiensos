@extends('layouts.app')
@section('titulo', 'Envíos y Entregas | Matiensos')

@section('content')
<div class="container py-5">
    
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Envíos y Entregas</h1>
        <p class="text-muted">Hacemos llegar tu ritual matero a cualquier punto del país.</p>
        <div class="mx-auto bg-matiensos" style="width: 50px; height: 3px;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="card-body">
                            <h5 class="fw-bold">Envío a Domicilio</h5>
                            <p class="text-secondary">Trabajamos con Correo Argentino y Andreani. Recibí tu pedido en la puerta de tu casa con seguimiento online.</p>
                            <span class="badge bg-light text-dark border">Todo el país</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="card-body">
                            <h5 class="fw-bold">Retiro en Punto de Venta</h5>
                            <p class="text-secondary">Podés retirar sin costo en nuestro showroom en Corrientes Capital. Te avisaremos cuando tu mate esté listo.</p>
                            <span class="badge bg-light text-dark border">Sin costo</span>
                        </div>
                    </div>
                </div>
            </div>

            <section class="bg-white p-4 rounded shadow-sm mb-5">
                <h4 class="fw-bold mb-4 border-bottom pb-2">Plazos Estimados</h4>
                <div class="row text-center">
                    <div class="col-4">
                        <p class="fw-bold mb-0">Corrientes y Resistencia</p>
                        <p class="small text-muted">24 a 48 hs hábiles</p>
                    </div>
                    <div class="col-4 border-start border-end">
                        <p class="fw-bold mb-0">Resto del NEA</p>
                        <p class="small text-muted">3 a 5 días hábiles</p>
                    </div>
                    <div class="col-4">
                        <p class="fw-bold mb-0">Resto del País</p>
                        <p class="small text-muted">5 a 8 días hábiles</p>
                    </div>
                </div>
            </section>

            <section>
                <h4 class="fw-bold mb-4 text-center">Preguntas Frecuentes</h4>
                <div class="accordion accordion-flush shadow-sm " id="envios">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta1">
                                ¿Cómo realizo el seguimiento de mi pedido?
                            </button>
                        </h2>
                        <div id="pregunta1" class="accordion-collapse collapse" data-bs-parent="#envios">
                            <div class="accordion-body text-secondary">
                                Una vez despachado, recibirás un mail con el número de tracking y el link para seguir el paquete en tiempo real.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta2">
                                ¿Qué pasa si no estoy en mi domicilio?
                            </button>
                        </h2>
                        <div id="pregunta2" class="accordion-collapse collapse" data-bs-parent="#envios">
                            <div class="accordion-body text-secondary">
                                El correo realiza dos visitas. Si no logra concretar la entrega, el paquete permanecerá en la sucursal más cercana por 5 días antes de ser devuelto.
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
@endsection