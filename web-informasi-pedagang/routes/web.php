<?php

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

Route::get('/', function () {
    return view('index');
});
//to index kurir
Route::get(
    '/kurir/index', 'RequestKurirControllers@index'
)->name('kurirIndex');

Route::get(
    '/kurir/request', 'RequestKurirControllers@request'
)->name('kurirRequest');

Route::get(
    '/kurir/requestp', 'RequestKurirControllers@requestp'
)->name('kurirRequestp');

Route::get(
    '/kurir/konfirmasi', 'RequestKurirControllers@konfir'
)->name('kurirKonfirmasi');

Route::get(
    '/kurir/viewproduk', 'RequestKurirControllers@view'
)->name('kurirViewproduk');

Route::get(
    '/kurir/pedagang', 'RequestKurirControllers@pedagangView'
)->name('kurirProdukd');

Route::get(
    '/kurir/konfirmasipdg', 'RequestKurirControllers@konfirpdg'
)->name('kurirKonfirmasipdg');
