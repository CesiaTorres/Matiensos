<!DOCTYPE html>
<html lang="es">
    <head>
        {{-- head del admin --}}
        @include('admin.partials.head-admin')
    </head>

    <body>
        
        {{-- menú lateral --}}
        @include('admin.partials.sidebar')
            
            <main class="p-4">
                {{-- Aquí se inyectará el Dashboard, Lista de Productos, etc. --}}
                @yield('content')
            </main>

        {{-- Los scripts del admin --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>