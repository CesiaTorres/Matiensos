<nav class="navbar navbar-expand-lg bg-navbar border-bottom">
    <div class="container-fluid">
        {{-- Seccion logo + titulo --}}
        <a class="navbar-brand" href="{{ route('inicio') }}">
            <span class="title-nav">🧉Matiensos</span>
        </a>
        {{-- Adapta las opciones que siguen a pantalla de celulares --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            
            {{-- Seccion de opciones centrales 'Productos', 'Nosotros' y 'Contacto' --}}
            <ul class="navbar-nav mx-auto opc-nav">
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
            <div class="icon-nav-config">
                {{-- ícono menu de Usuario. Opciones 'Iniciar Sesion' y 'Registrarse' --}}
                <div class="dropdown">
                    <a class="icon-nav-btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="#">Registrarse</a></li>
                    </ul>
                </div>
                {{-- Seccion de iconos de compras y favoritos --}}
                <a href="#" class="icon-nav-btn">
                    <i class="bi bi-heart"></i>
                </a>
                <a href="#" class="icon-nav-btn">
                    <i class="bi bi-bag-fill"></i>
                    <span class="badge-notif">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>