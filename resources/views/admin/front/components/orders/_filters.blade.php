{{-- OFFCANVAS para FILTRAR PEDIDOS --}}
<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasOrderFilters" aria-labelledby="offcanvasOrderFiltersLabel">
    <div class="offcanvas-header bg-light border-bottom">
        <h5 class="offcanvas-title fw-bold text-dark" id="offcanvasOrderFiltersLabel">
            <i class="bi bi-sliders me-2 color-matiensos"></i>Filtros Avanzados
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    {{-- cuerpo del panel --}}
    <div class="offcanvas-body p-4">
        <form action="{{ route('admin.orders') }}" method="GET">        
            @if(request('search')) 
                <input type="hidden" name="search" value="{{ request('search') }}"> 
            @endif 
            {{-- x estado --}}           
            <div class="mb-4">             
                <label class="form-label fw-bold small text-uppercase mb-3">Estado del Pedido</label>          
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="statusAll" 
                        value="" {{ !request('status_filter') ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="statusAll">Todos los estados</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="statusPending" 
                        value="pending" {{ request('status_filter') == 'pending' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="statusPending">Pendiente</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="statusPaid" 
                        value="paid" {{ request('status_filter') == 'paid' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="statusPaid">Pagado</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="statusShipped" 
                        value="shipped" {{ request('status_filter') == 'shipped' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="statusShipped">Enviado</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="statusDelivered" 
                        value="delivered" {{ request('status_filter') == 'delivered' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="statusDelivered">Entregado</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="status_filter" id="statusCancelled" 
                        value="cancelled" {{ request('status_filter') == 'cancelled' ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="statusCancelled">Cancelado</label>
                </div>
            </div>

            <hr class="text-muted opacity-25 my-4">

            {{-- x fecha--}}
            <div class="mb-4">
                <label class="form-label fw-bold small text-uppercase mb-3">Rango de Fechas</label>      
                <div class="row g-2">
                    <div class="col-6">
                        <small class="text-muted d-block mb-1">Desde:</small>
                        <input type="date" name="date_from" class="form-control form-control-sm" 
                            value="{{ request('date_from') }}">
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block mb-1">Hasta:</small>
                        <input type="date" name="date_to" class="form-control form-control-sm" 
                            value="{{ request('date_to') }}">
                    </div>
                </div>
            </div>

            <hr class="text-muted opacity-25 my-4">

            {{-- x precio --}}
            <div class="mb-4">
                <label class="form-label fw-bold small text-uppercase mb-3">Rango de Precios</label>      
                <div class="input-group input-group-sm mb-2">
                    <span class="input-group-text bg-white text-muted">Min $</span>
                    <input type="number" name="price_min" class="form-control" min="0" placeholder="0" 
                        value="{{ request('price_min') }}">
                </div>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white text-muted">Max $</span>
                    <input type="number" name="price_max" class="form-control" min="0" placeholder="Sin límite" 
                        value="{{ request('price_max') }}">
                </div>
            </div>

            {{-- Botones --}}
            <div class="d-grid gap-2 mt-5">
                <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2 shadow-sm">
                    Aplicar Filtros
                </button>
                @if(request('status_filter') || request('date_from') || request('date_to') || request('price_min') || request('price_max'))
                    <a href="{{ route('admin.orders') }}" class="btn btn-light border py-2 text-muted small">
                        Limpiar todos los filtros
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>