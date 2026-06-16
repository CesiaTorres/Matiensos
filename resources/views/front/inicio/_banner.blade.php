{{-- BANNER --}}
<section class="w-100 carousel-banner position-relative">
    <div id="carouselExampleAutoplaying" class="carousel slide carousel-dark-theme" data-bs-ride="carousel">
        <div class="carousel-inner">

            @forelse($banner as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="hero-banner position-relative">

                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                        class="d-block w-100 img-banner"
                        style="height: 450px; object-fit: cover;"
                        alt="{{ $item->description ?? 'Banner Matiensos' }}">
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center w-100 border-bottom" style="height: 450px;">
                        <i class="bi bi-image text-secondary opacity-50" style="font-size: 5rem;"></i>
                    </div>
                    @endif

                    {{-- CONTROLES DE ADMINISTRADOR --}}
                    @if(auth()->check() && auth()->user()->role_id == 1)
                    {{-- 1. Botón para Editar el Banner Actual (Lápiz) --}}
                    <button class="btn btn-light btn-sm shadow position-absolute top-0 end-0 m-3 rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 40px; height: 40px; z-index: 10;"
                        data-bs-toggle="modal"
                        data-bs-target="#editBannerModal{{ $item->id }}"
                        title="Editar Banner">
                        <i class="bi bi-pencil-fill text-dark"></i>
                    </button>

                    {{-- Botón para Añadir un NUEVO Banner --}}
                    <button class="btn btn-light btn-sm shadow position-absolute rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 40px; height: 40px; z-index: 10; top: 16px; right: 70px;"
                        data-bs-toggle="modal"
                        data-bs-target="#createBannerModal"
                        title="Añadir Nuevo Banner">
                        <i class="bi bi-plus-lg text-dark"></i>
                    </button>
                    @endif

                    @if($item->description && auth()->check() && auth()->user()->role_id == 1)
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 px-4 py-2 mb-4"
                        style="backdrop-filter: blur(4px); width: fit-content; margin: 0 auto;">
                        <p class="mb-0 text-white fw-semibold fs-5">{{ $item->description }}</p>
                    </div>
                    @endif

                </div>
            </div>

            @empty
            <div class="carousel-item active">
                <div class="hero-banner position-relative bg-light d-flex flex-column align-items-center justify-content-center w-100 border-bottom" style="height: 450px;">
                    <i class="bi bi-images text-secondary opacity-25 mb-3" style="font-size: 6rem;"></i>
                    <h5 class="fw-bold text-muted text-uppercase tracking-wider">Espacio para Banner</h5>

                    @if(auth()->check() && auth()->user()->role_id == 1)
                    <button class="btn btn-color-matiensos text-white mt-3 px-4 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#createBannerModal">
                        <i class="bi bi-plus-circle me-2"></i>Crear Primer Banner
                    </button>
                    @endif
                </div>
            </div>
            @endforelse

        </div>

        {{-- Controles SOLO si hay mas de 1 banner --}}
        @if($banner->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
        @endif
    </div>
</section>