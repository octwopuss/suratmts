<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Student;


class MahasiswaController extends Controller
{
	public function indexMahasiswa(){
		$mahasiswa = Student::all();

		return view('admin.mahasiswa.mahasiswa', ['mahasiswa'=>$mahasiswa]);
	}

    public function createMahasiswa(){
    	return view('admin.mahasiswa.form');
    }

    public function storeMahasiswa(Request $request){

    	$validateData = $request->validate([
    		'nama' => 'required',
    		'nim' => 'required',
    		'bidang_pilihan' => 'required',
            'judul_tesis' => 'required'
    	]);
		
    	$nama = $request->nama;
    	$nim = $request->nim;
    	$bidang_pilihan = $request->bidang_pilihan;
    	$password = Hash::make($nim);
    	$gender = $request->gender;        	

    	$student = new Student();    	

    	$student->nama = $nama;
    	$student->nim = $nim;
    	$student->bidang_pilihan = $bidang_pilihan;
    	$student->gender = $gender;
    	$student->password = $password;
    	$student->email = $request->email;
    	$student->phone = $request->phone;
        $student->instansi = $request->instansi;
        $student->alamat_instansi = $request->alamat_instansi;
        $student->alamat_rumah = $request->alamat_rumah;

    	$student->save();

    	return redirect()->route('admin.showMahasiswa');
    }

    public function editMahasiswa($id){
    	$student = Student::where('id', $id)->first();

    	return view('admin.mahasiswa.editForm', ['student'=>$student]);
    }
    
    public function updateMahasiswa(Request $request, $id){
    	$request->validate([
    		'nama' => 'required',
    		'nim' => 'required',
    		'bidang_pilihan' => 'required',
    	]);

    	$updateMahasiswa = Student::where('id', $id)->update([
    		'nama' => $request->nama,
    		'nim'=> $request->nim,
    		'bidang_pilihan'=> $request->bidang_pilihan,
    		'gender'=> $request->gender,
    		'email'=> $request->email,
    		'phone'=> $request->phone,
    	]);

    	return redirect()->route('admin.showMahasiswa');
    }

    public function deleteMahasiswa($id){    	
    	$student = Student::destroy($id);    	
    	return redirect()->route('admin.showMahasiswa');
    }

}
