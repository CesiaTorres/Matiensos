<nav class="navbar navbar-expand-lg bg-navbar sticky-top">
    <div class="container-fluid">
        {{-- Seccion logo + titulo --}}

        <a class="navbar-brand" href="{{ route('inicio') }}">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/icon-mate-logo.png') }}" 
                    alt="Logo Matiensos" 
                    width="50" 
                    height="50" 
                    class="me-2">
                <span class="fs-1 text-light">Matiensos</span>
            </div>
        </a>

        {{-- Adapta las opciones que siguen a pantalla de celulares --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent"> 
            {{-- Seccion de opciones centrales 'Productos', 'Nosotros' y 'Contacto' --}}
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mates</a></li>
                        <li><a class="dropdown-item" href="#">Termos</a></li>
                        <li><a class="dropdown-item" href="#">Bombillas</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('productos')}}">Ver todos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('quienes-somos') }}">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Comercialización
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('envios-y-entregas')}}">Envios y Entregas</a></li>
                        <li><a class="dropdown-item" href="{{ route('medios-de-pago') }}">Medios de Pago</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('terminos-y-usos') }}">Términos y Usos</a>
                </li>
            </ul>

            {{-- Seccion de opciones 'Usuario' y 'Carrito de compras' --}}
            <div class="d-flex align-items-center ms-auto gap-3">
                {{-- ícono menu de Usuario. Opciones 'Iniciar Sesion' y 'Registrarse' --}}

                <div class="dropdown">
                    <a class="nav-link-icon dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('acceso')}}">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="{{route('registro')}}">Registrarse</a></li>
                    </ul>
                </div>
                
                <a href="{{ route('pagina-en-construccion') }}" class="nav-link-icon position-relative">
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