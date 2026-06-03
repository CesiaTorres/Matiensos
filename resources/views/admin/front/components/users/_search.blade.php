{{-- Barra de BUSQUEDA y boton de FILTROS (Usuarios) --}}
<div class="d-flex align-items-center gap-2">
    <form action="{{ route('admin.users') }}" method="GET" class="input-group input-group-sm" style="width: 300px;">      
        {{-- Memoria de los filtros --}}
        @if(request('role_filter'))
            <input type="hidden" name="role_filter" value="{{ request('role_filter') }}">
        @endif       
        @if(request('status_filter'))
            <input type="hidden" name="status_filter" value="{{ request('status_filter') }}">
        @endif        
        {{-- Barra de Busqueda --}}
        <input type="text" name="search" class="form-control border-start-1 border-end-1" 
               placeholder="Buscar por nombre o correo..." value="{{ request('search') }}">
               
        {{-- Boton busqueda o Limpiar --}}
        @if(request('search'))
            <a href="{{ route('admin.users') }}" class="btn btn-white bg-white border-start-1 border" title="Limpiar búsqueda">
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
            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUserFilters" aria-controls="offcanvasUserFilters">
        <i class="bi bi-funnel-fill"></i>
        <span>Filtros</span>
        
        @if(request('role_filter') || request('status_filter')) 
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        @endif
    </button>
</div>