{{-- MODAL para EDITAR PRODUCTO --}}
<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">    
            
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="editProductModalLabel{{ $product->id }}">
                    <i class="bi bi-pencil-square me-2 color-matiensos"></i>Editar Producto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Formulario para modificar datos --}}  
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="modal-body p-4">              
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Código</label>
                            <input type="text" name="code" pattern="^[^\s]+(\s+[^\s]+)*$" class="form-control" placeholder="Ej: MAT-001" value="{{ old('code', $product->code) }}" required>
                            <div class="invalid-feedback fw-semibold">Obligatorio. No uses espacios vacíos.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nombre del Producto</label>
                            <input type="text" name="name" class="form-control" placeholder="Ej: Mate Camionero" value="{{ old('name', $product->name) }}" required>
                            <div class="invalid-feedback fw-semibold">El nombre es obligatorio.</div>
                        </div>
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Categoría</label>
                        <select name="category_id" class="form-select" required>
                            <option value="" disabled>Seleccionar Categoría...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach              
                        </select>
                        <div class="invalid-feedback fw-semibold">Seleccioná una categoría.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Precio ($)</label>
                            <input type="number" step="0.01" min="0" name="price" class="form-control" placeholder="0.00" value="{{ old('price', $product->price) }}" required>
                            <div class="invalid-feedback fw-semibold">Obligatorio. No puede ser negativo.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Stock Inicial</label>
                            <input type="number" min="0" name="stock" class="form-control" placeholder="0" value="{{ old('stock', $product->stock) }}" required>
                            <div class="invalid-feedback fw-semibold">Obligatorio. No puede ser negativo.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Descripción (Opcional)</label>
                        <input type="text" name="description" class="form-control" placeholder="Detalles..." value="{{ old('description', $product->description) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Imagen del Producto</label>
                        <input type="file" name="image_url" class="form-control" accept="image/*">
                    </div>
                </div>
                {{-- Botones para 'Guardar' o 'Cancelar' --}}
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold">Actualizar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>