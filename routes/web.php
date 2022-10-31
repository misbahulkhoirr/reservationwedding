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
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@auth');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/register', 'App\Http\Controllers\RegisterController@index');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index');

    Route::group(['middleware' => ['admin']], function () {
        Route::resource('/paket', App\Http\Controllers\PaketController::class);
        Route::resource('/busana', App\Http\Controllers\BusanaController::class);
        Route::resource('/catering', App\Http\Controllers\CateringController::class);
        Route::resource('/dokumentasi', App\Http\Controllers\DokumentasiController::class);
        Route::resource('/entertainment', App\Http\Controllers\EntertainmentController::class);
        Route::resource('/mc', App\Http\Controllers\McController::class);
        Route::resource('/pelaminan', App\Http\Controllers\PelaminanController::class);
        Route::get('/riwayat_transaksi_admin', 'App\Http\Controllers\TransaksiController@indexTransaksiAdmin');
        Route::get('/detail_transaksi_admin/{kode_transaksi}', 'App\Http\Controllers\TransaksiController@detailTransaksi');
        Route::post('/detail_transaksi/ubahstatus/{id}', 'App\Http\Controllers\TransaksiController@ubah_status');
    });

    Route::get('/paket', 'App\Http\Controllers\PaketController@index');
    Route::get('/paket/{paket}', 'App\Http\Controllers\PaketController@show');

    Route::get('/busana', 'App\Http\Controllers\BusanaController@index');
    Route::get('/busana/{busana}', 'App\Http\Controllers\BusanaController@show');

    Route::get('/catering', 'App\Http\Controllers\CateringController@index');
    Route::get('/catering/{catering}', 'App\Http\Controllers\CateringController@show');

    Route::get('/dokumentasi', 'App\Http\Controllers\DokumentasiController@index');
    Route::get('/dokumentasi/{dokumentasi}', 'App\Http\Controllers\DokumentasiController@show');

    Route::get('/entertainment', 'App\Http\Controllers\EntertainmentController@index');
    Route::get('/entertainment/{entertainment}', 'App\Http\Controllers\EntertainmentController@show');

    Route::get('/mc', 'App\Http\Controllers\McController@index');
    Route::get('/mc/{mc}', 'App\Http\Controllers\McController@show');

    Route::get('/pelaminan', 'App\Http\Controllers\PelaminanController@index');
    Route::get('/pelaminan/{pelaminan}', 'App\Http\Controllers\PelaminanController@show');

    Route::get('/cart', 'App\Http\Controllers\CartController@index');
    Route::get('/cart/{produk}', 'App\Http\Controllers\CartController@store');
    Route::delete('/cart/{cart}', 'App\Http\Controllers\CartController@destroy');
    Route::post('/transaksi', 'App\Http\Controllers\TransaksiController@store');
    Route::get('/riwayat_transaksi_user', 'App\Http\Controllers\TransaksiController@indexTransaksiUser');
    Route::get('/detail_transaksi_user/{kode_transaksi}', 'App\Http\Controllers\TransaksiController@detailTransaksiUser');
});
