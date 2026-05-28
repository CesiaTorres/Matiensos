{{-- MODAL de confirmacion de ELIMINACIÓN --}}
<div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-4 text-center">
                <i class="bi bi-exclamation-triangle text-danger display-4 d-block mb-3"></i>
                <h5 class="fw-bold text-dark">¿Eliminar producto?</h5>
                <p class="text-muted small mb-4">Vas a borrar definitivamente el producto <br><strong>{{ $product->name }}</strong>.</p>
                
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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