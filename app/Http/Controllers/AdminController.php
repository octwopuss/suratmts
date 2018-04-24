<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Surat1A;
use App\Surat1B;
use App\Student;

class AdminController extends Controller
{

    public function __constructor(){    
    
    }

    public function admin(){
        $surat1A = Surat1A::all();
        $count1A = count($surat1A);
        $surat1B = Surat1B::all();
        $count1B = count($surat1B);    

        return view('admin.admin', ['surat1A'=>$count1A, 'surat1B'=>$count1B]);
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

    public function showIfAuth(){
        if(Auth::guard('admin')->check()){
            return redirect('/admin/dashboard');
        }
        return view('admin.login');

    }

     public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
    

    public function showAdminLogin(){
        if(Auth::guard('admin')->check()){
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }


    public function history(){
        $admin= Auth::guard('admin')->user();
        return view('admin.history');
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

    public function authFile($filename)
    {   
        dd($filename);
        if(Auth::guard('admin')->check()){
            return response()->download(Storage_path('public/gambar/'.$filename), null, [], null);        
        }else{
            return redirect('/');
        }
    }
}