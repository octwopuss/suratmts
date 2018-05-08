@extends('layouts.admin-master')

@section('admin')
<h3 class="page-title">Surat Eksternal</h3>
<form method="POST" action="{{route('admin.updateSurat1B', $surat->id)}}" enctype="multipart/form-data">
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
	<select class="form-control input-lg" name="alasan_keperluan" id="keperluan-data">
		<option value="Tesis">Penelitian dan Penulisan Tesis</option>
		<option value="Tugas">Penelitian dan Penulisan Tugas Kuliah</option>
	</select>
	<br>
	<label>Judul Tesis</label>
	<input type="text" name="judul_tesis" class="form-control input-lg" value="{{$surat->judul_tesis}}">
	<br>
	<select class="form-control" name="semester">
		<option value="2017/2018,Ganjil">2017/2018 Ganjil</option>
		<option value="2017/2018,Genap">2017/2018 Genap</option>
		<option value="2016/2017,Ganjil">2016/2017 Ganjil</option>
		<option value="2016/2017,Genap">2016/2017 Genap</option>
	</select>
	<label>Alamat Tujuan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_tujuan" value="{{$surat->alamat_tujuan}}">
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
	<span class="input-group-btn"><button class="btn btn-primary" type="submit" onclick="return confirm('Apakah data yang anda masukan sudah benar?')">Save</button></span>
</form>
@endsection