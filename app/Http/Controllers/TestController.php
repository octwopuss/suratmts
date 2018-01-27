<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Student;

class TestController extends Controller
{

    public function __constructor(){
        $this.middleware('auth');
    }

	public function show(){
        if(Auth::guard('student')->check()){
            return redirect('/dashboard');
        }
        
    return view('app.login');
    }    

    public function showDashboard(){
        return view('app.dashboard');
    }

    public function showTable($id){
        $data = $id;

        return view('app.table', ['data'=>$data]);
    }

    public function tambahSurat1($id){
        $data = $id;
        return view('app.form',['data'=>$data]);
    }

    public function history(){

        return view('app.history');
    }

    public function historyView($id){

    	return view('app.surat-test');
    }

}