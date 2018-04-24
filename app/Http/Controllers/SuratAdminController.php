<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Surat1A;
use App\Surat1B;
use App\DetailSurat;
use App\Student;
use App\NomorSurat;
use App\PenanggungJawab;
use App\SuratMasuk;
use Auth;
use File;


class SuratAdminController extends Controller
{
   
	/* Start crud surat internal */

    public function indexSurat1A(){
    	$surat = DetailSurat::where('status', 0)->where('tipe_surat', '1A')->get();
    	return view('admin.surat1a.surat1a', ['surat'=>$surat]);
    }
   
    public function createSurat1A($id){        
        $student = Student::where('id', $id)->first();

    	return view('admin.surat1a.form', ['student'=>$student]);
    }

    public function storeSurat1A(Request $request, $data){
    	$validasiData = $request->validate([    		  
            'kegunaan' => 'required',
            'keperluan' => 'required'            
        ]);
        
        $student_id = $data;        
        $surat = new Surat1A();
        $detail_surat = new DetailSurat();        
        $surat_internal = "1A";        

        $keperluan = implode(", ", $request->keperluan);        
        //Surat
        $surat->student_id = $student_id;
        $surat->nama = $request->nama;
        $surat->nim = $request->nim;
        $surat->bidang_pilihan = $request->bidang_pilihan;
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan = $keperluan;
        $surat->kegunaan_surat = $request->kegunaan;

        $surat->save();  

        $srt_last = DB::table('surat_1_a')->orderBy('id', 'desc')->first();

        //Detail Surat        
        $detail_surat->user_id = $student_id;
        $detail_surat->tipe_surat = $surat_internal;
        $detail_surat->id_surat = $srt_last->id;
        $detail_surat->notif = 1;
        $detail_surat->status = 0;

        $detail_surat->save();        
        return redirect()->route('admin.showSurat1A');
    }

    public function viewSurat1A($id){        

        $current_year = date("Y");
        $nomor = NomorSurat::where('id_surat', $id)->where('tipe_surat',"1A")->first();
        $surat = Surat1A::where('id', $id)->first();        
        $penanggung_jawab = penanggungJawab::where('active', 1)->first();

        return view('admin.surat1a.suratKeterangan', ['nomor'=>$nomor, 'ttd'=>$penanggung_jawab, 'surat'=>$surat, 'tahun'=>$current_year]);
    }    

    public function prosesSurat1A($id){
        $nomor_surat = NomorSurat::orderBy('created_at', 'desc')->first();   
        if($nomor_surat == NULL)     
        {
            $nomor = 0;
        }else{
            $nomor = $nomor_surat->nomor;            
        }

        return view('admin.surat1a.prosesSurat1a', ['id'=>$id, 'nomor'=>$nomor]);
    }

    public function storeProses1A(Request $request, $id){
        $validasiData = $request->validate([
            'nomor' => 'required',            
        ]);

        $nomor_terakhir = NomorSurat::where('tipe_surat','1A')->orderBy('created_at', 'desc')->first();
        $nomor_surat = new NomorSurat();

        $tipe_nomor = "UN8.4.1.31.1/KM";
        $nomor_surat->nomor = $request->nomor;
        $nomor_surat->tipe_surat = "1A";
        $nomor_surat->id_surat = $id;
        $nomor_surat->tipe_nomor = $tipe_nomor;

        $detail_surat = DetailSurat::where('tipe_surat', '1A')->where('id_surat', $id)->update(array(
            'notif'=>0,
            'status'=>1,
            'user_notif'=>1,
            'comment'=>"Surat berhasil diproses dan dapat diambil di prodi",
            )
        );

        $nomor_surat->save();         

        return redirect()->route('admin.success1A', $id);
    }

    public function suratSuccess1A($id){        

        return view('admin.surat1a.suksesBuat', ['id'=>$id]);
    }

