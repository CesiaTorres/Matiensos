{{-- Barra de BUSQUEDA y boton de FILTROS --}}
<div class="d-flex align-items-center gap-2">
    <form action="{{ route('admin.products') }}" method="GET" class="input-group input-group-sm" style="width: 300px;">      
        @if(request('stock_filter')){{-- Se mantiene la busqueda de los filtros --}}
            <input type="hidden" name="stock_filter" value="{{ request('stock_filter') }}">
        @endif       
        @if(request('stock_value'))
            <input type="hidden" name="stock_value" value="{{ request('stock_value') }}">
        @endif        
        @if(request('category_filter'))
            <input type="hidden" name="category_filter" value="{{ request('category_filter') }}">
        @endif

        {{-- Barra de Busqueda --}}
        <input type="text" name="search" class="form-control border-start-1 border-end-1" 
               placeholder="Buscar por nombre o código..." value="{{ request('search') }}">
        {{-- Boton busqueda --}}
        @if(request('search'))
            <a href="{{ route('admin.products') }}" class="btn btn-white bg-white border-start-1 border" title="Limpiar todo">
                <i class="bi bi-x-lg small"></i>
            </a>
        @else
            <button type="submit" class="btn btn-white bg-white border border-start-1" title="Buscar">
                <i class="bi bi-search"></i>
            </button> 
        @endif
        
    </form>

    {{-- Boton para aplicar Filtros --}}
    <button class="btn btn-sm btn-color-matiensos text-white d-flex align-items-center gap-1 position-relative" 
            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
        <i class="bi bi-funnel-fill"></i>
        <span>Filtros</span>
        @if(request('stock_filter') || request('category_filter') || request('stock_value')) {{-- notifica si hay filtros aplicados --}}
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        @endif
    </button>
</div>