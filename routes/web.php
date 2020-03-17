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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/jalan','BrokenRoadsController');
Route::get('/getJalanPengaduan', 'BrokenRoadsController@getJalanPengaduan');
Route::get('/mapPengaduan', 'BrokenRoadsController@mapPengaduan');

Route::get('/getJalanTerverifikasi', 'BrokenRoadsController@getJalanTerverifikasi');
Route::get('/mapTerverifikasi', 'BrokenRoadsController@mapTerverifikasi');

Route::get('/getJalanDiperbaiki', 'BrokenRoadsController@getJalanDiperbaiki');
Route::get('/mapDiperbaiki', 'BrokenRoadsController@mapDiperbaiki');

Route::get('/riwayatPengaduan', 'BrokenRoadsController@riwayatPengaduan');

Route::get('admin/listPengaduan', 'BrokenRoadsController@listJalanRusak');
Route::get('admin/listPengguna','AdminController@listPengguna');
Route::put('admin/updateStatus/{id}','AdminController@updateStatusPengguna');

Route::get('getSearchMapTerverifikasi', 'BrokenRoadsController@searchMapTerverifikasi');
Route::get('getSearchMapDiperbaiki', 'BrokenRoadsController@searchMapDiperbaiki');
Route::get('getSearchMapPengaduan', 'BrokenRoadsController@searchMapPengaduan');
