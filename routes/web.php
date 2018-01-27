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


Route::get('/dashboard/', 'TestController@showDashboard')->name('dashboard');

Route::get('/', 'TestController@show')->middleware('StudentMiddleware');
Route::get('/riwayat-surat/', 'TestController@history')->middleware('auth');
Route::get('/riwayat-surat/lihat/{id}','TestController@historyView');
Route::post('/auth', '\App\Http\Controllers\Auth\LoginController@authenticateStudent')->name('student-login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('table')->group(function(){
	Route::post('/{id}/store', 'SuratController@store')->name('storeSurat');
	Route::get('/{id}', 'TestController@showTable');
	Route::get('/{id}/tambah', 'TestController@tambahSurat1');
});


Route::prefix('admin')->group(function(){
	Route::post('/auth', 'AdminController@authenticateAdmin')->name('admin-login');
	Route::get('/buat-surat/{id}', 'AdminController@buatSurat')->name('admin.buatSurat');
	Route::get('/dashboard', 'AdminController@admin')->name('admin-dashboard');
	Route::get('/surat-masuk/{id}', 'AdminController@showSuratMasuk');
	Route::get('/surat-masuk/{id}/edit', 'AdminController@editSuratMasuk');
	Route::get('/login', 'AdminController@showAdminLogin');
	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
	Route::get('/riwayat-surat', 'AdminController@history')->name('admin.history');
	Route::get('/riwayat-surat/{id}', 'AdminController@historyView');
});
