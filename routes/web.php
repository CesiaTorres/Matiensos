<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');

//Rutas publicas
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

//modificar el registro!!!!!!!!!!!!!!
Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro'); //Ver el formulario
Route::post('/registro', [AuthController::class, 'register'])->name('register.store'); //Enviar datos

Route::get('/acceso', function () {
    return view('front.acceso');
}) ->name('acceso');


//Invitado
Route::middleware('guest')->group(function () {
   
    
});

//Solo customer
Route::middleware(['auth', 'role:customer'])->group(function () {
    //Route::get('/carrito', [CartController::class, 'index']);
});

//Solo admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Route::get('/admin/dashboard', [AdminController::class, 'index']);
});