    public function editSurat1A($id){
        $data = $id;
        $surat = Surat1A::where('id', $id)->first();                
        $nama = $surat->nama;
        $nim = $surat->nim;
        $bidang_pilihan = $surat->bidang_pilihan;

        return view('admin.surat1a.formEdit', [
            'data'=>$data, 
            'nama'=>$nama, 
            'nim'=>$nim, 
            'bidang_pilihan'=>$bidang_pilihan,
            'surat'=>$surat
            ]);  
    }

    public function updateSurat1A(Request $request, $data){
        $validasiData = $request->validate([                        
            'keperluan' => 'required',
            'kegunaan' => 'required'
        ]);            
                
        $keperluan = implode("", $request->keperluan);

        $surat1a = Surat1A::where('id', $data)->update([
          'keperluan' => $keperluan,
          'kegunaan_surat' => $request->kegunaan
        ]);

        return redirect()->route('admin.showSurat1A')->with('success', 'Surat berhasil ditambahkan');
    }   

    public function deleteSurat1A($id){
        $surat = Surat1A::destroy($id);        
        $detail_surat = DetailSurat::where('id_surat', $id)->where('tipe_surat','1A');
        $detail_surat->delete();

        return redirect()->route('admin.showSurat1A')->with('success', 'Surat telah diupdate');
    }

    public function tolakSurat1A($id){
        return view('admin.surat1a.tolakSurat', ['id'=>$id]);
    }

    public function storeTolak1A(Request $request, $id){        
        $detail_surat = DetailSurat::where('tipe_surat', '1A')->where('id_surat', $id)
        ->update(array(
            'comment'=>$request->commentar,
            'status'=>2,
            'notif'=>0,
            'user_notif'=>1,
            )
        );

        return redirect()->route('admin.showSurat1A');
    }


    public function pengajuSurat1A(){
        $student = Student::all();        

        return view ('admin.surat1a.pengaju', ['student'=> $student]);
    }

    public function findPengajuSurat1A(Request $request){
        $pengaju = $request->pengaju;
        $student = Student::where('id', $pengaju)->first();  
               
        return view('admin.surat1a.form', ['student'=>$student]);
    }

    /* End crud surat internal */

    /* ----------------------------------------------------------------------- */

    /* Start crud surat eksternal */

    public function indexSurat1B(){
    	$surat = DetailSurat::where('status', 0)->where('tipe_surat', '1B')->get();
               
    	return view('admin.surat1b.surat1b', ['surat'=>$surat]);
    }
   
    public function createSurat1B($id){
    	$student = Student::where('id', $id)->first();

        return view('admin.surat1b.form', ['student'=>$student]);
    }

    public function storeSurat1B(Request $request, $data){

        $validasiData = $request->validate([                               
            'keperluan_data' => 'required',
            'instansi_tujuan' => 'required',
            'alamat_instansi' => 'required',
            'judul_tesis' => 'required'
        ]);        

        $admin_id = $data;      
        $student = Student::where('id', $data)->first();
        $surat = new Surat1B();
        $detail_surat = new DetailSurat();

        $removed_empty = array_filter($request->keperluan_data);
        $keperluan_data = implode(',',$removed_empty);
        $surat_eksternal = "1B";        

        //Surat
        $surat->student_id = $data;
        $surat->nama = $request->nama;
        $surat->nim = $request->nim;
        $surat->bidang_pilihan = $request->bidang_pilihan;
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan_data = $keperluan_data;
        $surat->alasan_keperluan = $request->alasan_keperluan;  
        $surat->instansi_tujuan = $request->instansi_tujuan;
        $surat->alamat_tujuan = $request->alamat_tujuan;   
        $surat->judul_tesis = $request->judul_tesis;     

        $surat->save();  

        $srt_last = DB::table('surat_1_b')->orderBy('id', 'desc')->first();

        //Detail Surat

        $detail_surat->user_id = $student->id;
        $detail_surat->tipe_surat = $surat_eksternal;
        $detail_surat->id_surat = $srt_last->id;
        $detail_surat->notif = 1;
        $detail_surat->status = 0;

        $detail_surat->save();        
        return redirect()->route('admin.showSurat1B')->with('success', 'Surat berhasil ditambahkan');
    }

