<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratTest;
use App\Surat1A;
use App\Surat1B;
use App\DetailSurat;
use App\Student;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use Hash;



class SuratController extends Controller
{   
    public function __constructor(){
        $this.middleware('auth');
    }

    public function showIfAuth(){
        if(Auth::guard('student')->check()){
            return redirect('/dashboard');
        }        
        return view('app.login');
    }    

    public function showDashboard(){
        return view('app.dashboard');
    }    

    public function historyView($id){

        return view('app.surat-test');
    }

    public function updatePassword(Request $request){
        $validateData = $request->validate([            
            'password_baru' => 'required',
            'konfirmasi_password' => 'required'
        ]);

        $student_id = Auth::guard('student')->id();        
        $pb = $request->password_baru;
        $kp = $request->konfirmasi_password;

        if($kp == $pb){
            $new_pass = Hash::make($pb);

            $student = Student::find($student_id);

            $student->password = $new_pass;

            $student->save();
        }else{
            return redirect()->route('ubahPassword')->with('gagal-update-password', 'Password tidak sama!');
        }


        return redirect()->route('dashboard')->with('success', 'Password berhasil dirubah!');
    }

    public function profil(){
        $student = Auth::guard('student')->user();
        return view('app.profil', ['student'=>$student]);
    }

    public function editProfil(){
        $student = Auth::guard('student')->user();
        return view('app.edit-profil', ['student'=>$student]);
    }

