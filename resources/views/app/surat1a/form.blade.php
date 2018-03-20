@extends('layouts.master')

@section('form')
<h3 class="page-title">Surat Internal</h3>
<form method="POST" action="{{route('storeSurat1A', $data)}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif
	
	<label>Alamat Rumah</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_rumah">
	<br>
	<label>No.Telepon/HP</label>
	<input class="form-control input-lg" placeholder="" type="text" name="telepon">
	<br>
	<label>Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="instansi">
	<br>		
	<label>Alamat Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="alamat_instansi">
	<br>		
	<label>No.Telepon Instansi</label>
	<input class="form-control input-lg" placeholder="" type="text" name="telp_instansi">
	<br>		
	<label>Keperluan</label><br>
	<input type="radio" name="keperluan" value="Keterangan Aktif Kuliah"> Keterangan Aktif Kuliah<br>
	<input type="radio" name="keperluan" value="Permintaan Cuti Akademik"> Permintaan Cuti Akademik<br>
	<input type="radio" name="keperluan" value="Pernyataan Kesediaaan Seminar Proposal/Data Tesis/Draft Tesis/Sidang Tesis"> Pernyataan Kesediaaan Seminar Proposal/Data Tesis/Draft Tesis/Sidang Tesis<br>
	<input type="radio" name="keperluan" value="Permintaan Hasil Studi Sementar"> Permintaan Hasil Studi Sementara<br>
	<input type="radio" name="keperluan" value="Permintaan Transkrip Akademik"> Permintaan Transkrip Akademik <br>
	<input type="radio" name="keperluan" value="Keterangan Lulus Untuk Pengambilan Ijazah"> Keterangan Lulus Untuk Pengambilan Ijazah<br>
	<input type="radio" name="keperluan" value="Keterangan Aktif Kuliah"> Lain - Lain <br>
	<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection