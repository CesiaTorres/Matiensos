<!DOCTYPE html> {{-- resources/views/layouts/app.blade.php --}}
<html lang="es">
    <head>
        {{-- Llamas a head --}}
        @include('partials.head') 
    </head>
    <body>

        {{-- Llamas a navbar --}}
        @include('partials.navbar')

        <div class="content">
            {{-- Aquí se inyectará "Nosotros", "Inicio", etc. --}}
            @yield('content')
        </div>

        {{-- Llamas a footer --}}
        @include('partials.footer')

    </body>
</html>