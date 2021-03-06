
<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Surat1B;
use App\DetailSurat;
use App\penanggungJawab;
use App\Student;
use Illuminate\Support\Facades\Storage;
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
Route::get('/scan/{filename}', 'AdminController@proteccScan');
Route::get('/', 'SuratController@showIfAuth');
Route::get('/riwayat-surat/', 'SuratController@history')->name('history');
Route::get('/detail-surat/{id}/{user_id}/{tipe}', 'SuratController@viewHistory')->name('viewHistory');
Route::post('/auth', '\App\Http\Controllers\Auth\LoginController@authenticateStudent')->name('student-login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/user_notif', function(){
	$user = Auth::guard('student')->user();
	$DetailSurat = DetailSurat::where('user_id', $user->id)
					->where('user_notif', 1)->update(['user_notif'=>0]);

	return redirect()->route('history');		
});
Route::get('/profil', 'SuratController@profil')->name('viewProfil');
Route::get('/edit-profil', 'SuratController@editProfil')->name('editProfil');
Route::post('/update-profil', 'SuratController@updateProfil')->name('updateProfil');
Route::get('/ubah-password', function(){
	return view('app.ubah-password');
})->name('ubahPassword');
Route::post('/update-password', 'SuratController@updatePassword')->name('updatePassword');

Route::prefix('surat-internal')->group(function(){
	Route::get('/', 'SuratController@indexSurat1A')->name('showSurat1A')->middleware('StudentMiddleware');
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
	Route::get('/', 'AdminController@showIfAuth')->name('admin.dashboard');
	Route::post('/auth', 'AdminController@authenticateAdmin')->name('admin-login');	
	Route::get('/dashboard', 'AdminController@admin')->name('admin-dashboard');			
	Route::get('/login', 'AdminController@showAdminLogin');
	Route::get('/logout', 'AdminController@logout')->name('admin.logout');
	Route::get('/notif/{id}', 'AdminController@updateNotifAdmin')->name('notifAdmin');
	Route::get('/history', 'SuratAdminController@history')->name('admin.history');
	// Route::get('/penanggung-jawab', 'SuratAdminController@penanggungJawab')->name('admin.penanggungJawab');	
	// Route::get('/{id}/storePenanggungJawab', 'SuratAdminController@storePenanggungJawab')->name('admin.storePenanggungJawab');

	Route::prefix('mahasiswa')->group(function(){
		Route::get('/', 'MahasiswaController@indexMahasiswa')->name('admin.showMahasiswa');
		Route::get('/create', 'MahasiswaController@createMahasiswa')->name('admin.createMahasiswa');
		Route::post('/store', 'MahasiswaController@storeMahasiswa')->name('admin.storeMahasiswa');
		Route::get('/{id}/edit', 'MahasiswaController@editMahasiswa')->name('admin.editMahasiswa');
		Route::post('/{id}/update', 'MahasiswaController@updateMahasiswa')->name('admin.updateMahasiswa');
		Route::get('/{id}/delete', 'MahasiswaController@deleteMahasiswa')->name('admin.deleteMahasiswa');
	});

	Route::prefix('surat-masuk')->group(function(){
		Route::get('/', 'SuratAdminController@indexSuratMasuk')->name('admin.showSuratMasuk');
		Route::get('/tambah', 'SuratAdminController@addSuratMasuk')->name('admin.addSuratMasuk');
		Route::post('/store', 'SuratAdminController@storeSuratMasuk')->name('admin.storeSuratMasuk');
		Route::get('/{id}/edit', 'SuratAdminController@editSuratMasuk')->name('admin.editSuratMasuk');
		Route::post('/{id}/update', 'SuratAdminController@updateSuratMasuk')->name('admin.updateSuratMasuk');
		Route::get('/{id}/delete', 'SuratAdminController@deleteSuratMasuk')->name('admin.deleteSuratMasuk');	
	});

	Route::prefix('surat-internal')->group(function(){
		Route::get('/', 'SuratAdminController@indexSurat1A')->name('admin.showSurat1A');		
		Route::get('/{id}/create', 'SuratAdminController@createSurat1A')->name('admin.createSurat1A');
		Route::get('/pengaju', 'SuratAdminController@pengajuSurat1A')->name('admin.pengajuSurat1A');
		Route::post('/data-pengaju/', 'SuratAdminController@findPengajuSurat1A')->name('admin.findPengajuSurat1A');	
		Route::post('/{id}/store', 'SuratAdminController@storeSurat1A')->name('admin.storeSurat1A');		
		Route::get('/{id}/view', 'SuratAdminController@viewSurat1A')->name('admin.viewSurat1A');
		Route::get('/{id}/success', 'SuratAdminController@suratSuccess1A')->name('admin.success1A');
		Route::get('/{id}/process', 'SuratAdminController@prosesSurat1A')->name('admin.prosesSurat1A');
		Route::post('/{id}/storeProcess1A', 'SuratAdminController@storeProses1A')->name('admin.storeProses1A');
		Route::get('/{id}/edit', 'SuratAdminController@editSurat1A')->name('admin.editSurat1A');
		Route::get('/{id}/tolak', 'SuratAdminController@tolakSurat1A')->name('admin.tolakSurat1A');
		Route::post('/{id}/storeTolak', 'SuratAdminController@storeTolak1A')->name('admin.storeTolak1A');
		Route::post('/{id}/update', 'SuratAdminController@updateSurat1A')->name('admin.updateSurat1A');
		Route::get('/{id}/delete', 'SuratAdminController@deleteSurat1A')->name('admin.deleteSurat1A');	
	});	

	Route::prefix('surat-eksternal')->group(function(){
		Route::get('/', 'SuratAdminController@indexSurat1B')->name('admin.showSurat1B');
		Route::get('/{id}/create', 'SuratAdminController@createSurat1B')->name('admin.createSurat1B');
		Route::post('/{id}/store', 'SuratAdminController@storeSurat1B')->name('admin.storeSurat1B');
		Route::get('/pengaju', 'SuratAdminController@pengajuSurat1B')->name('admin.pengajuSurat1B');
		Route::post('/data-pengaju/', 'SuratAdminController@findPengajuSurat1B')->name('admin.findPengajuSurat1B');
		Route::get('/{id}/process', 'SuratAdminController@prosesSurat1B')->name('admin.prosesSurat1B');
		Route::post('/{id}/storeProcess1B', 'SuratAdminController@storeProses1B')->name('admin.storeProses1B');	
		Route::get('/{id}/view', 'SuratAdminController@viewSurat1B')->name('admin.viewSurat1B');		
		Route::get('/{id}/success', 'SuratAdminController@suratSuccess1B')->name('admin.success1B');
		Route::get('/{id}/edit', 'SuratAdminController@editSurat1B')->name('admin.editSurat1B');
		Route::get('/{id}/tolak', 'SuratAdminController@tolakSurat1B')->name('admin.tolakSurat1B');
		Route::post('/{id}/storeTolak', 'SuratAdminController@storeTolak1B')->name('admin.storeTolak1B');
		Route::post('/{id}/update', 'SuratAdminController@updateSurat1B')->name('admin.updateSurat1B');
		Route::get('/{id}/delete', 'SuratAdminController@deleteSurat1B')->name('admin.deleteSurat1B');	
	});
});

