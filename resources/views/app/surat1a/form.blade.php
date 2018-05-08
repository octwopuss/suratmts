@extends('layouts.master')

@section('form')
<h3 class="page-title">Surat Internal</h3>
<form method="POST" action="{{route('storeSurat1A', $student->id)}}">
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
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$student->bidang_pilihan}}">
	<br>
	<label>Semester</label>
	<select name="semester" class="form-control input-lg">
		<option value="2017/2018,ganjil">2017/2018 Ganjil</option>
		<option value="2017/2018,genap">2017/2018 Genap</option>
		<option value="2016/2017,ganjil">2016/2017 Ganjil</option>
		<option value="2016/2017,genap">2016/2017 Genap</option>
		<option value="2015/2016,ganjil">2015/2016 Ganjil</option>
		<option value="2015/2016,genap">2015/2016 Genap</option>
		<option value="2014/2015,ganjil">2014/2015 Ganjil</option>
		<option value="2014/2015,genap">2014/2015 Genap</option>
		<option value="2013/2014,ganjil">2013/2014 Ganjil</option>
		<option value="2013/2014,genap">2013/2014 Genap</option>
		<option value="2012/2013,ganjil">2012/2013 Ganjil</option>
		<option value="2012/2013,genap">2012/2013 Genap</option>
	</select>
	<br>
	<label>Alamat Rumah</label>
	<input class="form-control input-lg" placeholder="" type="text" value="{{$student->alamat_rumah}}" name="alamat_rumah">
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
	<label>Keperluan Surat</label>
	<input class="form-control input-lg" type="text" name="kegunaan">
	<br>
	<label>Untuk Pembuatan Surat : </label><br>
	<select class="form-control" name="keperluan[]">
		<option value="Keterangan Aktif Kuliah"> Keterangan Aktif Kuliah</option>
	</select>
	<br>
	<br>
	<span class="input-group-btn"><button class="btn btn-primary" type="submit" onclick="return confirm('Apakah data yang anda masukan sudah benar?')">Save</button></span>
</form>
@endsection