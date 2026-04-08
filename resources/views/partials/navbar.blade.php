<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        {{-- Seccion logo + titulo --}}
        <a class="navbar-brand" href="{{ route('inicio') }}">
            <span class="d-flex align-items-center fs-1 fw-bold text-success">🧉Matiensos</span>
        </a>
        
        {{-- Adapta las opciones que siguen a pantalla de celulares --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent"> 
            {{-- Seccion de opciones centrales 'Productos', 'Nosotros' y 'Contacto' --}}
            <ul class="navbar-nav mx-auto text-secondary">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mates</a></li>
                        <li><a class="dropdown-item" href="#">Termos</a></li>
                        <li><a class="dropdown-item" href="#">Bombillas</a></li>
                        <li><a class="dropdown-item" href="#">Bolsos</a></li>
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

            {{-- Seccion de opciones 'Usuario', 'Favoritos' y 'Carrito de compras' --}}
            <div class="d-flex align-items-center ms-auto gap-3">
                {{-- ícono menu de Usuario. Opciones 'Iniciar Sesion' y 'Registrarse' --}}
                <div class="dropdown">
                    <a class="nav-link-icon dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle "></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Registrarse</a></li>
                    </ul>
                </div>
                {{-- Seccion de iconos de compras y favoritos --}}
                <a href="#" class="nav-link-icon">
                    <i class="bi bi-heart"></i>
                </a>
                <a href="#" class="nav-link-icon position-relative">
                    <i class="bi bi-bag-fill"></i>
                    <span class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle"
                        style="font-size: 0.6rem;">
                        0
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>