// Route::get('/import-users', function(){
// 	$data = Storage::disk('local')->get('student2.json');
// 	$json = json_decode($data, true);
	
// 	// dd($json);

// 	$nim = $json[2]['data'][0]['nim'];
// 	$name  = $json[2]['data'][0]['name'];
// 	$gender = $json[2]['data'][0]['gender'];
// 	$email = $json[2]['data'][0]['email'];
// 	$major = $json[2]['data'][0]['bidang_pilihan'];
// 	$title = $json[2]['data'][0]['judul'];
	
// 	$impor = $json[2]['data'];
// 	// dd($impor);
// 	// $student = new Student();

// 	$count = count($impor);
// 	for ($i=0; $i <$count ; $i++) { 
// 		$student = new Student();		

// 		$student->nim = $json[2]['data'][$i]['nim'];
// 		$student->nama = $json[2]['data'][$i]['name'];
// 		$student->email = $json[2]['data'][$i]['email'];
// 		$student->password = Hash::make($json[2]['data'][$i]['nim']);
// 		$student->gender = $json[2]['data'][$i]['gender'];
// 		$student->phone = $json[2]['data'][$i]['phone'];
// 		$student->bidang_pilihan = $json[2]['data'][$i]['bidang_pilihan'];
// 		$student->judul_tesis = $json[2]['data'][$i]['judul'];
	
// 		$student->save();
// 	}

// 	echo '<b>'.$count.'</b> berhasil ditambahkan!.';
// });

Route::get('/password', function(){
	$pass = Hash::make('password123');
	echo $pass;
});


Route::get('/check', function(){
	$pass = '$2y$10$k8NOI0RF6flT8VBhGqUJoeIBuT88neCm/cynhA9rmBqEyl0y1.hQ6';
	if (Hash::check('password123', $pass)){
		echo 'password sama';
	}else{
		echo 'password beda';
	}
});