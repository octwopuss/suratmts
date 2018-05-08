@extends('layouts.master')

@section('title', 'Edit Pengajuan Surat Permintaan Data')
@section('form')
<h3 class="page-title">Surat Eksternal</h3>
<form method="POST" action="{{route('updateSurat1B', $data)}}" enctype="multipart/form-data">
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
	<label>Judul Tesis</label>
	<input type="text" class="form-control input-lg" name="judul_tesis" value="{{$surat->judul_tesis}}">
	<br> 
	<label>Instansi Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi_tujuan" value="{{$surat->instansi_tujuan}}"> 
	<label>Alamat Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_tujuan" value="{{$surat->alamat_tujuan}}">
	<br>
	<select class="form-control input-lg" name="alasan_keperluan" id="keperluan-data">
		<option value="Tesis">Penulisan dan Penelitian Tesis</option>
		<option value="Tugas">Penulisan dan Penelitian Tugas</option>
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
	<div class="form-group row">
		<div class="col-xs-10" id="keperluan_data">
			<label>Keperluan Data</label>
			<input class="form-control input-lg" placeholder="" type="text" name="keperluan_data[]">
		</div>
		<div class="col-xs-2">
			<label>Tambah Data</label>
			<div>
				<span onclick="tambahData()" class="btn btn-success btn-md" title="Tambah Data" id="btnTambahData"><i class="fa fa-plus"></i></span>
				<!-- <span onclick="kurangiData()" class="btn btn-danger btn-md" title="Kurangi Data" id="btnKurangiData"><i class="fa fa-minus"></i></span> -->
			</div>
		</div>
	</div>
	<br>
	<div id="bukti_ba">
		<label>Upload Berita Acara Seminar</label>
		<input type="file" name="bukti_ba" class="form-control input-lg">
	</div>
	<br>
	<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection