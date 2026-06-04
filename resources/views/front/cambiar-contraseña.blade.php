@extends('layouts.app')
@section('titulo', 'Recuperar-contraseña | Matiensos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-5">

            <form action="{{ route('password.update') }}" method="POST" class="card shadow-sm p-4">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <h2 class="text-center mb-4">Restablecer contraseña</h2>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="newPassword">Nueva contraseña</label>
                        <div class="input-group">
                            <input id="newPassword" type="password" class="form-control" name="password" required>

                            <button class="btn btn-outline-secondary"
                                type="button"
                                onclick="togglePassword('newPassword', this)">

                                <i id="eyeIcon" class="bi bi-eye-slash"></i>

                            </button>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="password-confirm">Confirmar contraseña</label>
                        <div class="input-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            <button class="btn btn-outline-secondary"
                                type="button"
                                onclick="togglePassword('password-confirm', this)">

                                <i id="eyeIcon" class="bi bi-eye-slash"></i>

                            </button>
                        </div>
                        <small id="passwordMessage"></small>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2">
                        Restablecer contraseña
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
    function togglePassword(inputId, button) {

        const input = document.getElementById(inputId);

        const icon = button.querySelector('i');

        input.type =
            input.type === 'password' ?
            'text' :
            'password';

        icon.classList.toggle('bi-eye');

        icon.classList.toggle('bi-eye-slash');
    }

    // VALIDAR CONFIRMACIÓN

    const newPassword = document.getElementById('newPassword');

    const confirmPassword = document.getElementById('password-confirm');

    const passwordMessage = document.getElementById('passwordMessage');

    function validatePasswords() {

        if (newPassword.value.length > 0 && newPassword.value.length < 6) {

            passwordMessage.textContent = 'La contraseña debe tener al menos 6 caracteres';
            passwordMessage.className = 'text-danger';

            return;
        }

        if (confirmPassword.value.length === 0) {

            passwordMessage.textContent = '';
            return;
        }

        if (newPassword.value === confirmPassword.value) {

            passwordMessage.textContent = 'Las contraseñas coinciden';
            passwordMessage.className = 'text-success';

        } else {

            passwordMessage.textContent = 'Las contraseñas no coinciden';
            passwordMessage.className = 'text-danger';
        }
    }

    newPassword.addEventListener('input', validatePasswords);
    confirmPassword.addEventListener('input', validatePasswords);

    
</script>
@endsection