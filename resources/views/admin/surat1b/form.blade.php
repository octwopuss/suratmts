@extends('layouts.admin-master')

@section('admin')
<h3 class="page-title">Surat Eksternal</h3>
<form method="POST" action="{{route('admin.storeSurat1B', $student->id)}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif	
	<label>Nama</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$student->nama}}">
	<br>	
	<label>NIM</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$student->nim}}">
	<br>	
	<label>Bidang Pilihan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$student->bidang_pilihan}}" >
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
	<label>Keperluan</label>		
	<select class="form-control" name="alasan_keperluan">
		<option value="Tesis">Penelitian dan Penulisan Tesis</option>
		<option value="Proposal Tesis">Tugas Kuliah</option>
	</select>
	<br>
	<label>Judul Tesis</label>
	<input type="text" name="judul_tesis" class="form-control">
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
	<span class="input-group-btn"><button onclick="return confirm('Apakah data yang anda masukan sudah benar?')" class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection