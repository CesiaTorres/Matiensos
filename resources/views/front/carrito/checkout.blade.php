@extends('layouts.app')
@section('titulo', 'Finalizar Compra | Matiensos')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-dark"><i class="bi bi-shield-lock me-2 color-matiensos"></i>Finalizar Compra</h2>

    <div class="row g-5">
        {{-- Columna Izquierda: Formulario de Datos --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">Datos de Envío</h5>
                    
                    <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
                        @csrf
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="calle" class="form-label fw-medium">Calle <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('calle') is-invalid @enderror" 
                                    id="calle" name="calle" 
                                    value="{{ old('calle') }}" 
                                    placeholder="Ej: San Martín">
                                @error('calle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="altura" class="form-label fw-medium">Altura <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('altura') is-invalid @enderror" 
                                    id="altura" name="altura" 
                                    value="{{ old('altura') }}" 
                                    placeholder="Ej: 1550">
                                @error('altura')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="piso" class="form-label fw-medium">Piso/Dpto <span class="text-muted small">(Opcional)</span></label>
                                <input type="text" class="form-control @error('piso') is-invalid @enderror" 
                                    id="piso" name="piso" 
                                    value="{{ old('piso') }}" 
                                    placeholder="Ej: 3B">
                                @error('piso')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Boton confirmar --}}
                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-color-matiensos text-white py-3 rounded-pill fw-bold fs-5 shadow-sm">
                                Confirmar Pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Resumen  --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm bg-light sticky-top" style="top: 2rem;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">Tu Pedido</h5>
                    
                    <div class="mb-4">
                        @foreach($cart as $item)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-secondary rounded-pill me-2">{{ $item['quantity'] }}</span>
                                    <span class="text-dark">{{ $item['name'] }}</span>
                                </div>
                                <span class="fw-medium text-dark">${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>
                    
                    <hr class="text-muted">

                    <div class="d-flex justify-content-between mb-2 align-items-center">
                        <span class="fw-bold fs-5 text-dark">Total a Pagar</span>
                        <span class="fw-bold fs-3 color-matiensos">${{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection