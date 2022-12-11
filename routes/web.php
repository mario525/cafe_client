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
Route::get('/product/{product}',  [App\Http\Controllers\ProductController::class, 'index'])->name('product');
// Rutas que requieren que el usuario este logeado
Route::get('/categoria/{name}', [App\Http\Controllers\CategoriasController::class, 'index'])->name('categorias');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::group(['middleware' => 'auth'], function () {
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
