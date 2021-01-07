<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NilaiExport;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('mahasiswa.cekNilai');
});

//----------------------- Mahasiswa -----------------------
// Nilai PK2MABA
Route::get('/ceknilai', function () {
    return view('mahasiswa.cekNilai');
});
Route::post('/cariNilai', 'MhsController@cariNilai');

// SIAM
Route::post('/ceksiam', 'SIAMController@cekSIAM');
Route::post('/ceksiam2', 'SIAMController@cekSIAM2');
Route::post('/ceksiam3', 'SIAMController@cekSIAM4');

// Info Pemutihan
Route::get('/infopemutihan', 'MhsController@indexPemutihan');
Route::get('/infopemutihan/{id_infoPemutihan}/detail', 'MhsController@detailPemutihan');

// Seputar PK2MABA
Route::get('/seputarpk2maba', 'MhsController@indexPk2');
Route::get('/seputarpk2maba/{id_pk2maba}/detail', 'MhsController@detailPk2');




//----------------------- Admin -----------------------
// Auth Admin
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Info Pemutihan
Route::get('pemutihan', 'PemutihanController@index');
Route::get('pemutihan/create', 'PemutihanController@create');
Route::post('pemutihan', 'PemutihanController@store');
Route::get('pemutihan/{id_infoPemutihan}/edit', 'PemutihanController@edit');
Route::post('pemutihan/{id_infoPemutihan}', 'PemutihanController@update');
Route::delete('pemutihan/{id_infoPemutihan}', 'PemutihanController@hapus');

Route::get('gambar/{foto_pemutihan}', function () {
    return redirect('images_pemutihan/{foto_pemutihan}');
})->middleware('auth');

// Seputar PK2MABA
Route::get('pk2maba', 'Pk2mabaController@index');
Route::get('pk2maba/create', 'Pk2mabaController@create');
Route::post('pk2maba', 'Pk2mabaController@store');
Route::get('pk2maba/{id_pk2maba}/edit', 'Pk2mabaController@edit');
Route::post('pk2maba/{id_pk2maba}', 'Pk2mabaController@update');
Route::delete('pk2maba/{id_pk2maba}', 'Pk2mabaController@hapus');

// Nilai
Route::get('nilai', 'NilaiController@index');
Route::get('nilai/create', 'NilaiController@create');
Route::post('nilai', 'NilaiController@store');
Route::get('nilai/{nim}/edit', 'NilaiController@edit');
Route::post('nilai/{id_nilai}', 'NilaiController@update');
Route::delete('nilai/{id_nilai}', 'NilaiController@hapus');

Route::get('nilai/export', 'NilaiController@exportExcel');
Route::get('nilai/template', 'NilaiController@exportTemplateExcel');
Route::post('importExcel', 'NilaiController@importExcel');

// API
Route::get('apinilai', 'APIController@tampil');
Route::post('apinilai2', 'APIController@cek');
