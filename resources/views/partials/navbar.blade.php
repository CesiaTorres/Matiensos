<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        {{-- Seccion logo + titulo --}}
        <a class="navbar-brand" href="{{ route('inicio') }}">
            <span class="title-brand">🧉Matiensos</span>
        </a>
        {{-- Adapta las opciones que siguen a pantalla de celulares --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            
            {{-- Seccion de opciones centrales 'Productos', 'Nosotros' y 'Contacto' --}}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mates</a></li>
                        <li><a class="dropdown-item" href="#">Bombillas</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Ver todos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                </li>
            </ul>

            {{-- Seccion de botones 'Iniciar Sesion' y 'Registrarse' --}}
            <div class="d-flex align-items-center ms-auto">
                <div class="me-3">
                    <a href="#" class="btn btn-sm btn-outline-dark me-2">Iniciar Sesión</a>
                    <a href="#" class="btn btn-sm btn-dark">Registrarse</a>
                </div>
            </div>

            {{-- Seccion de iconos de compras y favoritos --}}
            <div class="d-flex gap-3">
                <a href="#" class="text-dark">
                    <i class="bi bi-heart fs-5"></i>
                </a>
                <a href="#" class="text-dark position-relative">
                    <i class="bi bi-bag-fill fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">0</span>
                </a>
            </div>

        </div>
    </div>
</nav>