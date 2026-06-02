{{-- MODAL de confirmación de SUSPENSIÓN --}}
<div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-4 text-center">               
                <i class="bi bi-person-x text-danger display-4 d-block mb-3"></i>
               
                <h5 class="fw-bold text-dark">¿Suspender usuario?</h5>
  
                <p class="text-muted small mb-4">
                    Vas a suspender el acceso de <br><strong>{{ $user->name }} {{ $user->last_name }}</strong>.<br>
                    <span class="text-danger mt-1 d-block" style="font-size: 0.75rem;">Ya no podrá iniciar sesión en el panel.</span>
                </p>
                
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger px-3 fw-bold">Sí, suspender</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>