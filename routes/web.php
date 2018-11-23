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
    // echo "Hello DangDut!";
});


// // tambahin ? biar bisa kosong sama di param function tambahin = '' sebagai defaultnya
// Route::get('/home/{nama?}', function($nama = ''){
// 	echo "Selamat datang ".$nama." di indi<b>Home</b>";
// });

Route::get('/profile','HomeController@profileview');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// buat C R U D laravel != C R U D Megandi, ~ C R U D Kak Arief
Route::get('/create_jurusan/{nama}','HomeController@create_jurusan');
Route::get('/view_jurusan','HomeController@view_jurusan');
Route::get('/update_jurusan/{nama}/{id}','HomeController@update_jurusan');
Route::get('/delete_jurusan/{id}','HomeController@delete_jurusan');


// buat crud hmmme
Route::get('/lihat_hmm','HomeController@lihat_hmm');
Route::get('/create_hmm/{lirik}/{penyanyi}','HomeController@create_hmm');
Route::get('/sunting_hmm/{id}/{lirik}/{penyanyi}','HoupdmeController@sunting_hmm');
Route::get('/hapus_hmm/{id}','HomeController@hapus_hmm');


// buat crud siswae
Route::prefix('siswa')->group(function(){
	Route::get('/all', 'siswaController@index');
	Route::get('/add', 'siswaController@add');
	Route::get('/edit/{id}','siswaController@edit');
	Route::post('/save', 'siswaController@save');
	Route::post('/update','siswaController@update');
	Route::get('/delete/{id}', 'siswaController@delete');
});