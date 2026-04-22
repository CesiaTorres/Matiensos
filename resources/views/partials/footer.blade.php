<footer class="bg-dark text-light py-5 mt-auto">
    <div class="container">
        <div class="row text-center text-md-start">
            
            {{-- Columna 1: Categorías --}}
            <div class="col-md-3 col-sm-6 mb-4">
                <h4>Comercialización</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('envios-y-entregas') }}" class="text-decoration-none text-light opacity-75">Envios y Entregas</a></li>
                    <li><a href="{{ route('quienes-somos') }}" class="text-decoration-none text-light opacity-75">Medios de Pago</a></li>
                </ul>
            </div>

            {{-- Columna 2: Contactos --}}
            <div class="col-md-3 col-sm-6 mb-4">
                <h4>Contactos</h4>
                <p class="mb-2 text-light opacity-75"><i class="bi bi-whatsapp me-2"></i> 3782456372</p>
                <p class="mb-2 text-light opacity-75"><i class="bi bi-envelope me-2"></i> Matiensos@gmail.com</p>
                <p class="mb-2 text-light opacity-75"><i class="bi bi-geo-alt me-2"></i> Av. Las Heras 727, Corrientes</p>
            </div>

            {{-- Columna 3: Legales --}}
            <div class="col-md-3 col-sm-6 mb-4">
                <h4>Términos y Legales</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('terminos-y-usos') }}" class="text-decoration-none text-light opacity-75">Términos y Usos</a></li>
                </ul>
            </div>

            {{-- Columna 4: Redes sociales --}}
            <div class="col-md-3 col-sm-6 mb-4">
                <h4>Redes sociales</h4>
                <ul class="list-unstyled mb-3">
                    <li><a href="{{route('pagina-en-construccion')}}" class="text-decoration-none text-light opacity-75"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                    <li><a href="{{route('pagina-en-construccion')}}" class="text-decoration-none text-light opacity-75"><i class="bi bi-twitter-x me-2"></i>Twitter</a></li>
                    <li><a href="{{route('pagina-en-construccion')}}" class="text-decoration-none text-light opacity-75"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                </ul>
                <a href="#top" class="btn btn-outline-light btn-sm mt-2">
                    <i class="bi bi-arrow-up"></i> Ir arriba
                </a>
            </div>

        </div>
        
        <hr class="bg-light opacity-25 my-4">

        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 small opacity-75">Derechos de autor &copy; 2026 Universidad Nacional del Nordeste. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>