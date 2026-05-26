<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');



Route::get('/contacto', function () {
    return view('front.contacto'); 
}) ->name('contacto');

Route::get('/quienes-somos', function () {
    return view('front.quienes-somos');
}) ->name('quienes-somos');



Route::get('/acceso', [AuthController::class, 'showLogin'])
    ->name('acceso');
Route::post('/acceso', [AuthController::class, 'login'])
    ->name('login');

Route::get('/registro', [AuthController::class, 'showRegister'])
    ->name('registro');
Route::post('/registro', [AuthController::class, 'register'])
    ->name('register');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


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