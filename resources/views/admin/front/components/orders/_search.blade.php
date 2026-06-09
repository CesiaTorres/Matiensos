{{-- Barra de BUSQUEDA y boton de FILTROS --}}
<div class="d-flex align-items-center gap-2">
    <form action="{{ route('admin.orders') }}" method="GET" class="input-group input-group-sm" style="width: 300px;">      
        {{-- Mantiene filtros activos --}}
        @if(request('status_filter')) <input type="hidden" name="status_filter" value="{{ request('status_filter') }}"> @endif       
        @if(request('date_from')) <input type="hidden" name="date_from" value="{{ request('date_from') }}"> @endif        
        @if(request('date_to')) <input type="hidden" name="date_to" value="{{ request('date_to') }}"> @endif
        @if(request('price_min')) <input type="hidden" name="price_min" value="{{ request('price_min') }}"> @endif
        @if(request('price_max')) <input type="hidden" name="price_max" value="{{ request('price_max') }}"> @endif
        {{-- Barrita --}}
        <input type="text" name="search" class="form-control border-start-1 border-end-1" 
               placeholder="Buscar por código o cliente..." value="{{ request('search') }}">               
        {{-- Boton busqueda/limpiar --}}
        @if(request('search'))
            <a href="{{ route('admin.orders') }}" class="btn btn-white bg-white border-start-1 border" title="Limpiar búsqueda">
                <i class="bi bi-x-lg small"></i>
            </a>
        @else
            <button type="submit" class="btn btn-white bg-white border border-start-1" title="Buscar">
                <i class="bi bi-search"></i>
            </button> 
        @endif
    </form>

    {{-- Boton para filtros --}}
    <button class="btn btn-sm btn-color-matiensos text-white d-flex align-items-center gap-1 position-relative" 
            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasOrderFilters" aria-controls="offcanvasOrderFilters">
        <i class="bi bi-funnel-fill"></i>
        <span>Filtros</span>

        @if(request('status_filter') || request('date_from') || request('date_to') || request('price_min') || request('price_max')) 
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        @endif
    </button>
</div>