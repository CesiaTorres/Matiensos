{{-- MODAL de EDICIÓN de PRODUCTO --}}
<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            {{-- Boton de 'Editar Producto' --}}
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-pencil-square me-2 color-matiensos"></i>Editar Producto: {{ $product->name }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Formulario para modificar datos --}}
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4 text-start">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Código</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code', $product->code) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Stock Disponible</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" min="0" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nombre del Producto</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Categoría</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Precio ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" min="0" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Descripción (Opcional)</label>
                        <textarea name="description" class="form-control" rows="2">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-bold">Nueva Imagen (Dejar vacío para mantener la actual)</label>
                        <input type="file" name="image_url" class="form-control" accept="image/*">
                    </div>
                </div>
                {{-- Botones para 'Guardar' o 'Cancelar' --}}
                <div class="modal-footer bg-light border-top-0 d-flex gap-2">
                    <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos px-4 fw-bold text-white">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>