<!DOCTYPE html> {{-- resources/views/layouts/app.blade.php --}}
<html lang="es">

<head>
    {{-- Llamas a head --}}
    @include('partials.head')
</head>

<body id="top">

    {{-- Llamas a navbar --}}
    @include('partials.navbar')

    {{-- Toast global --}}
    @if(session('success') || session('error'))

    <div class="toast-container position-fixed bottom-40 end-0 p-3">

        <div class="toast align-items-center border-0 show
            {{ session('success') ? 'text-bg-success' : 'text-bg-danger' }}"
            role="alert">

            <div class="d-flex">

                <div class="toast-body">

                    {{ session('success') ?? session('error') }}

                </div>

                <button type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast">
                </button>

            </div>
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