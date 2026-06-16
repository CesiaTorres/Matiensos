{{-- Tabla de consultas del usuario --}}
<div class="col-lg-12 mt-4">
        <div class="card border-0 shadow-sm bg-white p-4 rounded-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark m-0">Consultas Enviadas</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Fecha</th>
                            <th>Asunto / Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($contacts->isEmpty())
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">
                                    No enviaste ninguna consulta todavía.
                                </td>
                            </tr>
                        @else
                            @foreach($contacts as $contact)
                                <tr>
                                    <td style="white-space: nowrap;">
                                        <div class="fw-semibold text-muted">{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y H:i') }}</div>
                                    </td>
        
                                    <td style="max-width: 360px;">
                                        <div class="fw-bold text-dark">{{ $contact->subject }}</div>
                                        <div class="text-muted small text-truncate">
                                            {{ $contact->message }}</div>
    
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-auto pt-3">
                <x-_pagination :items="$contacts" label="consultas" />
            </div>
        </div>
    </div>