<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratTest;
use App\Surat1A;
use App\Surat1B;
use App\DetailSurat;
use Illuminate\Support\Facades\DB;
use Auth;



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

    public function history(){

        $student_id = Auth::guard('student')->id();
        $detail_surat = DetailSurat::where('user_id', $student_id)->get();                

        return view('app.history', ['detail_surat'=>$detail_surat]);
    }

    public function historyView($id){

        return view('app.surat-test');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* START CRUD SURAT 1A */

    public function indexSurat1A(){
        $student_id = Auth::guard('student')->id();
        $detail_surat = DetailSurat::where('user_id', $student_id)->first();                        
        
        if($detail_surat == null){            
            return view('app.surat1a.surat1a',['cek_surat'=>$detail_surat]);
        }else{
            $tipe = $detail_surat->tipe_surat;
            if($tipe == "1A")
                {
                    $surat = Surat1A::where('student_id', $student_id)->get();            
                    return view('app.surat1a.surat1a', ['surat'=>$surat, 'cek_surat'=>$detail_surat]);               
                }else
                {
                    $surat = Surat1A::where('student_id', $student_id)->get();            
                    return view('app.surat1a.surat1a', ['surat'=>$surat, 'cek_surat'=>$detail_surat]);               
                }
        }
                    
    }

    public function create1A(){
        $student_id = Auth::guard('student')->id();
        $data = $student_id;

        return view('app.surat1a.form', ['data'=>$data]);
    }

    public function storeSurat1A(Request $request, $data){
        
        $validasiData = $request->validate([
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required',          
            'keperluan' => 'required'            
        ]);

        $id = $data;
        $student_id = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $surat = new Surat1A();
        $detail_surat = new DetailSurat();

        $surat_internal = "1A";        

        //Surat
        $surat->student_id = $student_id;        
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan = $request->keperluan;   

        $surat->save();  

        $srt_last = DB::table('surat_1_a')->orderBy('id', 'desc')->first();

        //Detail Surat
        $detail_surat->user_id = $student_id;
        $detail_surat->tipe_surat = $surat_internal;
        $detail_surat->id_surat = $srt_last->id;
        $detail_surat->notif = 1;

        $detail_surat->save();        
        return redirect()->route('showSurat1A')->with('success', 'Surat berhasil ditambahkan');
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

        return view('app.surat1a.formEdit', ['data'=>$data, 'surat'=>$surat]);
    }

    public function updateSurat1A(Request $request, $data){
        $validasiData = $request->validate([
            'bidang_pilihan' => 'required',
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required',          
            'keperluan' => 'required'            
        ]);

        $id = $data;
        $student_id = Auth::guard('student')->id();
        $nama = Auth::guard('student')->user()->nama;
        $nim = Auth::guard('student')->user()->nim;
        $surat = Surat1A::find($data);      
        
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
        $surat->keperluan = $request->keperluan;   

        $surat->save();        

        return redirect()->route('indexSurat1A')->with('success', 'Surat berhasil diupdate!');
    }

    /* END CRUD SURAT1A - SURAT INTERNAL */

    /* START CRUD SURAT1B - SURAT EKSTERNAL */

    public function indexSurat1B(){
        $student_id = Auth::guard('student')->id();
        $detail_surat = DetailSurat::where('user_id', $student_id)->first();                        
        
        if($detail_surat == null){            
            return view('app.surat1a.surat1a',['cek_surat'=>$detail_surat]);
        }else{
            $tipe = $detail_surat->tipe_surat;
            if($tipe == "1B")
                {
                    $surat = Surat1B::where('student_id', $student_id)->get();            
                    return view('app.surat1b.surat1b', ['surat'=>$surat, 'cek_surat'=>$detail_surat]);               
                }else
                {
                    $surat = Surat1B::where('student_id', $student_id)->get();            
                    return view('app.surat1b.surat1b', ['surat'=>$surat, 'cek_surat'=>$detail_surat]);               
                }
        }
    }

    public function create1B(){
        $student_id = Auth::guard('student')->id();
        $data = $student_id;

        return view('app.surat1b.form', ['data'=>$data]);
    }

    public function storeSurat1B(Request $request, $data){
        $validasiData = $request->validate([            
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required',          
            'keperluan_data' => 'required',
            'instansi_tujuan' => 'required',
            'alamat_tujuan' => 'required'
        ]);

        $id = $data;
        $student_id = Auth::guard('student')->id();        
        $surat = new Surat1B();
        $detail_surat = new DetailSurat();
        
        $surat_eksternal = "1B";

        //Surat
        $surat->student_id = $student_id;        
        $surat->alamat_rumah = $request->alamat_rumah;
        $surat->telepon = $request->telepon;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat_instansi;
        $surat->telp_instansi = $request->telp_instansi;
        $surat->keperluan_data = $request->keperluan_data;   
        $surat->instansi_tujuan = $request->instansi_tujuan;
        $surat->alamat_tujuan = $request->alamat_tujuan;

        $surat->save();  

        $srt_last = DB::table('surat_1_b')->orderBy('id', 'desc')->first();

        //Detail Surat
        $detail_surat->user_id = $student_id;
        $detail_surat->tipe_surat = $surat_eksternal;
        $detail_surat->id_surat = $srt_last->id;
        $detail_surat->notif = 1;

        $detail_surat->save();        
        return redirect()->route('showSurat1B');   
    }

    public function deleteSurat1B($id){
        $surat = Surat1B::destroy($id);
        $detail_surat = DetailSurat::where('id_surat', $id)->where('tipe_surat','1B');
        $detail_surat->delete();

        return redirect()->route('showSurat1A')->with('success', 'Surat telah diupdate');
    }

    public function editSurat1B($id){
        $data = $id;
        $surat = Surat1B::where('id', $id)->first();        

        return view('app.surat1b.formEdit', ['data'=>$data, 'surat'=>$surat]);
    }

    public function updateSurat1B(Request $request, $data){
        $validasiData = $request->validate([
            'bidang_pilihan' => 'required',
            'alamat_rumah' => 'required',
            'telepon' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'telp_instansi' => 'required',          
            'keperluan_data' => 'required',
            'instansi_tujuan' => 'required',
            'alamat_tujuan' => 'required'        
        ]);

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
        $surat->keperluan_data = $request->keperluan_data;   
        $surat->instansi_tujuan = $request->instansi_tujuan;
        $surat->alamat_tujuan = $request->alamat_tujuan;
  
        $surat->save();        

        return redirect()->route('showSurat1B')->with('success', 'Surat berhasil diupdate!');
    }


    /* END CRUD SURAT1B - SURAT EKSTERNAL */



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
            $surat->admin_notif = 1;
                      
            $surat->save();
            
            return redirect()->route('showSurat', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    

}

