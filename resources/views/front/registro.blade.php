@extends('layouts.app')
@section('titulo', 'Registro | Matiensos')


@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-5">

            <form action="{{ route('register') }}" method="POST" class="card shadow-sm p-4">
                @csrf
                <h2 class="text-center mb-4">Crear Cuenta</h2>

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre/s</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Juan Ezequiel" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido/s</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Perez" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" required>
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
                            onclick="togglePassword('password', 'eyeIcon1')">

                            <i id="eyeIcon1" class="bi bi-eye-slash"></i>

                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <div class="input-group">
                        <input type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                            required>

                        <button class="btn btn-outline-secondary"
                            type="button"
                            onclick="togglePassword('password_confirmation', 'eyeIcon2')">

                            <i id="eyeIcon2" class="bi bi-eye-slash"></i>

                        </button>
                    </div>
                    <small id="passwordMessage"></small>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="terms" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">
                        <p class="text-dark text-muted">Acepto los
                            <a href="{{ route ('terminos-y-usos') }}" target="_blank" class="text-dark text-muted">Términos y Usos</a>
                        </p>
                    </label>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2">
                        Registrarse
                    </button>
                </div>

                <div class="text-center mt-3">
                    <p class="small">¿Ya tienes cuenta?
                        <a href="{{ route('acceso') }}" class="text-dark text-muted">Inicia sesión</a>
                    </p>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    function togglePassword(passwordId, iconId) {
        const password = document.getElementById(passwordId);
        const icon = document.getElementById(iconId);

        password.type = password.type === 'password' ? 'text' : 'password';

        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    }

    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const passwordMessage = document.getElementById('passwordMessage');

    function validatePasswords() {

        if (password.value.length > 0 && password.value.length < 6) {
            passwordMessage.textContent = 'La contraseña debe tener al menos 6 caracteres';
            passwordMessage.className = 'text-danger';
            return;
        }

        if (confirmPassword.value.length === 0) {
            passwordMessage.textContent = '';
            return;
        }

        if (password.value === confirmPassword.value) {
            passwordMessage.textContent = 'Las contraseñas coinciden';
            passwordMessage.className = 'text-success';
        } else {
            passwordMessage.textContent = 'Las contraseñas no coinciden';
            passwordMessage.className = 'text-danger';
        }
    }

    password.addEventListener('input', validatePasswords);
    confirmPassword.addEventListener('input', validatePasswords);
</script>
@endsection