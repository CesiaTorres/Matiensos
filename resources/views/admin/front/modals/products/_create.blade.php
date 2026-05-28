{{-- MODAL FORMULARIO CREAR NUEVO PRODUCTO --}}
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">           
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="createProductModalLabel">
                    <i class="bi bi-box-seam me-2 color-matiensos"></i>Agregar Producto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>       
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">              
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Código</label>
                            <input type="text" name="code" class="form-control" placeholder="Ej: MAT-001" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nombre del Producto</label>
                            <input type="text" name="name" class="form-control" placeholder="Ej: Mate Camionero" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Categoría</label>
                        <select name="category_id" class="form-select" required>
                            <option value="" selected disabled>Seleccionar Categoría...</option>
                            
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Precio ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Stock Inicial</label>
                            <input type="number" name="stock" class="form-control" placeholder="0" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Descripción (Opcional)</label>
                        <input type="text" name="description" class="form-control" placeholder="Detalles del producto o especificaciones...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Imagen del Producto</label>
                        <input type="file" name="image_url" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold">Guardar Producto</button>
                </div>
            </form>

        </div>
    </div>
</div>