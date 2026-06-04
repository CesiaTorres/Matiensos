@extends('layouts.app')
@section('titulo', 'Recuperar-contraseña | Matiensos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-5">

            <form action="{{ route('password.forgot') }}" method="POST" class="card shadow-sm p-4">
                @csrf
                
                <h2 class="text-center mb-4">Recupera tu cuenta</h2>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Introduce tu dirección de correo electrónico.</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required autofocus>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-color-matiensos text-white fw-bold py-2">
                        Continuar
                    </button>
                </div>
                
            </form> 

        </div>
    </div>
</div>
@endsection