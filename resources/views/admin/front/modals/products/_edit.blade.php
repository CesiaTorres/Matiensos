{{-- MODAL de EDICIÓN de PRODUCTO --}}
<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-matiensos text-white">
                <h5 class="modal-title fw-bold">Editar Producto: {{ $product->name }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body p-4 text-start">
                    
                    {{-- Fila de Código y Stock --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Código</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code', $product->code) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Stock Disponible</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" min="0" required>
                        </div>
                    </div>

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nombre del Producto</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>

                    {{-- Fila de Categoría y Precio --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Categoría</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Precio ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" min="0" required>
                        </div>
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Descripción (Opcional)</label>
                        <textarea name="description" class="form-control" rows="2">{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- Imagen Nueva --}}
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted">Nueva Imagen (Dejar vacío para mantener la actual)</label>
                        <input type="file" name="image_url" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 d-flex gap-2">
                    <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos px-4 fw-bold text-white">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>