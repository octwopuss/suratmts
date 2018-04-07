@extends('layouts.master')

@section('form')
<h3 class="page-title">Surat Eksternal</h3>
<form method="POST" action="{{route('updateSurat1B', $data)}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif
	<label>Bidang Pilihan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$surat->bidang_pilihan}}">
	<br>
	<label>Alamat Rumah</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_rumah" value="{{$surat->alamat_rumah}}">
	<br>
	<label>No.Telepon/HP</label>
	<input class="form-control input-lg" placeholder="" type="text" name="telepon" value="{{$surat->telepon}}">
	<br>
	<label>Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi" value="{{$surat->instansi}}">
	<br>		
	<label>Alamat Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_instansi" value="{{$surat->alamat_instansi}}">
	<br>		
	<label>No.Telepon Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="telp_instansi" value="{{$surat->telp_instansi}}">
	<br>			
	<label>Instansi Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi_tujuan" value="{{$surat->instansi_tujuan}}"> 
	<label>Alamat Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_tujuan" value="{{$surat->alamat_tujuan}}">
	<br>
	<select class="form-control" name="alasan_keperluan">
		<option value="Penulisan Tesis">Penulisan Proposal Tesis</option>
		<option value="Penulisan Proposal Tesis">Penulisan Proposal Tesis</option>
	</select>
	<br>
	<label>Keperluan Data</label>
	@foreach($keperluan_data as $data)						
		<input class="form-control input-lg" placeholder="" type="text" name="keperluan_data[]" value="{{$data}}">		
	@endforeach
	@if(count($keperluan_data) < 4)			
			@for($max = 4; $max > count($keperluan_data); $max--)
			<input class="form-control input-lg" placeholder="optional" type="text" name="keperluan_data[]">
			@endfor
		@endif
	<br>
	<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection