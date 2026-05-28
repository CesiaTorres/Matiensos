<!DOCTYPE html>
<html lang="es">
    <head>
        {{-- head del admin --}}
        @include('admin.partials.head-admin')
    </head>

    <body>
        <div class="d-flex">
            {{-- menú lateral --}}
            @include('admin.partials._sidebar')

            <div class="flex-grow-1 w-0 min-vh-100">
                <main class="p-4">
                    {{-- Dashboard, Lista de Productos, etc. --}}
                    @yield('content')
                </main>
            </div>
            
        </div>
        {{-- Los scripts del admin --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>