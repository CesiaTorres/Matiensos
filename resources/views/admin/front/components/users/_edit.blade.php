{{-- MODAL para EDITAR MIEMBRO DEL EQUIPO --}}
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">    
            
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="editUserModalLabel{{ $user->id }}">
                    <i class="bi bi-pencil-square me-2 color-matiensos"></i>Editar Miembro
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Formulario para modificar datos --}}  
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                
                <div class="modal-body p-4">              
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nombre</label>
                            <input type="text" name="name" pattern="^[^\s]+(\s+[^\s]+)*$" class="form-control" 
                                value="{{ $user->name }}" required>
                            <div class="invalid-feedback fw-semibold">Obligatorio. No uses espacios vacíos.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Apellido</label>
                            <input type="text" name="last_name" pattern="^[^\s]+(\s+[^\s]+)*$" class="form-control" 
                                value="{{ $user->last_name }}" required>
                            <div class="invalid-feedback fw-semibold">El apellido es obligatorio.</div>
                        </div>
                    </div>                    
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Correo Electrónico</label>
                        <input type="email" name="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" class="form-control" 
                            value="{{ $user->email }}" required>
                        <div class="invalid-feedback fw-semibold">Ingresá un correo electrónico válido.</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Rol</label>
                            <select name="role_id" class="form-select" required>
                                <option value="" disabled>Seleccionar Rol...</option>
                                @foreach($roles as $role)
                                    {{-- Pre-seleccionamos el rol actual del usuario --}}
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach              
                            </select>
                            <div class="invalid-feedback fw-semibold">Seleccioná un rol válido.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nueva Contraseña</label>
                            <input type="password" name="password" minlength="6" class="form-control"">
                            <div class="invalid-feedback fw-semibold">Mínimo 6 caracteres.</div>
                            <div class="form-text text-muted" style="font-size: 0.75rem;">Solo llená este campo si querés cambiarla.</div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold">Actualizar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>