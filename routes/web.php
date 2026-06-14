<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\CartController;

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


//CLIENTE
Route::prefix('cliente')->middleware(['auth', 'role:2'])->group(function () {
    Route::post('/contacto/enviar', [ContactController::class, 'store'])->name('contact.store');

    //Carrito de Compras
    Route::get('/carrito', [CartController::class, 'index'])->name('cart');
    Route::post('/agregar/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/eliminar/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/vaciar', [CartController::class, 'clear'])->name('cart.clear');
    
    Route::get('/test-llenar', function () {
        $cart = [
            999 => [
                'id' => 999,
                'name' => 'Mate Imperial de Prueba',
                'price' => 45000,
                'image_url' => null,
                'quantity' => 2
            ]
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Carrito de prueba cargado.');
    });
    
});
Route::get('/test-llenar', function () {
        $cart = [
            999 => [
                'id' => 999,
                'name' => 'Mate Imperial de Prueba',
                'price' => 45000,
                'image' => null,
                'quantity' => 2
            ]
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Carrito de prueba cargado.');
    });

//ADMINISTRADOR
Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

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
    Route::get('/orders{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/orders/{order}/print', [OrderController::class, 'print'])->name('admin.orders.print');

    //Gestion de Consultas
    Route::get('/contactos', [ContactController::class, 'index'])->name('admin.contacts');
    Route::put('contactos/{contact}/toggle', [ContactController::class, 'toggleRead'])->name('admin.contacts.toggle');
    Route::post('/contactos/{contact}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');


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
    
