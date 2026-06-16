{{-- TARJETA para mostrar un producto --}}
<div class="col">
    <div class="card card-producto h-100 shadow-sm border-0 overflow-hidden">

        <div class="card-img-top-container position-relative w-100" style="height: 200px; overflow: hidden;">
            @if($product->image_url)
                <img src="{{ asset('storage/' . $product->image_url) }}"
                    class="card-img-top w-100 h-100 img-product"
                    alt="{{ $product->name }}"
                    style="object-fit: cover;">
            @else
                <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center text-muted border-bottom">
                    <i class="bi bi-image text-secondary opacity-50" style="font-size: 2.5rem;"></i>
                </div>
            @endif
        </div>

        {{-- Cuerpo --}}
        <div class="card-body d-flex flex-column p-3">
            <h5 class="card-title fw-bold text-dark mb-2">{{ $product->name }}</h5>

            <p class="card-text fw-bold fs-4 text-dark mb-3">
                ${{ number_format($product->price, 0, ',', '.') }}
            </p>

            <div class="mt-auto">
                @if(!auth()->check())
                    <div class="text-center p-2 bg-light rounded border">
                        <small class="text-muted fw-semibold">
                            <i class="bi bi-info-circle me-1"></i> Inicia sesión para añadir al carrito
                        </small>
                    </div>
                @elseif(auth()->user()->role_id == 1)
                    <div class="text-center p-2 bg-secondary bg-opacity-10 rounded border">
                        <small class="text-secondary fw-bold text-uppercase tracking-wider">
                            <i class="bi bi-shield-lock me-1"></i> Vista de Admin
                        </small>
                    </div>
                @else
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-custom w-100">
                            <i class="bi bi-cart-plus me-2"></i> Agregar al carrito
                        </button>
                    </form>
                @endif
            </div>
        </div>

    </div>
</div>
