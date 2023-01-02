<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buscar', [App\Http\Controllers\HomeController::class, 'search'])->name('buscar');
Route::get('/product/{product}',  [App\Http\Controllers\ProductController::class, 'index'])->name('product');
// Rutas que requieren que el usuario este logeado
Route::get('/categoria/{name}', [App\Http\Controllers\CategoriasController::class, 'index'])->name('categorias');

Route::get('/privacy', function () {
    return view('politica.index');
})->name('privacy');


   # Reinicio de Contra
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/reeee', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::group(['middleware' => 'auth'], function () {

    Route::get('/user/details', function () {
        return view('profile.show');
    })->name('usuarios.detalles');
    Route::post('usuario/actualizar/pass', [App\Http\Controllers\AccountController::class, 'actualizarcontra'])->name('actualizar.pass');
    Route::post('usuario/actualizar/dato', [App\Http\Controllers\AccountController::class, 'actualizardato'])->name('actualizar.dato');

   # Ver hoja de categorias
    Route::resource('order', 'App\Http\Controllers\AccountController');
    # Agregar al carrito Store Data
    Route::get('/orders/pending', [App\Http\Controllers\AccountController::class, 'pendingorder'])->name('order.pending');

    #   =========== Modal y Store Data del carrito =================
    Route::get('/cart',  [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    # Agregar al carrito Store Data
    Route::post('/cart/store/{id}', [App\Http\Controllers\CartController::class, 'addCart'])->name('add_cart');
    # Actualizar datos del item del carro
    Route::get('/cart/update', [App\Http\Controllers\CartController::class, 'updateQty'])->name('update_cart');
    # Remueve un item del carrito
    Route::get('/cart/remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('remove_cart');
    # Finalizar la compra
    Route::post('/cart/order', [App\Http\Controllers\CartController::class, 'finalorder'])->name('final_order');
});
