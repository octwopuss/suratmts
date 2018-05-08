@extends('layouts.admin-master')

@section('admin')
<h3 class="page-title">Tambah Mahasiswa</h3>
<form method="POST" action="{{route('admin.storeMahasiswa')}}">
	{{csrf_field()}}
	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif	
	<label>Nama<strong>*</strong></label>
	<input class="form-control input-lg" placeholder="" type="text" name="nama">
	<br>	
	<label>NIM<strong>*</strong></label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim">
	<br>	
	<label>Bidang Pilihan<strong>*</strong></label>
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan">
	<br>	
	<label>Judul Tesis *</label>
	<input type="text" name="judul_tesis" class="form-control input-lg">
	<br>
	<label>Jenis Kelamin<strong>*</strong></label>
	<select class="form-control input-lg" name="gender">
		<option value="1">Laki-laki</option>
		<option value="2">Perempuan</option>
	</select>	
	<br>
	<label>Email</label>
	<input class="form-control input-lg" placeholder="" type="text" name="email">
	<label>Telepon</label>
	<input class="form-control input-lg" placeholder="" type="text" name="phone">
	<br>
	<label>Alamat Rumah</label>
	<input type="text" name="alamat_rumah" class="form-control input-lg">
	<br>
	<label>Instansi</label>
	<input type="text" name="instansi" class="form-control input-lg">
	<br>
	<label>Alamat Instansi</label>
	<input type="text" name="alamat_instansi" class="form-control input-lg">
	<br>
	<button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection