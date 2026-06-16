{{-- Archivo: front/inicio/_card-category.blade.php --}}
<div class="col d-flex justify-content-center">

    <div class="card card-categoria text-white border-0 w-100 shadow-sm" style="min-height: 250px; overflow: hidden;">
        
        {{-- Lógica unificada de imagen o placeholder --}}
        @if($category->image_url)
            <img src="{{ asset('storage/' . $category->image_url) }}"
                alt="{{ $category->name }}"
                class="card-img w-100 h-100" 
                style="object-fit: cover; min-height: 250px;">
        @else
            <div class="bg-light d-flex align-items-center justify-content-center w-100 h-100 border" style="min-height: 250px;">
                <i class="bi bi-tags text-secondary opacity-50" style="font-size: 4rem;"></i>
            </div>
        @endif

        {{-- Overlay con el título y el botón --}}
        <div class="card-img-overlay d-flex flex-column justify-content-end text-center align-items-center bg-dark bg-opacity-25 rounded">
            
            <h5 class="card-title fw-bold fs-3 text-white text-shadow">
                {{ strtoupper($category->name) }}
            </h5>

            <a href="{{ route('productos') }}#categoria-{{ $category->id }}"
                class="btn btn-categoria mt-2">
                Ver Colección
            </a>

        </div>

    </div>

</div>