{{-- MODAL para LEER MENSAJE de contacto --}}
<div class="modal fade" id="viewContactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="viewContactModalLabel{{ $contact->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            {{-- Encabezado --}}
            <div class="modal-header bg-light border-bottom-0">
                <h5 class="modal-title fw-bold text-dark" id="viewContactModalLabel{{ $contact->id }}">
                    <i class="bi bi-envelope-open me-2 color-matiensos"></i>Consultas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Cuerpo --}}
            <div class="modal-body p-4">
                {{-- Remitente --}}
                <div class="d-flex justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <small class="text-muted d-block text-uppercase fw-bold mb-1">Remitente</small>
                        <div class="fw-bold fs-5 text-dark">{{ $contact->name }}</div>
                        <div class="text-secondary">
                            <i class="bi bi-envelope me-1"></i> <a href="mailto:{{ $contact->email }}" class="text-decoration-none text-secondary">{{ $contact->email }}</a>
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="text-muted d-block text-uppercase fw-bold mb-1">Fecha de Recepción</small>
                        <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</div>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($contact->created_at)->format('H:i') }} hs</small>
                    </div>
                </div>
                {{-- Estado y tipo de usuario --}}
                <div class="mb-4 d-flex gap-2">
                    @if($contact->user_id)
                        <span class="badge bg-matienso-light bg-opacity-10 color-matiensos border border-opacity-25 px-2 py-1">
                            <i class="bi bi-person-check me-1"></i> Cliente Registrado
                        </span>
                    @else
                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-2 py-1">
                            <i class="bi bi-person-dash me-1"></i> Invitado Anónimo
                        </span>
                    @endif

                    @if(!$contact->is_read)
                        <span class="badge bg-danger bg-opacity-10 text-danger border border-opacity-25 px-2 py-1">
                            <i class="bi bi-exclamation-circle me-1"></i> Sin Leer
                        </span>
                    @endif
                </div>
                {{-- Mnesaje--}}
                <div>
                    <small class="text-muted d-block text-uppercase fw-bold mb-2">Mensaje</small>
                    <div class="bg-light p-4 rounded text-dark fs-6">{{ $contact->message }}</div>
                </div>
                <hr class="text-muted opacity-25 my-4">                
                {{-- Formulario para respuesta --}}
                <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-uppercase fw-bold text-secondary small" style="letter-spacing: 0.5px;">Redactar Respuesta</label>
                        <textarea name="respuesta" class="form-control" rows="4" placeholder="Escribí acá tu respuesta para el cliente..." required></textarea>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <button type="submit" class="btn btn-color-matiensos text-white fw-bold px-4 shadow-sm">
                            <i class="bi bi-send-check me-2"></i> Enviar Respuesta
                        </button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>