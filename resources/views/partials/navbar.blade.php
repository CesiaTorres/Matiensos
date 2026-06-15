<nav class="navbar navbar-expand-lg bg-navbar sticky-top">
    <div class="container-fluid">
        {{-- Seccion izquierda: logo + titulo --}}
        <a class="navbar-brand" href="{{ route('inicio') }}">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/inicio/icon-mate-logo.png') }}"
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
            {{-- Seccion de opciones centrales --}}
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('productos') }}#mates">Mates</a></li>
                        <li><a class="dropdown-item" href="{{ route('productos') }}#bombillas">Bombillas</a></li>
                        <li><a class="dropdown-item" href="{{ route('productos') }}#termos">Termos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
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
                    <a class="nav-link" target="_blank" href="{{ route('terminos-y-usos') }}">Términos y Usos</a>
                </li>
            </ul>
            {{-- Seccion de opciones dcha --}}
            <div class="d-flex align-items-center ms-auto gap-3">
                {{-- Opciones user --}}
                <div class="d-flex align-items-center gap-2">

                    @auth
                    <span class="text-light"> Hola, {{ Auth::user()->name }} </span>

                    @endauth

                    <div class="dropdown">

                        <a class="nav-link-icon dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle"></i>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-md-end shadow-sm border-0">

                            @guest
                            <li>
                                <a class="dropdown-item" href="{{ route('acceso') }}">
                                    Iniciar Sesión
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('registro') }}">
                                    Registrarse
                                </a>
                            </li>
                            @endguest

                            @auth
                            <li>
                                <a class="dropdown-item" href="{{ route('perfil_user') }}">
                                    Mi perfil
                                </a>
                            </li>
                            @if(Auth::user()->role_id == 1)

                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Gestionar Tienda </a>

                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                            @endauth

                        </ul>

                    </div>

                </div>
                
                @auth
                    @if(auth()->user()->role_id == 2)
                        @php 
                            $cartCount = app(App\Services\CartService::class)->count(); 
                        @endphp
                        <a href="#offcanvasCarrito" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasCarrito" class="nav-link-icon position-relative">
                            <i class="bi bi-bag-fill"></i>

                            @if($cartCount > 0)
                                <span class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle" style="font-size: 0.6rem;">
                                    {{ $cartCount }}
                                </span>
                            @endif
                            
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

</nav>
@include('front.carrito._cart-offcanvas')