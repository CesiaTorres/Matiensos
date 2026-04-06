<footer class="bg-dark text-light py-5 mt-auto">
    <div class="container text-center text-md-start">
        <div class="row justify-content-between">
            
            {{-- Columna 1: Categorías --}}
            <div class="col-md-3 mb-4">
                <h4>Categorías</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/productos') }}" class="text-decoration-none text-light">Productos</a></li>
                    <li><a href="{{ url('/nosotros') }}" class="text-decoration-none text-light">Nosotros</a></li>
                    <li><a href="{{ url('/contacto') }}" class="text-decoration-none text-light">Contactos</a></li>
                </ul>
            </div>

            {{-- Columna 2: Info --}}
            <div class="col-md-5 mb-4 px-md-5 border-start border-secondary border-opacity-25">
                <h4>Sobre Nosotros</h4>
                <p><i class="bi bi-whatsapp me-2"></i> 3782456372</p>
                <p><i class="bi bi-envelope me-2"></i> Correo@gmail.com </p>
                <p><i class="bi bi-geo-alt me-2"></i> Av. Las Heras 727, Corrientes</p>
            </div>

            {{-- Columna 3: Redes Sociales --}}
            <div class="col-md-3 mb-4 px-md-5 border-start border-secondary border-opacity-25">
                <h4>Seguinos</h4>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-light"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                    <li><a href="#" class="text-decoration-none text-light"><i class="bi bi-twitter-x me-2"></i>Twitter</a></li>
                    <li><a href="#" class="text-decoration-none text-light"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                </ul>
                 {{-- Botón Ir Arriba --}}
                <div class="col-12 d-flex justify-content-center justify-content-md-start mt-4">
                <a href="#top" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-arrow-up"></i> Ir arriba
                </a>
            </div>
            </div>
        
        <hr class="bg-light my-4">

        {{-- Copyright --}}
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 small opacity-75">Derechos de autor &copy; 2026 Universidad Nacional del Nordeste. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>