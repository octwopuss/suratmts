@extends('layouts.master')

@section('form')
<h3 class="page-title">Surat Eksternal</h3>
<form method="POST" action="{{route('storeSurat1B', $student->id)}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif	
	<label>Nama</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$student->nama}}" disabled="True">
	<br>	
	<label>NIM</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$student->nim}}" disabled="True">
	<br>	
	<label>Bidang Pilihan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$student->bidang_pilihan}}" disabled="True">
	<br>
	<label>Alamat Rumah</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_rumah" value="{{$student->alamat_rumah}}">
	<br>
	<label>No.Telepon/HP</label>
	<input class="form-control input-lg" placeholder="" type="text" name="telepon" value="{{$student->phone}}">
	<br>
	<label>Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi" value="{{$student->instansi}}">
	<br>		
	<label>Alamat Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_instansi" value="{{$student->alamat_instansi}}">
	<br>		
	<label>No.Telepon Instansi</label>
	<input class="form-control input-lg" placeholder="Opsional" type="text" name="telp_instansi" value="{{$student->telepon_instansi}}">
	<br>	
	<label>Judul Tesis</label>		
	<input type="text" name="judul_tesis" class="form-control input-lg">
	<label>Keperluan</label>		
	<select class="form-control" name="alasan_keperluan">
		<option value="Tesis">Penilitian dan Penulisan Tesis</option>
		<option value="Proposal Tesis">Penilitian dan Penulisan Proposal Tesis</option>
	</select>
	<br>
	<label>Instansi Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi_tujuan">
	<label>Alamat Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_tujuan">
	<br>
	<label>Keperluan Data</label>
	<input class="form-control input-lg" placeholder="" type="text" name="keperluan_data[]">
	<input class="form-control input-lg" placeholder="Opsional" type="text" name="keperluan_data[]">
	<input class="form-control input-lg" placeholder="Opsional" type="text" name="keperluan_data[]">
	<input class="form-control input-lg" placeholder="Opsional" type="text" name="keperluan_data[]">
	<br>
	<span class="input-group-btn"><button class="btn btn-primary" type="submit" onclick="return confirm('Apakah data yang anda masukan sudah benar?')">Save</button></span>
</form>
@endsection