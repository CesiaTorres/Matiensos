@extends('layouts.app')
@section('title', 'Perfil usuario - Matiensos')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg overflow-hidden rounded-4">

        {{-- HEADER --}}
        <div id="profile-card" class="position-relative text-white p-4 p-md-5 bg-dark">
            <div class="row align-items-center">
                <div class="col-12 col-md-auto text-center">
                    <div class="position-relative d-inline-block">
                        {{-- FOTO --}}
                        @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                            class="rounded-circle border border-4 border-white"
                            width="140" height="140" style="object-fit: cover;">
                        @else
                        <img src="{{ asset('img/profile-user/icono-perfil.png') }}"
                            class="rounded-circle border border-4 border-white"
                            width="140" height="140" style="object-fit: cover;">
                        @endif
                    </div>
                </div>

                <div class="col text-center text-md-start mt-4 mt-md-0">
                    <h1 class="fw-bold mb-2">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                    </h1>
                    <p class="mb-3">
                        <i class="bi bi-envelope me-2"></i>{{ Auth::user()->email }}
                    </p>
                    <button class="btn btn-outline-light px-4" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil me-2"></i>Editar perfil
                    </button>
                </div>
            </div>
        </div>

        @if(Auth::user()->role->name === 'Cliente')
        {{-- CONTENIDO --}}
        <div class="p-4 p-md-5 bg-light">
            <h2>Resumen de tu cuenta</h2>

            {{-- SECCIÓN CARDS INFORMATIVAS --}}
            <div class="row g-4 mt-2">
                {{-- CARD 1 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-cart-check fs-1 text-warning"></i>
                            </div>
                            <h2 class="fw-bold">
                                {{ $totalOrders }}
                            </h2>
                            <p class="text-muted mb-0">Pedidos realizados</p>
                        </div>
                    </div>
                </div>

                {{-- CARD 2 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-truck fs-1 text-primary"></i>
                            </div>
                            <h2 class="fw-bold">
                                {{ $ordersInProgress }}
                            </h2>
                            <p class="text-muted mb-0">Pedidos en curso</p>
                        </div>
                    </div>
                </div>

                {{-- CARD 3 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-box-seam fs-1 text-success"></i>
                            </div>
                            <h2 class="fw-bold">
                                {{ $ordersDelivered }}
                            </h2>
                            <p class="text-muted mb-0">Pedidos entregados</p>
                        </div>
                    </div>
                </div>
            </div> {{-- FIN FILA CARDS --}}

            {{-- SECCIÓN TABLA PEDIDOS DEL CLIENTE --}}
            <div class="row mt-5">
                <div class="col-12 ">
                    <div class="card border-0 shadow-sm bg-white p-4 rounded-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-dark m-0">Listado de Pedidos</h5>
                        </div>

                        {{-- Tabla --}}
                        <div class="table-responsive">
                            <table class="table table-hover align-middle m-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Ticket #</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orders->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            No hay pedidos para mostrar.
                                        </td>
                                    </tr>
                                    @else
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">#{{ $order->code }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-muted">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark">$ {{ number_format($order->total_amount, 2, ',', '.') }}</div>
                                        </td>
                                        <td>
                                            <x-_order-status :status="$order->status" />
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('perfil.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary border-0" title="Ver Detalle completo">
                                                    <i class="bi bi-eye fs-6"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- Navegacion de pedidos --}}
                        <x-_pagination :items="$orders" label="pedidos" />
                    </div>
                </div>
            </div> {{-- FIN FILA TABLA --}}

        </div>
    </div>
</div> {{-- FIN CONTAINER --}}
@endif

{{-- MODAL EDITAR PERFIL --}}
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Editar perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center mb-4">
                        @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                            class="rounded-circle mb-3 border border-4 border-success"
                            width="120" height="120" style="object-fit: cover;">
                        @else
                        <img src="{{ asset('img/profile-user/icono-perfil.png') }}"
                            class="rounded-circle mb-3 border border-4 border-success"
                            width="120" height="120" style="object-fit: cover;">
                        @endif

                        <div>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña actual</label>
                        <div class="input-group">
                            <input type="password" id="currentPassword" name="current_password" class="form-control">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('currentPassword', this)">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div id="newPasswordFields" class="d-none">
                        <div class="mb-3">
                            <label class="form-label">Nueva contraseña</label>
                            <div class="input-group">
                                <input type="password" id="newPassword" name="new_password" class="form-control">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword', this)">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar nueva contraseña</label>
                            <div class="input-group mb-1">
                                <input type="password" id="confirmPassword" name="new_password_confirmation" class="form-control">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword', this)">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            <small id="passwordMessage" class="d-block"></small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-3 mt-3">
                        Guardar cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPassword = document.getElementById('currentPassword');
        const newPasswordFields = document.getElementById('newPasswordFields');
        const newPassword = document.getElementById('newPassword');
        const confirmPassword = document.getElementById('confirmPassword');
        const passwordMessage = document.getElementById('passwordMessage');

        // MOSTRAR CAMPOS NUEVA PASSWORD
        currentPassword.addEventListener('input', function() {
            if (currentPassword.value.length > 0) {
                newPasswordFields.classList.remove('d-none');
            } else {
                newPasswordFields.classList.add('d-none');
                newPassword.value = '';
                confirmPassword.value = '';
                passwordMessage.textContent = '';
            }
        });

        // VALIDAR CONFIRMACIÓN
        function validatePasswords() {
            if (newPassword.value.length > 0 && newPassword.value.length < 6) {
                passwordMessage.textContent = 'La contraseña debe tener al menos 6 caracteres';
                passwordMessage.className = 'text-danger d-block';
                return;
            }

            if (confirmPassword.value.length === 0) {
                passwordMessage.textContent = '';
                return;
            }

            if (newPassword.value === confirmPassword.value) {
                passwordMessage.textContent = 'Las contraseñas coinciden';
                passwordMessage.className = 'text-success d-block';
            } else {
                passwordMessage.textContent = 'Las contraseñas no coinciden';
                passwordMessage.className = 'text-danger d-block';
            }
        }

        newPassword.addEventListener('input', validatePasswords);
        confirmPassword.addEventListener('input', validatePasswords);
    });

    // MOSTRAR / OCULTAR PASSWORD
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        }
    }
</script>

@endsection