{{-- MODAL para EDITAR CATEGORÍA --}}
<div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">    
            
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="editCategoryModalLabel{{ $category->id }}">
                    <i class="bi bi-pencil-square me-2 color-matiensos"></i>Editar Categoría
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Formulario para modificar datos --}}  
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nombre de la Categoría</label>
                        <input type="text" name="name" class="form-control" placeholder="Ej: Mates de Madera" 
                            value="{{ old('name', $category->name) }}" pattern="^[^\s]+(\s+[^\s]+)*$" required>
                        <div class="invalid-feedback fw-semibold">El nombre es obligatorio.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Descripción (Opcional)</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Detalles de la categoría...">{{ old('description', $category->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Imagen de la Categoria</label>
                        <input type="file" name="image_url" class="form-control" accept="image/*">
                    </div>
                </div>
                {{-- Botones para 'Guardar' o 'Cancelar' --}}
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold">Actualizar Categoría</button>
                </div>
            </form>

        </div>
    </div>
</div>