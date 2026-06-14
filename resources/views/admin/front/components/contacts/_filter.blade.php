{{-- Desplegable de busqueda por estado --}}
<form action="{{ route('admin.contacts') }}" method="GET" class="d-flex gap-2 border">
    <select name="status_filter" class="form-select form-select-sm border-0 bg-light text-secondary" onchange="this.form.submit()" style="width: 210px;">
        <option value="" {{ request('status_filter') == '' ? 'selected' : '' }}>Todos los mensajes</option>
        <option value="unread" {{ request('status_filter') == 'unread' ? 'selected' : '' }}>Solo Sin Leer</option>
        <option value="read" {{ request('status_filter') == 'read' ? 'selected' : '' }}>Solo Leídos</option>
    </select>    
    {{-- Boton para limpiar--}}
    @if(request('status_filter'))
        <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-light border text-muted" title="Limpiar filtro">
            <i class="bi bi-x-lg"></i>
        </a>
    @endif
</form>