<?php

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

Route::get('/home', 'HomeController@index');


Route::group(['middleware'=>'web'],function(){
	Route::group(['prefix'=>'master_data','middleware'=>['auth']], function () {

	Route::resource('biaya_admin', 'Biaya_adminController'); 
	Route::resource('poli', 'PoliController'); 
	Route::resource('kelas_kamar', 'Kelas_kamarController'); 
	Route::resource('jabatan', 'JabatanController'); 
	Route::resource('kamar', 'KamarController'); 
	Route::resource('kategori', 'KategoriController'); 
	Route::resource('satuan', 'SatuanController'); 
	Route::resource('gudang', 'GudangController'); 
	Route::resource('cito', 'CitoController'); 
	Route::resource('jenis_obat', 'Jenis_obatController'); 
	Route::resource('perujuk', 'PerujukController'); 


	});
});