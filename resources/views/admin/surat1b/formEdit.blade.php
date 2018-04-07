@extends('layouts.admin-master')

@section('admin')
<h3 class="page-title">Surat Eksternal</h3>
<form method="POST" action="{{route('admin.updateSurat1B', $surat->id)}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif
	<label>Nama</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$surat->nama}}">
	<br>	
	<label>NIM</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$surat->nim}}">
	<br>	
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
	<input class="form-control input-lg" placeholder="" type="text" name="instansi_tujuan" value="{{$surat->instansi_tujuan}}"><label>Keperluan</label>		
	<select class="form-control" name="alasan_keperluan">
		<option value="Tesis">Penilitian dan Penulisan Tesis</option>
		<option value="Proposal Tesis">Penilitian dan Penulisan Proposal Tesis</option>
	</select>
	<br>
	<label>Judul Tesis</label>
	<input type="text" name="judul_tesis" class="form-control" value="{{$surat->judul_tesis}}">
	<br>
	<label>Alamat Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_tujuan" value="{{$surat->alamat_tujuan}}">
	<br>
	<label>Keperluan Data</label>
	@foreach($keperluan_data as $data)
	<input class="form-control input-lg" placeholder="" type="text" name="keperluan_data[]" value="{{$data}}">	
	@endforeach
	@if(count($keperluan_data) < 4)
		@for($i = count($keperluan_data); $i < 4; $i++)
			<input class="form-control input-lg" placeholder="Opsional" type="text" name="keperluan_data[]">	
		@endfor
	@endif
	<br>	
	<br>
	<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection