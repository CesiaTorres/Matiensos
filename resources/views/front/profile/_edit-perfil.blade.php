
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