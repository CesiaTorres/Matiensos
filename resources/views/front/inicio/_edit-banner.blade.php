{{-- 1. MODALES PARA EDITAR BANNERS EXISTENTES --}}
@foreach($banner as $item)
<div class="modal fade" id="editBannerModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Editar Banner #{{ $item->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form action="{{ route('admin.banner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="text-center mb-4">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="d-block w-100 rounded-3 mb-3 shadow-sm" alt="Vista previa" style="height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded-3 mb-3 d-flex align-items-center justify-content-center border" style="height: 150px;">
                                <i class="bi bi-image text-secondary opacity-50" style="font-size: 3rem;"></i>
                            </div>
                        @endif

                        <div class="text-start">
                            <label class="form-label small fw-bold text-muted">Reemplazar imagen</label>
                            <input type="file" name="banner_image" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Descripción</label>
                        <input type="text" name="description" class="form-control" value="{{ $item->description }}">
                    </div>

                    <button type="submit" class="btn btn-color-matiensos text-white w-100 rounded-3 mt-3 fw-bold">
                        <i class="bi bi-floppy me-2"></i> Guardar cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- MODAL PARA CREAR UN BANNER NUEVO--}}
<div class="modal fade" id="createBannerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Crear Nuevo Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                {{-- OJO: Asegúrate de tener una ruta 'admin.banner.store' en web.php para guardar nuevos registros --}}
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