@extends('layouts.app')
@section('titulo', 'Pago Seguro | Matiensos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h5 class="mb-0"><i class="bi bi-credit-card me-2"></i>Pago Seguro</h5>
                </div>
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <h6 class="text-muted text-uppercase mb-1">Total a Pagar</h6>
                        <h2 class="fw-bold color-matiensos">${{ number_format($order->total_amount, 0, ',', '.') }}</h2>
                        <span class="badge bg-warning text-dark">Orden: {{ $order->code }}</span>
                    </div>
                    
                    {{-- Formulario para ingresar datos de pago --}}
                    <form action="{{ route('checkout.processPayment', $order->code) }}" method="POST" 
                        autocomplete="off" onsubmit="">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="card_number" class="form-label text-dark small fw-medium">Número de Tarjeta</label>
                            <input type="text" class="form-control @error('card_number') is-invalid @enderror" 
                                id="card_number" name="card_number" 
                                value="{{ old('card_number') }}" 
                                placeholder="Ej: **** **** **** 4545" 
                                maxlength="19">
                            @error('card_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>                        

                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="expiry" class="form-label text-dark small fw-medium">Vencimiento</label>
                                <input type="text" class="form-control @error('expiry') is-invalid @enderror" 
                                    id="expiry" name="expiry" 
                                    value="{{ old('expiry') }}" 
                                    placeholder="MM/AA" 
                                    maxlength="5">
                                @error('expiry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-6">
                                <label for="cvc" class="form-label text-dark small fw-medium">CVC</label>
                                <input type="text" class="form-control @error('cvc') is-invalid @enderror" 
                                    id="cvc" name="cvc" 
                                    value="{{ old('cvc') }}" 
                                    placeholder="123" 
                                    maxlength="4">
                                @error('cvc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-color-matiensos text-white w-100 py-3 fw-bold fs-5 shadow-sm rounded-pill mt-3">
                            Aprobar Pago
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        //Automatizar la "barrita" del Vencimiento
        const expiryInput = document.getElementById('expiry');
        if (expiryInput) {
            expiryInput.addEventListener('input', function (e) {
                let cleaned = this.value.replace(/\D/g, '');
                
                if (cleaned.length > 2) {
                    this.value = cleaned.substring(0, 2) + '/' + cleaned.substring(2, 4);
                } else {
                    this.value = cleaned;
                }
            });
        }

        // Automatizar los espacios de la Tarjeta
        const cardInput = document.getElementById('card_number');
        if (cardInput) {
            cardInput.addEventListener('input', function (e) {
                let cleaned = this.value.replace(/\D/g, '');
                
                let formatted = cleaned.match(/.{1,4}/g);
                this.value = formatted ? formatted.join(' ') : cleaned;
            });
        }

    });
</script>