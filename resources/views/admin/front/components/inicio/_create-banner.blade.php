
{{-- MODAL para CREAR UN BANNER NUEVO--}}
<div class="modal fade" id="createBannerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Crear Nuevo Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Subir imagen <span class="text-danger">*</span></label>
                        <input type="file" name="banner_image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Descripción (Opcional)</label>
                        <input type="text" name="description" class="form-control" placeholder="Ej: Especial mes de la primavera...">
                    </div>

                    <button type="submit" class="btn btn-color-matiensos text-white w-100 rounded-3 mt-3 fw-bold">
                        <i class="bi bi-plus-circle me-2"></i> Crear Banner
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>