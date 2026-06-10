{{-- PAGINACION --}}
@props(['items', 'label' => 'registros'])

<div class="d-flex flex-column align-items-center gap-2 mt-4">
    <div class="text-muted small">
        Mostrando {{ $items->count() }} de {{ $items->total() }} {{ $label }}
    </div>
    <nav aria-label="Navegación de {{ $label }}">
        <ul class="pagination m-0">                  
            <li class="page-item {{ $items->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $items->appends(request()->query())->previousPageUrl() }}">&laquo;</a>
            </li>                 
            @foreach ($items->appends(request()->query())->getUrlRange(1, $items->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
            <li class="page-item {{ $items->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $items->appends(request()->query())->nextPageUrl() }}">&raquo;</a>
            </li>
        </ul>
    </nav>
</div>