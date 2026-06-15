@section('content')

<div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="offcanvasCarrito" aria-labelledby="offcanvasCarritoLabel" style="width: 400px;">
    
    <div class="offcanvas-header bg-light border-bottom">
        <h5 class="offcanvas-title fw-bold text-dark" id="offcanvasCarritoLabel">
            <i class="bi bi-cart3 me-2 color-matiensos"></i>Tu Carrito
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    {{-- Cuerpo --}}
    <div class="offcanvas-body p-3">
        @php 
            $cartService = app(App\Services\CartService::class);
            $items = $cartService->getContent();
            $total = $cartService->getTotal();
        @endphp

        @if(empty($items))
            <div class="text-center py-5">
                <i class="bi bi-bag-x text-muted display-4 d-block mb-3"></i>
                <p class="text-muted fw-medium">Tu carrito está vacío.</p>
                <button type="button" class="btn btn-sm btn-color-matiensos text-white px-4 rounded-pill" data-bs-dismiss="offcanvas">
                    Seguir comprando
                </button>
            </div>
        @else
            {{-- Lista de Productos --}}
            <div class="d-flex flex-column gap-3 mb-4">
                @foreach($items as $item)
                    <div class="d-flex align-items-center bg-white p-2 rounded border shadow-sm">

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

                        <div class="flex-grow-1 ms-3" style="min-width: 0;">
                            <h6 class="text-dark fw-bold mb-0 text-truncate" style="font-size: 0.9rem;">{{ $item['name'] }}</h6>
                            <small class="text-secondary d-block">Cantidad: {{ $item['quantity'] }}</small>
                            <span class="fw-bold text-dark" style="font-size: 0.85rem;">
                                ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </span>
                        </div>
                        {{-- Eliminar --}}
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-link text-danger p-2" title="Quitar producto">
                                <i class="bi bi-trash3 fs-6"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            {{-- Resumen --}}
            <div class="mt-auto border-top pt-3 bg-white sticky-bottom">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary fw-medium fs-5">Total:</span>
                    <span class="text-dark fw-bold fs-4">${{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('cart') }}" class="btn btn-outline-secondary fw-bold py-2 w-100">
                        Ver Carrito
                    </a>
                    <a href="#" class="btn btn-color-matiensos text-white fw-bold py-2 w-100 shadow-sm">
                        Iniciar Compra <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>