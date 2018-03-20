<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SuratTest;
use App\Student;

class AdminController extends Controller
{

    public function __constructor(){    
    
    }

    public function admin(){
        return view('admin.admin');
    }


    public function authenticateAdmin(Request $request)
    {        

        $this->validate($request, [            
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->input('remember');
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = [
        'email' => $email, 
        'password' => $password,
        ];        

        if (Auth::guard('admin')->attempt($credentials, $remember)){
            return redirect()->route('admin-dashboard');
        }
    }

     public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function showSuratMasuk(){            
        $student = SuratTest::with('student')->get();
        
        return view('admin.surat1-suratMasuk', ['surat'=>$student]);
    }

    public function editSuratMasuk($id){
        $data = $id;
        return view('admin.surat1-editSuratMasuk', ['data'=>$data]);
    }

    public function showAdminLogin(){
        return view('admin.login');
    }


    public function history(){
        $admin= Auth::guard('admin')->user();
        return view('admin.history');
    }

    public function historyView(){

    }

    public function buatSurat($id){
        $data = $id;
        return view('admin.surat1-buatSurat',['data'=>$data]);
    }

    public function updateNotifAdmin($id)    
    {
        DB::table('surat_test')->where('id', $id)->update(['admin_notif'=>0]);
        return redirect()->route('admin.suratMasuk.show' ,$id);
    }

    public function cetakSurat($id)
    {
        $surat = SuratTest::where('id', $id)->first();        
        return view ('admin.cetakSurat', ['surat'=>$surat]);
    }

    public function showSurat()
    {
        $surat = SuratTest::all();
        return view ('admin.surat1-showSurat', ['surat'=>$surat]);
    }
}