    public function editSurat1B($id){                
        $data = $id;
        $surat = Surat1B::where('id', $id)->first();                
        $nama = $surat->nama;
        $nim = $surat->nim;
        $bidang_pilihan = $surat->bidang_pilihan;

        $keperluan_data = explode(",", $surat->keperluan_data);                

        return view('admin.surat1b.formEdit', [
            'surat' => $surat,
            'keperluan_data' => $keperluan_data
            ]);  
    }

    public function updateSurat1B(Request $request, $data){
        $validasiData = $request->validate([                                    
            'keperluan_data' => 'required',
            'instansi_tujuan' => 'required',
            'alamat_tujuan' => 'required'            
        ]);            
            
        $removed_empty = array_filter($request->keperluan_data);        
    
        $keperluan_data = implode(", ", $removed_empty);                    

        $surat_eksternal = "1B";        

        //Surat                        
        $surat1b = Surat1b::find($data);

        $surat1b->judul_tesis = $request->judul_tesis;
        $surat1b->keperluan_data = $keperluan_data;
        $surat1b->alasan_keperluan = $request->alasan_keperluan;
        $surat1b->instansi_tujuan = $request->instansi_tujuan;
        $surat1b->alamat_tujuan = $request->alamat_tujuan;        

        $surat1b->save();

        return redirect()->route('admin.showSurat1B')->with('success', 'Surat berhasil ditambahkan');
    }

    public function suratSuccess1B($id){

        return view('admin.surat1b.suksesBuat', ['id'=>$id]);
    }

    public function deleteSurat1B($id){

    }

    public function pengajuSurat1B(){
        $student = Student::all();        
        return view ('admin.surat1b.pengaju', ['student'=> $student]);
    }

    public function findPengajuSurat1B(Request $request){
        $pengaju = $request->pengaju;
        $student = Student::where('id', $pengaju)->first();  
               
        return redirect()->route('admin.createSurat1B', $student->id);
    }

    public function prosesSurat1B($id){
        $nomor_surat = NomorSurat::orderBy('created_at', 'desc')->first();   
        if($nomor_surat == NULL)     
        {
            $nomor = 0;
        }else{
            $nomor = $nomor_surat->nomor;
        }
            
        return view('admin.surat1b.prosesSurat1B', ['id'=>$id, 'nomor'=>$nomor]);
    }

    public function storeProses1B(Request $request, $id){
        $validasiData = $request->validate([
            'nomor' => 'required',            
        ]);

        $nomor_surat = new NomorSurat();

        $tipe_nomor = "UN8.4.1.31.1/KS";
        $nomor_surat->nomor = $request->nomor;
        $nomor_surat->tipe_surat = "1B";
        $nomor_surat->id_surat = $id;
        $nomor_surat->tipe_nomor = $tipe_nomor;                 

        $detail_surat = DetailSurat::where('tipe_surat', '1B')->where('id_surat', $id)->update(array(
            'notif'=>0,
            'status'=>1,
            'user_notif'=>1,
            'comment'=>"Surat berhasil diproses dan dapat diambil di prodi",
            )
        );

        $nomor_surat->save();
        return redirect()->route('admin.success1B', $id);
    }

    public function viewSurat1B($id){
        $tahun = date('Y');        
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
        $nomor = NomorSurat::where('id_surat', $id)->first();
        $surat = Surat1B::where('id', $id)->first();        
        $date = $surat->created_at;            
        $month = $month_list[$date->month-1];                
        $ttd = PenanggungJawab::where('active', 1)->first();
        $array_data = explode(",", $surat->keperluan_data);   
        $keperluan_data = array_map('ucfirst', $array_data);               
        
        return view('admin.surat1b.permohonanBantuanData', [
            'nomor'=>$nomor, 
            'surat'=>$surat, 
            'ttd'=>$ttd, 
            'tahun'=>$tahun, 
            'month'=>$month, 
            'date'=>$date,
            'keperluan_data' => $keperluan_data
        ]);
    }

