{{-- MODAL para CREAR NUEVO MIEMBRO DEL EQUIPO --}}
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">    
            
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="createUserModalLabel">
                    <i class="bi bi-person-plus-fill me-2 color-matiensos"></i>Agregar Miembro al Equipo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Formulario para ingreso de datos --}}
            <form action="{{ route('admin.users.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body p-4">              
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nombre</label>
                            <input type="text" name="name" pattern="^[^\s]+(\s+[^\s]+)*$" class="form-control" placeholder="Ej: Juan" required>
                            <div class="invalid-feedback fw-semibold">El nombre es obligatorio y no puede estar vacío.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Apellido</label>
                            <input type="text" name="last_name" pattern="^[^\s]+(\s+[^\s]+)*$" class="form-control" placeholder="Ej: Pérez" required>
                            <div class="invalid-feedback fw-semibold">El apellido es obligatorio y no puede estar vacío.</div>
                        </div>
                    </div>                    
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Correo Electrónico</label>
                        <input type="email" name="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" class="form-control" placeholder="ejemplo@matiensos.com" required>
                        <div class="invalid-feedback fw-semibold">Ingresá un correo electrónico válido.</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Rol</label>
                            <select name="role_id" class="form-select" required>
                                <option value="" selected disabled>Seleccionar Rol...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach              
                            </select>
                            <div class="invalid-feedback fw-semibold">Seleccioná un rol válido.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Contraseña</label>
                            <input type="password" name="password" minlength="6" class="form-control" placeholder="Mínimo 6 caracteres" required>
                            <div class="invalid-feedback fw-semibold">La contraseña debe tener al menos 6 caracteres.</div>
                        </div>
                    </div>
                    
                </div>
                
                {{-- Botones para 'Guardar' o 'Cancelar' --}}
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>