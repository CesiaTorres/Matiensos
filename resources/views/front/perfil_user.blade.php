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
                        <img src="{{ asset('img/profile-user/icono-perfil.png') }}"
                            class="rounded-circle border border-4 border-white"
                            width="140"
                            height="140"
                            style="object-fit: cover;">

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

                <div class="row g-4">

                    <h2>Resumen de tu cuenta </h2>

                    {{-- CARD --}}
                    <div class="col-6 col-lg-3">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-3">

                                    <i class="bi bi-bag fs-1 text-success"></i>

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

                    {{-- CARD --}}
                    <div class="col-6 col-lg-3">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-3">

                                    <i class="bi bi-truck fs-1 text-primary"></i>

                                </div>

                                <h2 class="fw-bold">
                                    2
                                </h2>

                                <p class="text-muted mb-0">
                                    En camino
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- CARD --}}
                    <div class="col-6 col-lg-3">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-3">

                                    <i class="bi bi-heart fs-1 text-danger"></i>

                                </div>

                                <h2 class="fw-bold">
                                    8
                                </h2>

                                <p class="text-muted mb-0">
                                    Favoritos
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- CARD --}}
                    <div class="col-6 col-lg-3">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-3">

                                    <i class="bi bi-ticket-perforated fs-1 text-warning"></i>

                                </div>

                                <h2 class="fw-bold">
                                    3
                                </h2>

                                <p class="text-muted mb-0">
                                    Cupones
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{--seccion 2 de cards--}}

                <div class="row g-4 mt-5">
                    {{-- CARD --}}
                    <div class="col-12 col-lg-6">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-6">

                                    <i class="bi bi-bag fs-1 text-success"></i>

                                </div>

                                <h2 class="fw-bold">
                                    12
                                </h2>

                                <p class="text-muted mb-0">
                                    Último pedido
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- CARD --}}
                    <div class="col-12 col-lg-6">

                        <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                            <div class="card-body">

                                <div class="mb-6">

                                    <i class="bi bi-truck fs-1 text-primary"></i>

                                </div>

                                <h2 class="fw-bold">
                                    2
                                </h2>

                                <p class="text-muted mb-0">
                                    Dirección principal
                                </p>

                            </div>

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

                    <form>

                        <div class="text-center mb-4">

                            <img src="{{ asset('img/profile-user/icono-perfil.png') }}"
                                class="rounded-circle mb-3  border border-4 border-green"
                                width="120"
                                height="120"
                                style="object-fit: cover;">

                            <div>
                                <input type="file"
                                    class="form-control">
                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input type="text"
                                class="form-control"
                            value="{{ Auth::user()->name }}" >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                class="form-control"
                                value="{{ Auth::user()->email }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Teléfono
                            </label>

                            <input type="text"
                                class="form-control"
                                value="+54 11 2345 6789">

                        </div>

                        <button type="submit" class="btn btn-custom w-100 ">
                            Guardar cambios
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    @endsection