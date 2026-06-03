@extends('layouts.app')
@section('titulo', 'Acceso | Matiensos')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-5">
            {{-- Formulario de acceso --}}
            <form action="{{ route('login') }}" method="POST" class="card shadow-sm p-4">
                @csrf
                <h2 class="text-center mb-4">Ingresar</h2>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            required>

                        <button class="btn btn-outline-secondary"
                            type="button"
                            onclick="togglePassword()">

                            <i id="eyeIcon" class="bi bi-eye-slash"></i>

                        </button>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>
                {{-- Boton 'Entrar' --}}
                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2">
                        Entrar
                    </button>
                </div>
                <div class="text-center mt-2">
                    <a href="#" class="text-dark text-muted">
                        ¿Has olvidado la contraseña?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        password.type =
            password.type === 'password' ?
            'text' :
            'password';
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    }
</script>
@endsection