    public function updateProfil(Request $request){
        $validasiData = $request->validate([            
            'nama' => 'required',
            'nim' => 'required',
            'bidang_pilihan' => 'required',            
            'instansi' => 'required',                        
        ]);    

        $student = Auth::guard('student')->user();
        $studentUpdate = Student::find($student->id);

        $studentUpdate->nama = $request->nama;
        $studentUpdate->nim = $request->nim;
        $studentUpdate->bidang_pilihan = $request->bidang_pilihan;
        $studentUpdate->judul_tesis = $request->judul_tesis;
        $studentUpdate->email = $request->email;
        $studentUpdate->phone = $request->phone;
        $studentUpdate->instansi = $request->instansi;
        $studentUpdate->alamat_instansi = $request->alamat_instansi;
        $studentUpdate->telepon_instansi = $request->telp_instansi;

        $studentUpdate->save();

        return redirect()->route('dashboard')->with('success', 'Profil berhasil disimpan!');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* START CRUD SURAT 1A */

    public function indexSurat1A(){
        $student_id = Auth::guard('student')->id();
        $detail_surat = DetailSurat::where('user_id', $student_id)->where('tipe_surat', '1A')->where('status', 0)->get();
               
        return view('app.surat1a.surat1a', ['surat'=>$detail_surat]);
    }

    public function create1A(){
        $student = Auth::guard('student')->user();
        $surat1a = Surat1A::where('id', $student->id)->first();

        return view('app.surat1a.form', ['student'=>$student]);
    }

    public function storeSurat1A(Request $request, $data){
        
        $validasiData = $request->validate([            
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',         
            'keperluan' => 'required',
            'kegunaan' => 'required',            
            'semester' => 'required',
        ]);        
            
        $id = $data;
        $student_id = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $bidang_pilihan = Auth::guard('student')->user()->bidang_pilihan;
        $surat = new Surat1A();
        $detail_surat = new DetailSurat();

        $surat_internal = "1A";        

        $keperluan = implode(", ", $request->keperluan);

        //Surat
        $surat->student_id = $student_id;        
        $surat->nama = $nama;
        $surat->nim = $nim;
        $surat->bidang_pilihan = $bidang_pilihan;
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan = $keperluan;   
        $surat->kegunaan_surat = $request->kegunaan;        
        $surat->semester = $request->semester;

        $surat->save();  

        $srt_last = DB::table('surat_1_a')->orderBy('id', 'desc')->first();

        //Detail Surat
        $detail_surat->user_id = $student_id;
        $detail_surat->tipe_surat = $surat_internal;
        $detail_surat->id_surat = $srt_last->id;
        $detail_surat->notif = 1;
        $detail_surat->status = 0;

        $detail_surat->save();        
        return redirect()->route('history')->with('success', 'Surat berhasil ditambahkan');
    }

    public function deleteSurat1A($id){
        $surat = Surat1A::destroy($id);
        $detail_surat = DetailSurat::where('id_surat', $id)->where('tipe_surat','1A');
        $detail_surat->delete();

        return redirect()->route('showSurat1A')->with('success', 'Surat telah diupdate');
    }

    public function editSurat1A($id){

        $data = $id;
        $surat = Surat1A::where('id', $id)->first();        
        $data = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $bidang_pilihan = Auth::guard('student')->user()->bidang_pilihan;
        
        return view('app.surat1a.formEdit', [
            'data'=>$data, 
            'nama'=>$nama, 
            'nim'=>$nim, 
            'bidang_pilihan'=>$bidang_pilihan,
            'surat'=>$surat
            ]);    
    }

    public function updateSurat1A(Request $request, $data){
        $validasiData = $request->validate([            
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'keperluan' => 'required'            
        ]);

        $id = $data;
        $student_id = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $bidang_pilihan = Auth::guard('student')->user()->bidang_pilihan;        
        $surat = Surat1A::find($data);      
        $keperluan = implode(", ", $request->keperluan);

        $surat_eksternal = "1B";

        //Surat
        $surat->student_id = $student_id;
        $surat->nama = $nama;
        $surat->nim = $nim;       
        $surat->bidang_pilihan = $bidang_pilihan;
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan = $keperluan;   
        $surat->semester = $request->semester;

        $surat->save();        

        return redirect()->route('showSurat1A')->with('success', 'Surat berhasil diupdate!');
    }

    /* END CRUD SURAT1A - SURAT INTERNAL */

    /* START CRUD SURAT1B - SURAT EKSTERNAL */

    public function indexSurat1B(){
        $student_id = Auth::guard('student')->id();
        $surat = DetailSurat::where('status', 0)->where('tipe_surat', '1B')->where('user_id', $student_id)->get();

        return view('app.surat1b.surat1b', ['surat'=>$surat]);
        
    }

    public function create1B(){        
        $student = Auth::guard('student')->user();                
        return view('app.surat1b.form', ['student'=>$student]);
    }

    public function storeSurat1B(Request $request, $data){

        $validasiData = $request->validate([            
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',            
            'instansi_tujuan' => 'required',
            'alamat_tujuan' => 'required',
            'judul_tesis' => 'required',
            'keperluan_data' => 'required',
        ]);

        if($request->alasan_keperluan == "Tesis"){
            $request->validate([
                'bukti_ba' => 'required|max:1028',
            ]);
        }

        $id = $data;
        $student_id = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $bidang_pilihan = Auth::guard('student')->user()->bidang_pilihan;
        $surat = new Surat1B();
        $detail_surat = new DetailSurat();

        $data_filter = array_filter($request->keperluan_data);
        $keperluan_data = implode(",", $data_filter);                        

        $surat_eksternal = "1B";

        //Surat
        
        $surat->student_id = $student_id;        
        $surat->nama = $nama;
        $surat->nim = $nim;
        $surat->bidang_pilihan = $bidang_pilihan;
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan_data = $keperluan_data;   
        $surat->instansi_tujuan = $request->instansi_tujuan;
        $surat->alamat_tujuan = $request->alamat_tujuan;
        $surat->alasan_keperluan = $request->alasan_keperluan;
        $surat->judul_tesis = $request->judul_tesis;

        if($request->hasFile('bukti_ba')){
            $fileName = $request->file('bukti_ba')->store('berita_acara_seminar', 'public');            

            $surat->ba_seminar = $fileName;
        }

        $surat->save();  

        $srt_last = DB::table('surat_1_b')->orderBy('id', 'desc')->first();

        //Detail Surat
        $detail_surat->user_id = $student_id;
        $detail_surat->tipe_surat = $surat_eksternal;
        $detail_surat->id_surat = $srt_last->id;
        $detail_surat->notif = 1;
        $detail_surat->status = 0;

        $detail_surat->save();        
        return redirect()->route('history');   
    }

    public function deleteSurat1B($id){        
        $surat = Surat1B::where('id', $id)->first();
        $detail_surat = DetailSurat::where('id_surat', $id)->where('tipe_surat','1B')->delete();
        $image = 'bukti_seminar/'.$surat->ba_seminar;
        File::delete($image);
        $surat->delete();

        return redirect()->route('showSurat1B')->with('success', 'Surat telah diupdate');
    }

    public function editSurat1B($id){
        $data = $id;
        $surat = Surat1B::where('id', $id)->first();    
        $array_data = explode(",", $surat->keperluan_data);
        $keperluan_data = array_filter($array_data);

        return view('app.surat1b.formEdit', ['data'=>$data, 'surat'=>$surat, 'keperluan_data'=>$keperluan_data]);
    }

    public function updateSurat1B(Request $request, $data){
        $validasiData = $request->validate([
            'bidang_pilihan' => 'required',
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',            
            'keperluan_data' => 'required',
            'instansi_tujuan' => 'required',
            'alamat_tujuan' => 'required',
        ]);

        if($request->alasan_keperluan == "Tesis"){
            $request->validate([
                'bukti_ba' => 'required|max:1028',
            ]);
        }


        $data_filter = array_filter($request->keperluan_data);
        $keperluan_data = implode(",", $data_filter);                                

        $id = $data;
        $student_id = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $surat = Surat1B::find($data);      
        
        $surat_eksternal = "1B";

        //Surat
        $surat->student_id = $student_id;
        $surat->nama = $nama;
        $surat->nim = $nim;       
        $surat->bidang_pilihan = $request->bidang_pilihan;
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan_data = $keperluan_data;   
        $surat->instansi_tujuan = $request->instansi_tujuan;
        $surat->alamat_tujuan = $request->alamat_tujuan;

        if($request->hasFile('bukti_ba')){
            $file= $request->file('bukti_ba');
            $ext = $file->getClientOriginalExtension();
            $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$ext;
            $file->move('bukti_seminar/', $fileName);

            $surat->ba_seminar = $fileName;
        }
  
        $surat->save();        

        return redirect()->route('showSurat1B')->with('success', 'Surat berhasil diupdate!');
    }

    public function viewSurat1B($id){
        $surat = Surat1B::where('id', $id)->first();
        $array_data = explode(",", $surat->keperluan_data);
        $keperluan_data = array_filter($array_data);

        $get_month = $surat->created_at->month;

        $month_list = ['Januari', 
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];

        $month = $month_list[$get_month-1];

        return view('app.surat1b.surat', ['surat'=>$surat, 'keperluan'=>$keperluan_data, 'bulan'=>$month]);
    }

    /* END CRUD SURAT1B - SURAT EKSTERNAL */


    public function history(){

        $student_id = Auth::guard('student')->id();
        $detail_surat = DetailSurat::where('user_id', $student_id)->orderBy('created_at', 'desc')->get();
        $get_date = DetailSurat::where('user_id', $student_id)->where('tipe_surat', '1B')->first();                    

        $updateNotif = DetailSurat::where('user_id', $student_id)->where('user_notif', 1)->update(
            array(
                'user_notif'=>0,
            )
        );

        $month_list = ['Januari', 
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];

        // $month = $month_list[$get_month-1];

        return view('app.history', ['detail_surat'=>$detail_surat, 'get_date'=>$get_date]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        $data = $id;
        return view('app.form',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $data)
    {
        $validasiData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'angkatan' => 'required'           
        ]);
            $id = $data;

            $student_id = Auth::guard('student')->id();            
            $surat = new SuratTest();
            $surat->student_id = $student_id;
            $surat->nama = $request->nama;
            $surat->nim = $request->nim;
            $surat->angkatan  = $request->angkatan;
            $surat->notif = 1;
                      
            $surat->save();
            
            return redirect()->route('showSurat', $id);
    }

    public function viewHistory($id, $user_id, $tipe){
        if($tipe == "1A"){
            $surat = Surat1A::where('id', $id)->where('student_id', $user_id)->first();
            return view('app.historyView', ['surat'=>$surat, 'tipe'=>$tipe]);
        }else{
            $surat = Surat1B::where('id', $id)->where('student_id', $user_id)->first();
            $data = explode(',', $surat->keperluan_data);            
            return view('app.historyView', ['surat'=>$surat, 'tipe'=>$tipe, 'data'=>$data]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    

}