<!DOCTYPE html>
<html lang="es">
    <head>
        {{-- head del admin --}}
        @include('admin.partials.head-admin')
    </head>

    <body>
        {{-- d-flex base. Si tu sidebar no es un offcanvas en mobile, podés sumar 'flex-column flex-md-row' --}}
        <div class="d-flex min-vh-100 bg-light">
            
            {{-- menú lateral --}}
            @include('admin.partials._sidebar')

            {{-- EL TRUCO MÁGICO: min-width: 0 evita que las tablas anchas rompan el flexbox principal --}}
            <div class="flex-grow-1" style="min-width: 0;">
                
                {{-- Paddings responsivos: p-3 en celulares, p-4 a partir de tablets --}}
                <main class="p-3 p-md-4 w-100 overflow-hidden">
                    @yield('content')
                </main>
                
            </div>
            
        </div>

        {{-- Los scripts del admin --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>