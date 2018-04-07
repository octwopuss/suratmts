@extends('layouts.admin-master')

@section('admin')
	<h3 class="page-title">Surat Internal</h3>
	<form method="POST" action="{{route('admin.updateSurat1A', $data)}}">
		{{csrf_field()}}

		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">{{$error}}</div>
			@endforeach
		@endif
		<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$nama}}">
		<br>	
		<label>NIM</label>
		<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$nim}}">
		<br>	
		<label>Bidang Pilihan</label>
		<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$bidang_pilihan}}">
		<label>Alamat Rumah</label>
		<input class="form-control input-lg" placeholder="" value="{{$surat->alamat_rumah}}" type="text" name="alamat_rumah">
		<br>
		<label>No.Telepon/HP</label>
		<input class="form-control input-lg" placeholder="" value="{{$surat->telepon}}" type="text" name="telepon">
		<br>
		<label>Instansi</label>
		<input class="form-control input-lg" placeholder="" value="{{$surat->instansi}}" type="text" name="instansi">
		<br>		
		<label>Alamat Instansi</label>
		<input class="form-control input-lg" placeholder="" value="{{$surat->alamat_instansi}}"type="text" name="alamat_instansi">
		<br>		
		<label>No.Telepon Instansi</label>
		<input class="form-control input-lg" placeholder="" value="{{$surat->telp_instansi}}" type="text" name="telp_instansi">
		<label>Keperluan Surat</label>
		<input class="form-control input-lg" type="text" name="kegunaan" value="{{$surat->kegunaan_surat}}">
		<br>
		<label>Untuk Pembuatan Surat : </label><br>
		<select class="form-control" name="keperluan[]">
			<option value="Keterangan Aktif Kuliah"> Keterangan Aktif Kuliah</option>
		</select>
		<br>
		<br>					
		<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
	</form>

@endsection