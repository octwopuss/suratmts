@extends('layouts.admin-master')

@section('admin')
<h3 class="page-title">Tambah Mahasiswa</h3>
<form method="POST" action="{{route('admin.updateMahasiswa', $student->id)}}">
	{{csrf_field()}}
	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif	
	<label>Nama<strong>*</strong></label>
	<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$student->nama}}">
	<br>	
	<label>NIM<strong>*</strong></label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$student->nim}}">
	<br>	
	<label>Bidang Pilihan<strong>*</strong></label>
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$student->bidang_pilihan}}">
	<br>	
	<label>Jenis Kelamin<strong>*</strong></label>
	<select class="form-control" name="gender">
		<option value="1">Laki-laki</option>
		<option value="2">Perempuan</option>
	</select>	
	<br>
	<label>Email</label>
	<input class="form-control input-lg" placeholder="" type="text" name="email" value="{{$student->email}}">
	<label>Telepon</label>
	<input class="form-control input-lg" placeholder="" type="text" name="phone" value="{{$student->phone}}">
	<br>
	<button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection