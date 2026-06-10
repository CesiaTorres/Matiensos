{{-- MODAL de confirmación de ELIMINACIÓN de CATEGORÍA --}}
<div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-4 text-center">
                <i class="bi bi-exclamation-triangle text-danger display-4 d-block mb-3"></i>
                <h5 class="fw-bold text-dark">¿Eliminar categoría?</h5>
                <p class="text-muted small mb-4">Vas a borrar definitivamente la categoría <br><strong>{{ $category->name }}</strong>.</p>
                
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger px-3 fw-bold">Sí, eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>