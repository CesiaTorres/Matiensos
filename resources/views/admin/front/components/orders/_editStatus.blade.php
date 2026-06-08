{{-- MODAL para ACTUALIZAR ESTADO DEL PEDIDO --}}
<div class="modal fade" id="editStatusModal{{ $order->id }}" tabindex="-1" aria-labelledby="editStatusModalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">    
            
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="editStatusModalLabel{{ $order->id }}">
                    <i class="bi bi-truck me-2 color-matiensos"></i>Actualizar Pedido {{ $order->code }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Formulario para modificar datos --}}  
            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="modal-body p-4">
                    {{-- Estados --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Estado del Pedido</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Pagado</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Enviado</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Entregado</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>                    
                    {{-- Cod de seguimiento --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Número de Seguimiento</label>
                        <input type="text" name="tracking_number" class="form-control" 
                               value="{{ $order->tracking_number }}" 
                               placeholder="Ej: AR-123456789">
                        <div class="form-text">Ingresá el código del correo para que el cliente pueda seguir su paquete.</div>
                    </div>
                </div>
                {{-- Botones para 'Guardar' o 'Cancelar' --}}
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold">Actualizar Estado</button>
                </div>
            </form>

        </div>
    </div>
</div>