@extends('layouts.master')


@section('title', 'Detail Surat')

@section('form')
	@if($tipe == "1A")
		<label>Nama</label>
		<input class="form-control input-lg" placeholder="" type="text" name="nama" value="{{$surat->nama}}">
		<br>	
		<label>NIM</label>
		<input class="form-control input-lg" placeholder="" type="text" name="nim" value="{{$surat->nim}}">
		<br>	
		<label>Bidang Pilihan</label>
		<input class="form-control input-lg" placeholder="" type="text" name="bidang_pilihan" value="{{$surat->bidang_pilihan}}">
		<br>
		<label>Semester</label>
		<input type="text" name="" value="{{$surat->semester}}" class="form-control input-lg">
		<br>
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
		<br>		
		<label>Keperluan Surat</label>
		<input class="form-control input-lg" type="text" name="kegunaan" value="{{$surat->kegunaan_surat}}">
		<br>
		<label>Untuk Pembuatan Surat : </label><br>
		<input type="text" name="" class="form-control input-lg" value="{{$surat->keperluan}}">
	@else
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
		</ul>

	@endif
@endsection