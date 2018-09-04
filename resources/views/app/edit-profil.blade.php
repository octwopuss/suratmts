@extends('layouts.master')

@section('title','Edit Profil')
@section('history')
<form method="POST" action="{{route('updateProfil')}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif
	<label>Nama</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$student->nama}}">
	
	<label>NIM</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$student->nim}}">
	<label>Bidang Pilihan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$student->bidang_pilihan}}">
	
	<label>Judul Tesis</label>
	<input class="form-control input-lg" placeholder="" type="text" name="judul_tesis" value="{{$student->judul_tesis}}">
	<label>email</label>
	<input class="form-control input-lg" placeholder="" type="text" name="email" value="{{$student->email}}">
	<label>Nomor Telpon/HP</label>
	<input class="form-control input-lg" placeholder="" type="text" name="phone" value="{{$student->phone}}">
	<label>Alamat Rumah</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_rumah" value="{{$student->alamat_rumah}}">	
	<label>Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi" value="{{$student->instansi}}">
	<label>Alamat Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_instansi" value="{{$student->alamat_instansi}}">	
	<label>Telepon Instansi</label>
	<input class="form-control input-lg" placeholder="Opsional" type="text" name="telp_instansi" value="{{$student->telepon_instansi}}">
	<br>
	<button class="btn btn-success" type="submit" onclick="return confirm('Apakah data yang anda masukan sudah benar?')">Simpan</button>
</form>

@endsection