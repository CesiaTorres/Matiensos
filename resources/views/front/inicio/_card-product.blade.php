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
                    <a href="{{ route('register') }}" class="btn btn-custom w-100">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Agregar al carrito
                    </a>
                @elseif(auth()->user()->role === 'admin' || auth()->user()->role === 'ADMIN' || auth()->user()->is_admin == 1 || auth()->user()->role_id == 1)
                    <button type="button" class="btn btn-secondary w-100 disabled" style="cursor: not-allowed; opacity: 0.7;">
                        <i class="bi bi-shield-lock me-2"></i> Vista de Admin
                    </button>
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
