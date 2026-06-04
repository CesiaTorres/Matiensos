<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PasswordResetController;
/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');

Route::get('/contacto', function () {
    return view('front.contacto'); 
}) ->name('contacto');

Route::get('/quienes-somos', function () {
    return view('front.quienes-somos');
}) ->name('quienes-somos');

Route::get('/productos', function () {
    return view('front.products');
}) ->name('productos');

Route::get('/terminos-y-usos', function () {
    return view('front.terms');
}) ->name('terminos-y-usos');

Route::get('/envios-y-entregas', function () {
    return view('front.envios');
}) ->name('envios-y-entregas');

Route::get('/medios-de-pago', function () {
    return view('front.pagos');
}) ->name('medios-de-pago');


Route::get('/pagina-en-construcción', function () {
    return view('front.paginaConstruccion');
}) ->name('pagina-en-construccion');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {

    Route::get('/acceso', 'showLogin')
    ->name('acceso');

    Route::post('/acceso', 'login')
        ->name('login');

    Route::get('/registro', 'showRegister')
        ->name('registro');

    Route::post('/registro', 'register')
        ->name('register');

    Route::post('/logout', 'logout')
        ->name('logout');

        /* Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');*/
});


/*
|--------------------------------------------------------------------------
| RUTAS USUARIO LOGUEADO
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/perfil_user', function () {
        return view('front.perfil_user');
    })->name('perfil_user');

    Route::post('/perfil_user', [AuthController::class, 'updateProfile'])
        ->name('perfil.update');

});

/*
|--------------------------------------------------------------------------
| RUTAS ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

});

/*
|--------------------------------------------------------------------------
|ruta temporal 
|--------------------------------------------------------------------------
*/  
Route::get('/test-mail', function () {

    Mail::raw('Correo de prueba', function ($message) {

        $message->to('test@test.com')
                ->subject('Prueba Mailtrap');

    });

    return 'Correo enviado';
});

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])
    ->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
    ->name('password.update');

/*
|--------------------------------------------------------------------------
|ruta recuperar contraseña
|--------------------------------------------------------------------------
*/

// 1. Ruta para MOSTRAR el formulario (Le cambiamos el nombre a .request)
Route::get('/recuperar-contrasenia', [PasswordResetController::class, 'showForgotForm'])
    ->name('password.forgot');

// 2. Ruta para PROCESAR el formulario (Esta es la que se queda con el nombre oficial)
Route::post('/recuperar-contrasenia', [PasswordResetController::class, 'sendResetLinkEmail'])
    ->name('password.request');

    // 3. Ruta para mostrar el formulario de cambio de contraseña
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
    ->name('password.reset');
    // 4. Ruta para guardar la nueva contraseña
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
    ->name('password.update');