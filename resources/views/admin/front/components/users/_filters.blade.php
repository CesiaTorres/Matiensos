{{-- OFFCANVAS para FILTRAR USUARIOS --}}
<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasUserFilters" aria-labelledby="offcanvasUserFiltersLabel">    
    {{-- Encabezado --}}
    <div class="offcanvas-header bg-light border-bottom">
        <h5 class="offcanvas-title fw-bold text-dark" id="offcanvasUserFiltersLabel">
            <i class="bi bi-sliders me-2 color-matiensos"></i>Filtros Avanzados
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> 
    {{-- Cuerpo  --}}
    <div class="offcanvas-body p-4">
        <form action="{{ route('admin.users') }}" method="GET">        
            {{-- Memoria de la barra de búsqueda --}}
            @if(request('search'))  
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif
            {{-- Estado de la Cuenta --}}
            <div class="mb-4">             
                <label class="form-label fw-bold small uppercase text-tracking mb-3">Estado de la cuenta</label>          
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="filterStatusAll" value=""
                           {{ !request('status_filter') ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterStatusAll">
                        Todos los estados
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="filterStatusActive" value="active"
                           {{ request('status_filter') == 'active' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterStatusActive">
                        Solo Activos
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="filterStatusSuspended" value="suspended"
                           {{ request('status_filter') == 'suspended' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterStatusSuspended">
                        Solo Suspendidos
                    </label>
                </div>
            </div>
            <hr class="text-muted opacity-25 my-4">
            {{-- Roles --}}
            <div class="mb-4">
                <label class="form-label fw-bold small uppercase text-tracking mb-3">Roles del Sistema</label>      
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="role_filter" id="filterRoleAll" value=""
                           {{ !request('role_filter') ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="filterRoleAll">
                        Ver todos los roles
                    </label>
                </div>                 
                @foreach($roles as $role)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="role_filter" id="filterRole{{ $role->id }}" value="{{ $role->id }}"
                               {{ request('role_filter') == $role->id ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="filterRole{{ $role->id }}">
                            {{ ucfirst($role->name) }}
                        </label>
                    </div>
                @endforeach
            </div>
            {{-- Botones de Acción --}}
            <div class="d-grid gap-2 mt-5">
                <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2 shadow-sm">
                    Aplicar Filtros
                </button>
                @if(request('role_filter') || request('status_filter'))
                    <a href="{{ route('admin.users') }}" class="btn btn-light border py-2 text-muted small">
                        Limpiar todos los filtros
                    </a>
                @endif
            </div>

        </form>
    </div>
</div>