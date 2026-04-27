<footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row text-center text-md-start justify-content-between">
            <div class="col-md-2 mb-4 small">
                <h5 class="text-white text-uppercase">Matiensos</h5>
                <p class="text-light opacity-75" style="line-height: 1.6;">
                    Tu tienda de confianza para el ritual del mate. Calidad artesanal y envíos garantizados.
                </p> 
            </div>
            {{-- Columna 1: Categorías --}}
            <div class="col-md-2 col-sm-6 mb-4 small">
                <h5>Comercialización</h5>
                <ul class="list-unstyled mb-3">
                    <li><a href="{{ route('envios-y-entregas') }}" target="_blank"class="text-decoration-none text-light opacity-75"><i class="bi bi-truck me-2"></i>Envios y Entregas</a></li>
                    <li><a href="{{ route('quienes-somos') }}" target="_blank" class="text-decoration-none text-light opacity-75"><i class="bi bi-credit-card me-2"></i>Medios de Pago</a></li>
                </ul>
            </div>

            {{-- Columna 2: Contactos --}}
            <div class="col-md-2 col-sm-6 mb-4 small">
                <h5>Contactanos</h5>
                <ul class="list-unstyled mb-3">
                    <li><a href="https://wa.me/3782456372" target="_blank" class="text-decoration-none text-light opacity-75"><i class="bi bi-whatsapp me-2"></i>3782456372</a></li>
                    <li class="text-decoration-none text-light opacity-75"><i class="bi bi-envelope me-2"></i>matiensos@gmail.com</li>
                    <li><a href="{{route('pagina-en-construccion')}}" target="_blank" class="text-decoration-none text-light opacity-75"><i class="bi bi-geo-alt me-2"></i>Av. Las Heras 727, Corrientes</a></li>
                </ul>
            </div>

            {{-- Columna 3: Legales --}}
            <div class="col-md-2 col-sm-6 mb-4 small">
                <h5>Términos y Legales</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('terminos-y-usos') }}" target="_blank" class="text-decoration-none text-light opacity-75">Términos y Usos</a></li>
                </ul>
            </div>

            {{-- Columna 4: Redes sociales --}}
            <div class="col-md-2 col-sm-6 mb-4 small">
                <h5>Redes Sociales</h5>
                <ul class="list-unstyled mb-3">
                    <li><a href="https://www.facebook.com"  target="_blank" class="text-decoration-none text-light opacity-75"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                    <li><a href="https://x.com"  target="_blank" class="text-decoration-none text-light opacity-75"><i class="bi bi-twitter-x me-2"></i>Twitter</a></li>
                    <li><a href="https://www.instagram.com"  target="_blank" class="text-decoration-none text-light opacity-75"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
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