@extends('layouts.app')
@section('titulo', 'Acceso | Matiensos')


@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-5">
            <form action="{{ route('pagina-en-construccion') }}" method="GET" class="card shadow-sm p-4">
                @csrf
                <h2 class="text-center mb-4">Ingresar</h2>        
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2">
                        Entrar
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
    
@endsection