@extends('layouts.app')
@section('titulo', 'Mi Carrito | Matiensos')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-dark"><i class="bi bi-cart3 me-2 color-matiensos"></i>Detalle de tu Carrito</h2>

    @if(empty($cart))
        <div class="row">
            <div class="col-12 text-center py-5 bg-white shadow-sm rounded border border-light">
                <i class="bi bi-bag-x text-muted display-1 mb-3 d-block"></i>
                <h4 class="text-muted fw-bold">Tu carrito está vacío</h4>
                <p class="text-secondary mb-4">¡Tenemos un montón de mates y termos esperando por vos!</p>
                <a href="{{ url('/') }}" class="btn btn-color-matiensos text-white px-4 py-2 rounded-pill fw-bold">
                    Ir a la Tienda
                </a>
            </div>
        </div>
    @else
        {{-- Carrito con Productos --}}
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col" class="ps-4">Producto</th>
                                        <th scope="col" class="text-center">Precio</th>
                                        <th scope="col" class="text-center">Cantidad</th>
                                        <th scope="col" class="text-end">Subtotal</th>
                                        <th scope="col" class="text-center pe-4">Quitar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td class="ps-4 py-3">
                                                <div class="d-flex align-items-center">        
                                                    @if(!empty($item['image_url']))
                                                        <img src="{{ asset('storage/' . $item['image_url']) }}" 
                                                            alt="{{ $item['name'] }}" 
                                                            class="rounded shadow-sm object-fit-cover flex-shrink-0 me-3" 
                                                            style="width: 60px; height: 60px;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted shadow-sm flex-shrink-0 me-3" style="width: 60px; height: 60px;">
                                                            <i class="bi bi-image fs-5"></i>
                                                        </div>
                                                    @endif
                                                    
                                                    <div>
                                                        <h6 class="mb-0 fw-bold text-dark">{{ $item['name'] }}</h6>
                                                    </div>
        
                                                </div>
                                            </td>
                                            
                                            <td class="text-center">
                                                ${{ number_format($item['price'], 0, ',', '.') }}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-light text-dark border px-3 py-2 fs-6">
                                                    {{ $item['quantity'] }}
                                                </span>
                                                {{-- botones de + y - --}}


                                            </td>
                                            <td class="text-end fw-bold text-dark">
                                                ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                            </td>
                                            <td class="text-center pe-4">
                                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0" title="Eliminar">
                                                        <i class="bi bi-trash fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top-0 py-3 d-flex justify-content-between align-items-center">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                <i class="bi bi-trash3 me-1"></i> Vaciar Carrito
                            </button>
                        </form>
                        <a href="{{ url('/') }}" class="btn btn-link text-muted text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i> Seguir comprando
                        </a>
                    </div>
                </div>
            </div>

            {{-- Resumen de Compra --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm bg-light sticky-top" style="top: 2rem;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">Resumen de Compra</h5>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal productos</span>
                            <span class="fw-medium text-dark">${{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Envío</span>
                            <span class="text-success fw-medium">A calcular</span>
                        </div>

                        <hr class="text-muted">

                        <div class="d-flex justify-content-between mb-4 align-items-center">
                            <span class="fw-bold fs-5 text-dark">Total</span>
                            <span class="fw-bold fs-3 color-matiensos">${{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <a href="#" class="btn btn-color-matiensos text-white w-100 py-3 rounded-pill fw-bold fs-6 shadow-sm mb-2">
                            Iniciar Compra <i class="bi bi-lock-fill ms-1"></i>
                        </a>
                        <div class="text-center mt-3">
                            <i class="bi bi-shield-check text-success me-1"></i>
                            <small class="text-muted">Compra 100% segura</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection