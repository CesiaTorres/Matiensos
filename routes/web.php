<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('inicio');

Route::get('/contacto', function () {
    return view('front.contacto');
})->name('contacto');

Route::get('/quienes-somos', function () {
    return view('front.quienes-somos');
})->name('quienes-somos');

Route::get('/productos', function () {
    return view('front.products');
})->name('productos');

Route::get('/terminos-y-usos', function () {
    return view('front.terms');
})->name('terminos-y-usos');

Route::get('/envios-y-entregas', function () {
    return view('front.envios');
})->name('envios-y-entregas');

Route::get('/medios-de-pago', function () {
    return view('front.pagos');
})->name('medios-de-pago');


Route::get('/pagina-en-construcción', function () {
    return view('front.paginaConstruccion');
})->name('pagina-en-construccion');

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

    Route::get('/perfil_user', [OrderController::class, 'perfilConOrdenes'])
        ->name('perfil_user');

    Route::post('/perfil_user', [AuthController::class, 'updateProfile'])
        ->name('perfil.update');

    Route::get('/perfil/pedido/{order}', [OrderController::class, 'showUserOrder'])
        ->name('perfil.orders.show');
});



//CLIENTE
Route::prefix('cliente')->middleware(['auth', 'role:2'])->group(function () {
    Route::post('/contacto/enviar', [ContactController::class, 'store'])->name('contact.store');
});

//ADMINISTRADOR
Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //Gestion de Productos
    Route::get('/productos', [ProductController::class, 'index'])->name('admin.products');
    Route::post('/productos', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/productos/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    //Gestion de Productos
    Route::get('/categorias', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/categorias/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categorias/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    //Gestion de User
    Route::get('/usuarios', [UserController::class, 'index'])->name('admin.users');
    Route::post('/usuarios', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::patch('/usuarios/{id}/restaurar', [UserController::class, 'restore'])->name('admin.users.restore');

    //Gestion de Pedidos
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/orders/{order}/print', [OrderController::class, 'print'])->name('admin.orders.print');

    //Gestion de Contactos
    Route::get('/contactos', [ContactController::class, 'index'])->name('admin.contacts');
    Route::put('/contactos/{contact}/read', [ContactController::class, 'markAsRead'])->name('admin.contacts.read');
    Route::delete('/contactos/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});

/*
|--------------------------------------------------------------------------
|ruta recuperar contraseña - Mailtrap
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
