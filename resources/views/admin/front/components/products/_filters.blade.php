{{-- OFFCANVAS para FILTRAR PRODUCTOS --}}
<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
    {{-- Encabezado del panel deslizante --}}
    <div class="offcanvas-header bg-light border-bottom">
        <h5 class="offcanvas-title fw-bold text-dark" id="offcanvasFiltersLabel">
            <i class="bi bi-sliders me-2 color-matiensos"></i>Filtros Avanzados
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    {{-- Cuerpo del panel deslizante--}}
    <div class="offcanvas-body p-4">
        <form action="{{ route('admin.products') }}" method="GET">        
            @if(request('search'))  {{-- Se mantiene la busqueda de la barra --}}
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif
            {{-- Stock --}}
            <div class="mb-4">             
                <label class="form-label fw-bold small uppercase text-tracking mb-3">Gestión de Stock</label>          
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="stock_filter" id="filterNoStock" value="no_stock"
                           {{ request('stock_filter') == 'no_stock' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterNoStock">
                        Sin Stock (En cero)
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="stock_filter" id="filterLowStock" value="low_stock"
                           {{ request('stock_filter') == 'low_stock' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterLowStock">
                        Stock Crítico (5 un. o menos)
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="stock_filter" id="filterCustomStock" value="custom"
                            {{ request('stock_filter') == 'custom' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterCustomStock">
                        Filtrar por cantidad personalizada:
                    </label>
                    <div class="input-group input-group-sm mt-2">
                        <span class="input-group-text bg-white text-muted">Stock mayor que:</span>
                        <input type="number" name="stock_value" class="form-control" min="0" placeholder="Ej: 10"
                            value="{{ request('stock_value') }}">
                    </div>
                </div>
                    
            </div>

            <hr class="text-muted opacity-25 my-4">

            {{-- Categorias --}}
            <div class="mb-4">
                <label class="form-label fw-bold small uppercase text-tracking mb-3">Categorías de Productos</label>      
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="category_filter" id="filterAllCat" value=""
                           {{ !request('category_filter') ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterAllCat">
                        Ver todas las categorías
                    </label>
                </div>
                @foreach($categories as $category)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="category_filter" id="filterCat{{ $category->id }}" value="{{ $category->id }}"
                               {{ request('category_filter') == $category->id ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="filterCat{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            {{-- Botones --}}
            <div class="d-grid gap-2 mt-5">
                <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2 shadow-sm">
                    Aplicar Filtros
                </button>
                @if(request('stock_filter') || request('category_filter') || request('stock_value'))
                    <a href="{{ route('admin.products') }}" class="btn btn-light border py-2 text-muted small">
                        Limpiar todos los filtros
                    </a>
                @endif
            </div>

        </form>
    </div>
</div>