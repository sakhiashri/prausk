<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//saldo 

Route::get('/topup', [App\Http\Controllers\SaldoController::class, 'index'])->name('saldo');
Route::Post('/create', [App\Http\Controllers\SaldoController::class, 'store'])->name('topup.saldo');
Route::get('/topup/setuju/{transaksi_id}', [App\Http\Controllers\SaldoController::class, 'update'])->name('topup.setuju');
Route::get('/topup/tolak/{transaksi_id}', [App\Http\Controllers\SaldoController::class, 'destroy'])->name('topup.tolak');

//shopping cart

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::post('/addTocart{id}', [App\Http\Controllers\ProdukController::class, 'create'])->name('addTocart');
Route::get('/checkout', [App\Http\Controllers\ProdukController::class, 'update'])->name('checkout');
Route::get('/bayar', [App\Http\Controllers\ProdukController::class, 'show'])->name('bayar');
Route::get('/bayar/setuju/{id}', [App\Http\Controllers\ProdukController::class, 'setuju'])->name('bayar.setuju');
Route::get('/bayar/tolak/{id}', [App\Http\Controllers\ProdukController::class, 'tolak'])->name('bayar.tolak');


//Crud Menu

Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/edit{id}', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/update{id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/delete{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.delete');


//tarik tunai



Route::Post('/tunai', [App\Http\Controllers\TarikTunaiController::class, 'store'])->name('tunai.saldo');
Route::get('/tunai/setuju/{tunai_id}', [App\Http\Controllers\TarikTunaiController::class, 'update'])->name('tunai.setuju');
Route::get('/tunai/tolak/{tunai_id}', [App\Http\Controllers\TarikTunaiController::class, 'destroy'])->name('tunai.tolak');


//Riwayar saldo


Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');



//crud user

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/edit{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');




