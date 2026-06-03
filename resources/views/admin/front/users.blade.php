@extends('admin.layouts.app-admin')
@section('titulo', 'Gestión de Usuarios | Matiensos')

@section('content')

{{-- VISTA PRINCIPAL DE USUARIOS --}}
<div class="row g-0">
    <div class="col-12 p-4">
        {{-- Titulo y boton para crear categoria --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark fw-bold m-0">Gestión de Usuarios</h2>
            </div>
            <button type="button" class="btn btn-color-matiensos text-white px-3 fw-bold" 
                    data-bs-toggle="modal" 
                    data-bs-target="#createUserModal">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Miembro
            </button>
        </div>

        {{-- Tarjetas --}}
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Equipo Completo" value="{{ $metrics['total_users'] }}" icon="bi-shield-lock" />
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Administradores Activos" value="{{ $metrics['total_admins'] }}" icon="bi-person-check"/>
            </div>
            <div class="col-md-3 mb-3">
                <x-metric-card 
                    title="Clientes Activos" value="{{ $metrics['total_customer'] }}" icon="bi-person-x"/>
            </div>
        </div>

        {{-- Listado de Categorias --}}
        <div class="row">
            <div class="col-8">                
                <div class="card border-0 shadow-sm bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark m-0">Equipo</h5>
                        @include('admin.front.components.users._search')                      
                    </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="fw-bold ps-4">Usuario</th>
                                        <th scope="col" class="fw-bold">Email</th>
                                        <th scope="col" class="fw-bold">Rol</th>
                                        <th scope="col" class="fw-bold">Estado</th>
                                        <th scope="col" class="fw-bold text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @if ($users-> isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">
                                                No hay miembros del equipo registrados.
                                            </td>
                                        </tr>                                  
                                    @else
                                        @foreach($users as $user)
                                            <tr>
                                                {{-- Usuario --}}
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        {{-- Círculos --}}
                                                        <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center me-3 fw-bold flex-shrink-0" 
                                                            style="width: 40px; height: 40px; font-size: 0.9rem; max-width: 110px;">
                                                            {{ substr($user->name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                                                        </div>
                                                        <div>
                                                            <span class=" d-block fw-bold text-dark">{{ $user->name }} {{ $user->last_name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- Email --}}
                                                <td class="text-muted small">
                                                    {{ $user->email }}
                                                </td>
                                                {{-- Rol--}}
                                                <td>
                                                    @if($user->role_id == 1)
                                                        <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 fw-bold border border-primary">
                                                            Admin
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary bg-opacity-10 text-dark px-2 py-1 fw-bold">
                                                            Vendedor
                                                        </span>
                                                    @endif
                                                </td>
                                                {{-- Estado--}}
                                                <td>
                                                    @if(!$user->trashed())
                                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 fw-bold">Activo</span>
                                                    @else
                                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 fw-bold">Suspendido</span>
                                                    @endif
                                                </td>
                                                {{-- 5. Acciones --}}
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        {{-- Botón Editar --}}
                                                        <button type="button" class="btn btn-sm btn-outline-secondary border-0" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editUserModal{{ $user->id }}" 
                                                                title="Editar Usuario"
                                                                {{ $user->trashed() ? 'disabled' : '' }}>
                                                            <i class="bi bi-pencil-square fs-6"></i>
                                                        </button>
                                                        
                                                        
                                                        @if(Auth::id() != $user->id && !$user->trashed())
                                                            <button type="button" class="btn btn-sm btn-outline-danger border-0" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#deleteUserModal{{ $user->id }}" 
                                                                    title="Suspender Usuario">
                                                                <i class="bi bi-person-x fs-6"></i>
                                                            </button>
                                                            
                                                        {{-- botón de reactivar --}}
                                                        @elseif($user->trashed())
                                                            <button type="button" class="btn btn-sm btn-outline-success border-0" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#restoreUserModal{{ $user->id }}" 
                                                                    title="Reactivar Usuario">
                                                                <i class="bi bi-person-check fs-6"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach                            
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- Navegacion de usuarios --}}
                        <x-_pagination :items="$users" label="miembros del equipo" />                                        
                    </div>
                    @foreach($users as $user)
                        @include('admin.front.components.users._edit')
                        @include('admin.front.components.users._delete')
                        @include('admin.front.components.users._restore')
                    @endforeach                    
                </div>            

                <div class="col-4">                
                    {{-- TARJETA DE HISTORIAL DE ACTIVIDAD --}}
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-2">
                            <h5 class="fw-bold text-dark mb-0">
                                <i class="bi bi-clock-history me-2 color-matiensos"></i>Historial de actividad
                            </h5>
                        </div>
                        
                        <div class="card-body pt-2" style="max-height: 600px; overflow-y: auto;">
                            
                            {{-- Contenedor de la Línea de Tiempo --}}
                            <div class="border-start border-2 ms-2 ps-3 position-relative" style="border-color: #dee2e6 !important;">
                                
                                {{-- Item 1: Reactivación (Éxito) --}}
                                <div class="mb-4 position-relative">
                                    <span class="position-absolute top-0 start-0 translate-middle bg-success border border-2 border-white rounded-circle" style="width: 14px; height: 14px; margin-left: -17px; margin-top: 5px;"></span>
                                    <div class="small text-muted mb-1">Hoy, 10:45 AM</div>
                                    <div class="text-dark" style="font-size: 0.9rem;">
                                        <strong>Admin First</strong> reactivó al usuario <span class="fw-semibold">Facundo Romero</span>.
                                    </div>
                                </div>

                                {{-- Item 2: Suspensión (Peligro) --}}
                                <div class="mb-4 position-relative">
                                    <span class="position-absolute top-0 start-0 translate-middle bg-danger border border-2 border-white rounded-circle" style="width: 14px; height: 14px; margin-left: -17px; margin-top: 5px;"></span>
                                    <div class="small text-muted mb-1">Ayer, 16:30 PM</div>
                                    <div class="text-dark" style="font-size: 0.9rem;">
                                        <strong>Valentina Ríos</strong> suspendió al usuario <span class="fw-semibold">Cliente Uno</span>.
                                    </div>
                                </div>

                                {{-- Item 3: Actualización (Info/Secundario) --}}
                                <div class="mb-4 position-relative">
                                    <span class="position-absolute top-0 start-0 translate-middle bg-secondary border border-2 border-white rounded-circle" style="width: 14px; height: 14px; margin-left: -17px; margin-top: 5px;"></span>
                                    <div class="small text-muted mb-1">Ayer, 11:15 AM</div>
                                    <div class="text-dark" style="font-size: 0.9rem;">
                                        <strong>Admin First</strong> actualizó el rol de <span class="fw-semibold">Sofía Alonso</span> a Vendedor.
                                    </div>
                                </div>

                                {{-- Item 4: Creación (Primario) --}}
                                <div class="mb-2 position-relative">
                                    <span class="position-absolute top-0 start-0 translate-middle bg-primary border border-2 border-white rounded-circle" style="width: 14px; height: 14px; margin-left: -17px; margin-top: 5px;"></span>
                                    <div class="small text-muted mb-1">01 Jun 2026, 09:00 AM</div>
                                    <div class="text-dark" style="font-size: 0.9rem;">
                                        <strong>Enzo Gómez</strong> registró un nuevo usuario: <span class="fw-semibold">Joaquín García</span>.
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.front.components._toast')
@include('admin.front.components.users._create')
@include('admin.front.components.scripts')
@include('admin.front.components.users._filters')




@endsection