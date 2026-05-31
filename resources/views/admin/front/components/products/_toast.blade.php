{{-- TOASTS --}}
@if($errors->any() || session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-4" style="z-index: 1055;">
        
        {{-- error --}}
        @if($errors->any())
            <div class="toast align-items-center text-white bg-danger border-0 show shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body fw-bold">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ $errors->first() }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                </div>
            </div>
        @endif

        {{-- exito --}}
        @if(session('success'))
            <div class="toast align-items-center text-white bg-matiensos border-0 show shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body fw-bold">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                </div>
            </div>
        @endif

    </div>
@endif