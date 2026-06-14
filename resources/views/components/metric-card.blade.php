{{-- TARJETAS DE VISTA RAPIDA --}}
@props(['title', 'value', 'icon', 'color' => 'color-matiensos']) {{-- matiensos es el color por defecto si no paso otro --}}

<div class="card border-0 shadow-sm bg-white h-100 d-flex flex-row overflow-hidden">
    <div class="bg-matiensos" style="width: 6px;"></div>
    <div class="card-body p-3 d-flex align-items-center justify-content-between w-100 ">
        <div>
            <h6 class="text-muted text-uppercase fw-bold mb-2">{{ $title }}</h6>
            <h3 class="fw-bold m-0 text-dark">{{ $value }}</h3>
        </div>
        <div class="bg-matiensos-light  bg-opacity-10 p-3 rounded {{ $color }}">
            <i class="bi {{ $icon }} fs-3"></i>
        </div>
    </div>
</div>