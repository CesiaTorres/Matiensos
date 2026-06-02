{{-- MODAL de confirmación de REACTIVACIÓN --}}
<div class="modal fade" id="restoreUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-4 text-center">
                <i class="bi bi-arrow-clockwise color-matiensos display-4 d-block mb-3"></i>
                <h5 class="fw-bold text-dark">¿Reactivar usuario?</h5>
                <p class="text-muted small mb-4">Vas a habilitar nuevamente el acceso a <br><strong>{{ $user->name }} {{ $user->last_name }}</strong>.</p>
                
                <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-color-matiensos text-white px-3 fw-bold">Sí, reactivar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>