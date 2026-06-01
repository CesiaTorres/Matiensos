@extends('layouts.app')
@section('title', 'Perfil usuario - Matiensos')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-lg overflow-hidden rounded-4">

        {{-- HEADER --}}
        <div id="profile-card" class="position-relative text-white p-4 p-md-5">

            <div class="row align-items-center">

                <div class="col-12 col-md-auto text-center">

                    <div class="position-relative d-inline-block">

                        {{-- FOTO --}}
                        @if(Auth::user()->profile_image)

                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                            class="rounded-circle border border-4 border-white"
                            width="140"
                            height="140"
                            style="object-fit: cover;">

                        @else

                        <img src="{{ asset('img/profile-user/icono-perfil.png') }}"
                            class="rounded-circle border border-4 border-white"
                            width="140"
                            height="140"
                            style="object-fit: cover;">

                        @endif

                    </div>

                </div>

                <div class="col text-center text-md-start mt-4 mt-md-0">
                    <h1 class="fw-bold mb-2">
                        {{ Auth::user()->name }}
                        {{ Auth::user()->last_name }}
                    </h1>
                    <p class="mb-1">
                        <i class="bi bi-envelope me-2"></i>
                        {{ Auth::user()->email }}
                    </p>

                    <button class="btn btn-outline-light px-4"
                        data-bs-toggle="modal"
                        data-bs-target="#editProfileModal">

                        <i class="bi bi-pencil me-2"></i>
                        Editar perfil

                    </button>

                </div>

            </div>

        </div>


        {{-- CONTENIDO --}}
        <div class="card border-0 shadow-lg overflow-hidden rounded-4">
            <div class="p-4 p-md-5 bg-light">
                <h2>Resumen de tu cuenta </h2>

                {{-- CARDS --}}
                <div class="row g-4 mt-5">
                    {{-- CARD 1 --}}
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-3">

                                    <i class="bi bi-box-seam fs-1 text-success"></i>

                                </div>

                                <h2 class="fw-bold">
                                    12
                                </h2>

                                <p class="text-muted mb-0">
                                    Pedidos realizados
                                </p>

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
                                    2
                                </h2>

                                <p class="text-muted mb-0">
                                    Pedidos en curso
                                </p>

                            </div>

                        </div>

                    </div>
                    {{-- CARD 3 --}}
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-3">

                                    <i class="bi bi-geo-alt fs-1 text-dark"></i>

                                </div>

                                <h2 class="fw-bold">
                                    12
                                </h2>

                                <p class="text-muted mb-0">
                                    Direccion de cuenta
                                </p>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>






        {{-- MODAL EDITAR PERFIL --}}
        <div class="modal fade"
            id="editProfileModal"
            tabindex="-1">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content rounded-4 border-0">

                    <div class="modal-header border-0">

                        <h5 class="modal-title fw-bold">
                            Editar perfil
                        </h5>

                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>

                    </div>

                    <div class="modal-body p-4">

                        <form action="{{route('perfil.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center mb-4">
                                @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                    class="rounded-circle mb-3 border border-4 border-green"
                                    width="120"
                                    height="120"
                                    style="object-fit: cover;">
                                @else
                                <img src="{{ asset('img/profile-user/icono-perfil.png') }}"
                                    class="rounded-circle mb-3  border border-4 border-green"
                                    width="120"
                                    height="120"
                                    style="object-fit: cover;">
                                @endif

                                <div>
                                    <input type="file" name="profile_image" class="form-control">
                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Nombre
                                </label>

                                <input type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ Auth::user()->name }}">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Apellido
                                </label>

                                <input type="text"
                                    name="last_name"
                                    class="form-control"
                                    value="{{ Auth::user()->last_name }}">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ Auth::user()->email }}">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Contraseña actual
                                </label>
                                <div class="input-group">
                                    <input type="password"
                                        id="currentPassword"
                                        name="current_password"
                                        class="form-control">

                                    <button class="btn btn-outline-secondary"
                                        type="button"
                                        onclick="togglePassword('currentPassword', this)">

                                        <i class="bi bi-eye-slash"></i>

                                    </button>
                                </div>
                            </div>

                            <div id="newPasswordFields" class="d-none">
                                <div class="mb-3">

                                    <label class="form-label">
                                        Nueva contraseña
                                    </label>

                                    <div class="input-group">
                                        <input type="password"
                                            id="newPassword"
                                            name="new_password"
                                            class="form-control">

                                        <button class="btn btn-outline-secondary"
                                            type="button"
                                            onclick="togglePassword('newPassword', this)">

                                            <i class="bi bi-eye-slash"></i>

                                        </button>

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Confirmar nueva contraseña
                                        </label>
                                        <div class="input-group">

                                            <input type="password"
                                                id="confirmPassword"
                                                name="new_password_confirmation"
                                                class="form-control">

                                            <button class="btn btn-outline-secondary"
                                                type="button"
                                                onclick="togglePassword('confirmPassword', this)">

                                                <i class="bi bi-eye-slash"></i>

                                            </button>

                                        </div>

                                        <small id="passwordMessage"></small>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-custom w-100 ">
                                    Guardar cambios
                                </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        <script>
            // MOSTRAR CAMPOS NUEVA PASSWORD

            const currentPassword = document.getElementById('currentPassword');

            const newPasswordFields = document.getElementById('newPasswordFields');

            currentPassword.addEventListener('input', function() {

                if (currentPassword.value.length > 0) {

                    newPasswordFields.classList.remove('d-none');

                } else {

                    newPasswordFields.classList.add('d-none');

                }

            });



            // VALIDAR CONFIRMACIÓN

            const newPassword = document.getElementById('newPassword');

            const confirmPassword = document.getElementById('confirmPassword');

            const passwordMessage = document.getElementById('passwordMessage');

            confirmPassword.addEventListener('input', function() {

                if (confirmPassword.value.length === 0) {

                    passwordMessage.textContent = '';

                    confirmPassword.classList.remove('is-valid');
                    confirmPassword.classList.remove('is-invalid');

                    return;
                }

                if (newPassword.value === confirmPassword.value) {

                    passwordMessage.textContent = 'Las contraseñas coinciden';

                    passwordMessage.className = 'text-success';

                    confirmPassword.classList.remove('is-invalid');
                    confirmPassword.classList.add('is-valid');

                } else {

                    passwordMessage.textContent = 'Las contraseñas no coinciden';

                    passwordMessage.className = 'text-danger';

                    confirmPassword.classList.remove('is-valid');
                    confirmPassword.classList.add('is-invalid');
                }

            });



            // MOSTRAR / OCULTAR PASSWORD

            function togglePassword(inputId, button) {

                const input = document.getElementById(inputId);

                const icon = button.querySelector('i');

                input.type =
                    input.type === 'password' ?
                    'text' :
                    'password';

                icon.classList.toggle('bi-eye');

                icon.classList.toggle('bi-eye-slash');
            }
        </script>
        @endsection