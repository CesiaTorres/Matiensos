{{-- ESTADOS de los PEDIDOS --}}
@props(['status'])

@php
    $style = match($status) {
        'pending'   => ['bg' => 'bg-warning text-dark', 'label' => 'Pendiente'],
        'paid'      => ['bg' => 'bg-info text-dark', 'label' => 'Pagado'],
        'shipped'   => ['bg' => 'bg-primary text-white', 'label' => 'Enviado'],
        'delivered' => ['bg' => 'bg-success text-white', 'label' => 'Entregado'],
        'cancelled' => ['bg' => 'bg-danger text-white', 'label' => 'Cancelado'],
        default     => ['bg' => 'bg-secondary text-white', 'label' => 'Desconocido'],
    };
@endphp

<span class="badge {{ $style['bg'] }} bg-opacity-75 px-2 py-1 fw-bold">
    {{ $style['label'] }}
</span>