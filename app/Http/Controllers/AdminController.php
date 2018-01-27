<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __constructor(){
        $this.middleware('auth');
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
        }else{
            return 'wrong auth';
        }
    }

     public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function showSuratMasuk($id){
        $data = $id;
        return view('admin.table-suratMasuk', ['data'=>$data]);
    }

    public function editSuratMasuk($id){
        $data = $id;

        return view('admin.editSuratMasuk', ['data'=>$data]);

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

        return view('admin.buatSurat',['data'=>$data]);
    }
}
