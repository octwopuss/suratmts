
<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Surat1A;
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

Route::get('/dashboard/', 'SuratController@showDashboard')->name('dashboard');

Route::get('/', 'SuratController@showIfAuth')->middleware('StudentMiddleware');
Route::get('/riwayat-surat/', 'SuratController@history');
Route::get('/riwayat-surat/lihat/{id}','SuratController@historyView');
Route::post('/auth', '\App\Http\Controllers\Auth\LoginController@authenticateStudent')->name('student-login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('table')->group(function(){
	Route::get('/surat1', 'SuratController@index')->name('showSurat');
	Route::post('/{id}/store', 'SuratController@store')->name('storeSurat');	
	Route::get('/surat1/{id}/tambah', 'SuratController@create')->name('createSurat');
	Route::get('/{id}/view', 'SuratController@show')->name('viewSurat');
	Route::get('/{id}/edit', 'SuratController@editForm')->name('editSurat');	
	Route::post('/{id}/update', 'SuratController@update')->name('updateSurat');
	Route::get('/{id}/delete', 'SuratController@destroy')->name('deleteSurat');
});

Route::prefix('surat-internal')->group(function(){
	Route::get('/', 'SuratController@indexSurat1A')->name('showSurat1A');
	Route::get('/create', 'SuratController@create1A')->name('createSurat1A');
	Route::post('/{id}/store', 'SuratController@storeSurat1A')->name('storeSurat1A');
	Route::get('/{id}/view', 'SuratController@viewSurat1A')->name('viewSurat1A');
	Route::get('/{id}/edit', 'SuratController@editSurat1A')->name('editSurat1A');
	Route::post('/{id}/update', 'SuratController@updateSurat1A')->name('updateSurat1A');
	Route::get('/{id}/delete', 'SuratController@deleteSurat1A')->name('deleteSurat1A');	
});

Route::prefix('surat-eksternal')->group(function(){
	Route::get('/', 'SuratController@indexSurat1B')->name('showSurat1B');
	Route::get('/create', 'SuratController@create1B')->name('createSurat1B');
	Route::post('/{id}/store', 'SuratController@storeSurat1B')->name('storeSurat1B');
	Route::get('/{id}/view', 'SuratController@viewSurat1B')->name('viewSurat1B');
	Route::get('/{id}/edit', 'SuratController@editSurat1B')->name('editSurat1B');
	Route::post('/{id}/update', 'SuratController@updateSurat1B')->name('updateSurat1B');
	Route::get('/{id}/delete', 'SuratController@deleteSurat1B')->name('deleteSurat1B');	
});

Route::prefix('admin')->group(function(){
	Route::post('/auth', 'AdminController@authenticateAdmin')->name('admin-login');
	Route::get('/buat-surat/{id}', 'AdminController@buatSurat')->name('admin.buatSurat');
	Route::get('/dashboard', 'AdminController@admin')->name('admin-dashboard');
	Route::get('/surat-masuk/surat-1', 'AdminController@showSuratMasuk')->name('admin.suratMasuk.show');
	Route::get('/surat-masuk/{id}/edit', 'AdminController@editSuratMasuk');
	Route::get('/login', 'AdminController@showAdminLogin');
	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
	Route::get('/riwayat-surat', 'AdminController@history')->name('admin.history');
	Route::get('/riwayat-surat/{id}', 'AdminController@historyView');
	Route::get('/notif/{id}', 'AdminController@updateNotifAdmin')->name('notifAdmin');
	Route::get('/cetak/{id}', 'AdminController@cetakSurat')->name('cetakSurat');
	Route::get('/surat1', 'AdminController@showSurat')->name('admin.showSurat1');
});


Route::get('/test', function(){
	$nomor = [32, 33, 34, 35, 36, 37, 38, 39 , 40]; 
	$tahun = [2018, 2018, 2018, 2018, 2018, 2019, 2019, 2020, 2020];	

	$hasil = 0;
	$nmr = count($nomor) - 1;
	$last = count($tahun) - 1;	

	$temp_nomor = $nomor[$nmr-1];
	$temp_tahun = $tahun[$last]; 

	if ($temp_tahun == $tahun[$last - 1]){
		$temp_nomor += 1;
		$nomor[$nmr] = $temp_nomor;
		$hasil = $nomor[$nmr];		
	}else if($temp_tahun != $tahun[$last - 1]){
		$temp_nomor = 1;
		$nomor[$nmr+1] = $temp_nomor;
		$hasil = $nomor[$nmr+1];
	}	

	return $hasil;
});

Route::get('/test2', function(){			
	$surat = Surat1A::find(1);
	$temp = $surat->student->bidang_pilihan;
	return $temp;
});