    public function tolakSurat1B($id){
        return view('admin.surat1b.tolakSurat', ['id'=>$id]);
    }

    public function storeTolak1B(Request $request, $id){
        $detail_surat = DetailSurat::where('tipe_surat', '1B')->where('id_surat', $id)
        ->update(array(
            'comment'=>$request->commentar,
            'status'=>2,
            'notif'=>0,
            'user_notif'=>1,
            )
        );

        return redirect()->route('admin.showSurat1B');
    }
    /* End crud surat eksternal */


    /* SURAT MASUK */

    public function indexSuratMasuk(){
        $suratmasuk = SuratMasuk::orderBy('created_at', 'desc')->get();

        return view('admin.suratmasuk.suratmasuk',['suratmasuk'=>$suratmasuk]);
    }

    public function addSuratMasuk(){

        return view('admin.suratmasuk.tambah');
    }

    public function storeSuratMasuk(Request $request){        
       
        
        $request->validate([
            "pengirim"=>"required",
            "nomor_surat"=>"required",
            "perihal"=>"required",
            "tanggal"=>"required",            
            "scan_surat"=>"required|max:2048|image"
        ]);

        $suratMasuk = new SuratMasuk();

        $suratMasuk->pengirim = $request->pengirim;
        $suratMasuk->nomor_surat = $request->nomor_surat;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->tanggal = $request->tanggal;
        if($request->hasFile('scan_surat')){
            $file=$request->file('scan_surat');
            $ext = $file->getClientOriginalExtension();
            $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$ext;
            $file->move('gambar/', $fileName);

            $suratMasuk->file_surat = $fileName;
        }else{
            return redirect()->route('admin.addSuratMasuk')->with('error', 'Upload Bukti file');
        }

        $suratMasuk->save();

        return redirect()->route('admin.showSuratMasuk');

        // https://hdtuto.com/article/laravel-55-image-upload-example        
    
    }

    public function editSuratMasuk($id){
        $editsuratmasuk = SuratMasuk::where('id', $id)->first();

        return view('admin.suratmasuk.editsuratmasuk', ['surat'=>$editsuratmasuk]);

    }

    public function updateSuratMasuk(Request $request, $id){
        if($request->hasFile('scan_surat')){
            $imageName = time().'.'.request()->scan_surat->getClientOriginalExtension();            
            $request->scan_surat->move(public_path('gambar'), $imageName);             
        }

        $surat_masuk = SuratMasuk::where('id', $id)->update([
            "pengirim"=>$request->pengirim,
            "nomor_surat"=>$request->nomor_surat,
            "perihal"=>$request->perihal,   
            "tanggal"=>$request->tanggal,
            "file_surat"=>$imageName,            
        ]);

        return redirect()->route('admin.showSuratMasuk');        
    }

    public function deleteSuratMasuk($id){    
        $surat = SuratMasuk::find($id);
        $image = 'gambar/'.$surat->file_surat;
        $delete = File::delete($image);
        $surat->delete();
        return redirect()->route('admin.showSuratMasuk')->with('success', 'Surat Berhasil di Hapus');
    }
    /* END SURAT MASUK */


    public function history(){
        $detail_surat = DetailSurat::where('status', 1)->orWhere('status', 2)->orderBy('created_at','desc')->get();

        return view('admin.history', ['surat'=>$detail_surat]);
    }

    public function penanggungJawab(){

        $pj = PenanggungJawab::all();

        return view('admin.penanggungJawab', ['penanggungjawab'=>$pj]);
    }    

    public function storePenanggungJawab($id){        
        $reset_aktif = PenanggungJawab::where('active', 1)->update(['active' => 0]);

        $update_aktif = PenanggungJawab::where('id', $id)->update(['active' => 1]);

        return redirect()->route('admin.penanggungJawab');
    }
}