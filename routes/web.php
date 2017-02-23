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

Auth::routes();

Route::get('/', 'HomeController@index');

# Route Buku
Route::get('buku',['middleware' => 'auth' , 'uses' => 'BukuController@index']);
Route::post('caribuku',['middleware' => 'auth' , 'uses' => 'BukuController@cariBuku']);
Route::get('tambahbuku',['middleware' => 'auth' , 'uses' => 'BukuController@create']);
Route::post('simpanbuku',['middleware' => 'auth' , 'uses' => 'BukuController@store']);
Route::get('editbuku/{idBuku}',['middleware' => 'auth' , 'uses' => 'BukuController@edit']);
Route::put('updatebuku/{idBuku}',['middleware' => 'auth' , 'uses' => 'BukuController@update']);
Route::delete('hapusbuku/{idBuku}',['middleware' => 'auth' , 'uses' => 'BukuController@destroy']);



# Route Mahasiswa
Route::get('mahasiswa',['middleware' => 'auth' , 'uses' => 'MahasiswaController@index']);
Route::post('carimahasiswa',['middleware' => 'auth' , 'uses' => 'MahasiswaController@carimahasiswa']);
Route::get('tambahmahasiswa',['middleware' => 'auth' , 'uses' => 'MahasiswaController@create']);
Route::post('simpanmahasiswa',['middleware' => 'auth' , 'uses' => 'MahasiswaController@store']);
Route::get('editmahasiswa/{nim}',['middleware' => 'auth' , 'uses' => 'MahasiswaController@edit']);
Route::put('updatemahasiswa/{nim}',['middleware' => 'auth' , 'uses' => 'MahasiswaController@update']);
Route::delete('hapusmahasiswa',['middleware' => 'auth' , 'uses' => 'MahasiswaController@destroy']);


# Route Peminjaman

Route::get('peminjaman', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@index']);
Route::post('caripeminjaman', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@cariPeminjaman']);
Route::get('tambahpeminjaman', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@create']);
Route::post('simpanpeminjaman', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@store']);
Route::get('editpeminjaman/{idPeminjaman}', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@edit']);
Route::put('updatepeminjaman/{idPeminjaman}', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@update']);
Route::delete('hapuspeminjaman/{idPeminjaman}', ['middleware' => 'auth' , 'uses' => 'PeminjamanController@destroy']);


