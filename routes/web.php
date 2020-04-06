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
Route::get('/about', function () {
    return view('about');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/jalan','BrokenRoadsController');
Route::put('/editJalan/{id}','BrokenRoadsController@updateJalan');
Route::get('/getJalanPengaduan', 'BrokenRoadsController@getJalanPengaduan');
Route::get('getDetailJalanPengaduan/{jalan}', 'BrokenRoadsController@getDetailJalanPengaduan');

Route::get('/mapPengaduan', 'BrokenRoadsController@mapPengaduan');

Route::get('/getJalanTerverifikasi', 'BrokenRoadsController@getJalanTerverifikasi');
Route::get('getDetailJalanTerverifikasi/{jalan}', 'BrokenRoadsController@getDetailJalanTerverifikasi');
Route::get('/mapTerverifikasi', 'BrokenRoadsController@mapTerverifikasi');

Route::get('/getJalanDiperbaiki', 'BrokenRoadsController@getJalanDiperbaiki');
Route::get('getDetailJalanDiperbaiki/{jalan}', 'BrokenRoadsController@getDetailJalanDiperbaiki');
Route::get('/mapDiperbaiki', 'BrokenRoadsController@mapDiperbaiki');

Route::get('detailJalan/{jalan}', 'BrokenRoadsController@detailJalanPengaduan');

Route::get('/riwayatPengaduan', 'BrokenRoadsController@riwayatPengaduan');

Route::get('getSearchMapTerverifikasi', 'BrokenRoadsController@searchMapTerverifikasi');
Route::get('getSearchMapDiperbaiki', 'BrokenRoadsController@searchMapDiperbaiki');
Route::get('getSearchMapPengaduan', 'BrokenRoadsController@searchMapPengaduan');

Route::get('admin/listPengaduan', 'BrokenRoadsController@listJalanRusak');
Route::get('admin/listPengguna','AdminController@listPengguna');
Route::put('admin/updateStatus/{id}','AdminController@updateStatusPengguna');
Route::resource('admin/digitasiJalan','DigitasiJalanController');

