<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    
});