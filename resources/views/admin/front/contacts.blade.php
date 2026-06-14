@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Contactos | Matiensos')

@section('content')

{{-- VISTA PRINCIPAL DE CONTACTOS --}}
<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Contactos</h2>
            </div>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Total Mensajes" value="{{ $metrics['total'] ?? $contacts->total() }}" icon="bi-envelope" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Sin Leer" value="{{ $metrics['sin_leer'] ?? 0 }}" icon="bi-envelope-exclamation"/>
            </div>            
        </div>

        {{-- Listado de Mensajes --}}
        <div class="row">
            <div class="col-12">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Bandeja de Entrada</h5>
                        @include('admin.front.components.contacts._filter')                     
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            {{-- Encabezado de la tabla --}}
                            <thead class="table-light text-l">
                                <tr>
                                    <th>Remitente</th>
                                    <th>Asunto/Mensaje</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            
                            {{-- Mensajes de la tabla --}}
                            <tbody class="align-middle">
                                {{-- Lista vacía --}}
                                @if($contacts->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            No hay mensajes para mostrar.
                                        </td>
                                    </tr>
                                @else 
                                    {{-- Lista con mensajes --}}                          
                                    @foreach($contacts as $contact)
                                        <tr class="{{ !$contact->is_read ? 'bg-light' : '' }}">
                                            <td style="max-width: 180px;">
                                                <div class="fw-bold text-dark">{{ $contact->name }}</div>
                                                <small class="text-muted d-block text-truncate" style="max-width: 200px;">
                                                    {{ $contact->email }}</small>
                                            </td>
                                            <td style="max-width: 360px;">
                                                <div class="fw-bold text-dark">{{ $contact->subject }}</div>
                                                <div class="text-muted small text-truncate">
                                                    {{ $contact->message }}</div>
            
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</div>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($contact->created_at)->format('H:i') }} hs</small>
                                            </td>
                                            <td class="text-center">
                                                @if($contact->is_read)
                                                    <span class="badge bg-matiensos-light bg-opacity-10 color-matiensos px-2 py-1 fw-bold">
                                                        Leído
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 fw-bold">
                                                        Sin Leer
                                                    </span>
                                                @endif
                                            </td>
                                            {{-- Acciones --}}
                                            <td>                                               
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Leer Mensaje --}}
                                                    <button type="button" class="btn btn-sm btn-outline-primary border-0" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#viewContactModal{{ $contact->id }}" 
                                                            title="Leer Mensaje">
                                                        <i class="bi bi-eye fs-6"></i>
                                                    </button>                                                    
                                                    {{-- Marcar como Leído --}}
                                                    <form action="{{ route('admin.contacts.toggle', $contact->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        @if(!$contact->is_read)
                                                            <button type="submit" class="btn btn-sm text-success border-0 " title="Marcar como leído">
                                                                <i class="bi bi-check-lg fs-6"></i>
                                                            </button>
                                                        @else
                                                            <button type="submit" class="btn btn-sm text-danger border-0" title="Marcar como no leído">
                                                                <i class="bi bi-envelope-exclamation fs-6"></i>
                                                            </button>
                                                        @endif
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>                        
                    </div>                    
                    {{-- Navegacion de mensajes --}}
                    <x-_pagination :items="$contacts" label="mensajes" />
                    
                    @foreach ( $contacts as $contact )
                        @include('admin.front.components.contacts._view')
                     
                    @endforeach
                </div>
            </div>            
        </div>
    </div>
</div>

@include('admin.front.components._toast')
@include('admin.front.components.scripts')

@endsection