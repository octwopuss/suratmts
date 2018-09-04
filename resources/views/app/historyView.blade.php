@extends('layouts.master')


@section('title', 'Detail Surat')

@section('form')
	@if($tipe == "1A")

	<div class="col-md-9">
		<div class="panel">
			<div class="panel panel-heading">
				<div class="panel-title">
					<h3>Detail Surat Keterangan Aktif Kuliah</h3>
				</div>
			</div>
			<div class="panel-body">
				<p>Nama</p>
				<p><b>{{$surat->nama}}</b></p>
				<p>NIM</p>
				<p><b>{{$surat->nim}}</b></p>
				<p>Bidang Pilihan</p>
				<p><b>{{$surat->bidang_pilihan}}</b></p>
				<p>Semester</p>
				<p><b>{{$surat->semester}}</b></p>
				<p>Alamat Rumah</p>
				<p><b>{{$surat->alamat_rumah}}</b></p>
				<p>No. Telepon/HP</p>
				<p><b>{{$surat->telepon}}</b></p>
				<p>Instansi</p>
				<p><b>{{$surat->instansi}}</b></p>
				<p>Alamat Instansi</p>
				<p><b>{{$surat->alamat_instansi}}</b></p>
				<p>No. Telepon Instansi</p>
				<p><b>@if($surat->telp_instansi) {{$surat->telp_instansi}} @else - @endif</b></p>
				<p>Keperluan Surat</p>
				<p><b>{{$surat->kegunaan_surat}}</b></p>
				<p>Keperluan Pembuatan Surat</p>
				<p><b>{{$surat->keperluan}}</b></p>
			</div>
		</div>			
	</div>
	@else
	<div class="col-md-9">
		<div class="panel">
			<div class="panel panel-heading">
				<div class="panel-title">
					<h3>Detail Surat Keterangan Aktif Kuliah</h3>
				</div>
			</div>
			<div class="panel-body">
				<p>Nama</p>
				<p><b>{{$surat->nama}}</b></p>
				<p>NIM</p>
				<p><b>{{$surat->nim}}</b></p>
				<p>Bidang Pilihan</p>
				<p><b>{{$surat->bidang_pilihan}}</b></p>
				<p>Judul Tesis</p>
				<p><b>@if($surat->judul_tesis) {{$surat->judul_tesis}} @else - @endif</b></p>
				<p>Semester</p>
				<p><b>{{$surat->semester}}</b></p>
				<p>Alamat Rumah</p>
				<p><b>{{$surat->alamat_rumah}}</b></p>
				<p>No. Telepon/HP</p>
				<p><b>{{$surat->telepon}}</b></p>
				<p>Instansi</p>
				<p><b>{{$surat->instansi}}</b></p>
				<p>Alamat Instansi</p>
				<p><b>{{$surat->alamat_instansi}}</b></p>
				<p>No. Telepon Instansi</p>
				<p><b>@if($surat->telp_instansi) {{$surat->telp_instansi}} @else - @endif</b></p>
				<p>Keperluan Surat</p>
				<p><b>{{$surat->alasan_keperluan}}</b></p>				
				<p>Instansi Tujuan</p>
				<p><b>{{$surat->instansi_tujuan}}</b></p>
				<p>Alamat Tujuan</p>
				<p><b>{{$surat->alamat_tujuan}}</b></p>
				<p>Permintaan Data</p>	
				<ul>
					@foreach($data as $dt)
					<li>{{$dt}}</li>
					@endforeach
				</ul>
			</div>
		</div>			
	</div>
		<!-- <label>Nama</label>
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
		<input class="form-control input-lg" placeholder="Opsional" type="text" name="telp_instansi" value="{{$surat->telp_instansi}}">
		<br>	
		<label>Judul Tesis</label>		
		<input type="text" name="judul_tesis" class="form-control input-lg" value="{{$surat->judul_tesis}}">
		<br>
		<label>Keperluan</label>		
		<input type="text" name="judul_tesis" class="form-control input-lg" value="Penelitian dan Penulisan {{$surat->alasan_keperluan}}">
		<br>
		<label>Instansi Tujuan</label>
		<input class="form-control input-lg" placeholder="" type="text" name="instansi_tujuan" value="{{$surat->instansi_tujuan}}">
		<label>Alamat Tujuan</label>
		<input class="form-control input-lg" placeholder="" type="text" name="alamat_tujuan" value="{{$surat->alamat_tujuan}}">
		<br>
		<label>Data</label>
		<ul>
			@foreach($data as $dt)
			<li>{{$dt}}</li>
			@endforeach
		</ul> -->

	@endif
@endsection