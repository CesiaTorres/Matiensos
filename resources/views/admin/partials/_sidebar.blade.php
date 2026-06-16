<div class="offcanvas-lg offcanvas-start text-white p-3 sidebar d-flex flex-column justify-content-between vh-100"
    tabindex="-1"
    id="adminSidebar"
    style="width: 260px;">

    <div class="offcanvas-header d-lg-none">
        <h5 class="offcanvas-title text-white fw-bold">
            Panel de Administración
        </h5>
        <button type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas">
        </button>
    </div>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="d-none d-lg-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <h3 class="fw-bold text-white fs-4">Panel de Administración</h3>
        </a>
        <hr class="text-white-50">
        {{-- Opciones --}}
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('admin.products') }}"
                    class="nav-link text-white {{ request()->routeIs('admin.products') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Productos
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.categories') }}"
                    class="nav-link text-white {{ request()->routeIs('admin.categories') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
                    <i class="bi bi-tags me-2"></i> Categorías
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.orders') }}"
                    class="nav-link text-white {{ request()->routeIs('admin.orders') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
                    <i class="bi bi-cart-check me-2"></i> Pedidos
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.users') }}"
                    class="nav-link text-white {{ request()->routeIs('admin.users') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.contacts') }}"
                    class="nav-link text-white {{ request()->routeIs('admin.contacts') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
                    <i class="bi bi-envelope me-2"></i> Consultas
                </a>
            </li>
        </ul>
    </div>

    <div>
        <hr class="text-white-50">
        <a href="{{ route('inicio') }}" class="nav-link text-white opacity-75 px-2">
            <i class="bi bi-box-arrow-left me-2"></i> Ir a la Tienda
        </a>
    </div>

</div>