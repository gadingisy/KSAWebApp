<?php

use App\Http\Controllers\Angsuran\AngsuranController;
use App\Http\Controllers\Nasabah\NasabahController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes(['register' => false]);

Route::prefix('nasabah')->group(function () {
    Route::get('/', 'Nasabah\NasabahController@index');
    Route::get('/dt', 'Nasabah\NasabahController@dt');
    Route::get('/lastid', 'Nasabah\NasabahController@lastid');
    Route::POST('/insert', 'Nasabah\NasabahController@insert');
    Route::POST('/edit', 'Nasabah\NasabahController@edit');
    Route::POST('/update', 'Nasabah\NasabahController@update');
    Route::DELETE('/delete', 'Nasabah\NasabahController@delete');
});

Route::prefix('pembayaran')->group(function () {
    Route::get('/', 'Angsuran\AngsuranController@index');
    Route::get('/dt', 'Angsuran\AngsuranController@dt');
    Route::get('/lastid', 'Angsuran\AngsuranController@lastid');
    Route::POST('/insert', 'Angsuran\AngsuranController@insert');
    Route::POST('/edit', 'Angsuran\AngsuranController@edit');
    Route::POST('/update', 'Angsuran\AngsuranController@update');
    Route::DELETE('/delete', 'Angsuran\AngsuranController@delete');
});



Route::prefix('penjualan')->group(function () {
    Route::get('/', 'Penjualan\PenjualanController@index');
    Route::get('/dt', 'Penjualan\PenjualanController@dt');
    Route::get('/lastid', 'Penjualan\PenjualanController@lastid');
    Route::POST('/insert', 'Penjualan\PenjualanController@insert');
    Route::POST('/edit', 'Penjualan\PenjualanController@edit');
    Route::POST('/update', 'Penjualan\PenjualanController@update');
    Route::DELETE('/delete', 'Penjualan\PenjualanController@delete');
    Route::get('/getKontrak', 'Penjualan\PenjualanController@getKontrak');
    Route::get('/getKontrakID', 'Penjualan\PenjualanController@getKontrakID');
});


Route::prefix('va')->group(function () {
    Route::get('/', 'VA\VAController@index');
    Route::get('/dt', 'VA\VAController@dt');
    Route::get('/lastid', 'VA\VAController@lastid');
    Route::get('/getKontrak', 'VA\VAController@getKontrak');
    Route::get('/getKontrakID', 'VA\VAController@getKontrakID');
    Route::POST('/insert', 'VA\VAController@insert');
    Route::POST('/edit', 'VA\VAController@edit');
    Route::POST('/update', 'VA\VAController@update');
    Route::DELETE('/delete', 'VA\VAController@delete');
});

Route::post('import', [AngsuranController::class, 'import'])->name('import');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
