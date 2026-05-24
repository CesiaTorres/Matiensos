<!DOCTYPE html> {{-- resources/views/layouts/app.blade.php --}}
<html lang="es">

<head>
    {{-- Llamas a head --}}
    @include('partials.head')
</head>

<body id="top">

    {{-- Llamas a navbar --}}
    @include('partials.navbar')
    @if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>
    </div>
    @endif

    <main>
        {{-- Aquí se inyectará "Nosotros", "Inicio", etc. --}}
        @yield('content')
    </main>

    {{-- Llamas a footer --}}
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>