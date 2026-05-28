<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');


Route::get('/contacto', function () {
    return view('front.contacto'); 
}) ->name('contacto');

Route::get('/quienes-somos', function () {
    return view('front.quienes-somos');
}) ->name('quienes-somos');



Route::get('/acceso', function () {
    return view('front.acceso');
}) ->name('acceso');
Route::get('/registro', function () {
    return view('front.registro');
}) ->name('registro');



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


//Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //Gestion de Productos
    Route::get('/productos', [ProductController::class, 'index'])->name('admin.products');
    Route::post('/productos', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/admin/productos/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/productos/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    
});