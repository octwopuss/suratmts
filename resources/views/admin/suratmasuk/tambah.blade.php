@extends('layouts.admin-master')

@section('title', 'Tambah Surat Masuk')

@section('admin')
<div class="panel-title">
	<h1 class="page-title">Tambah Surat Masuk</h1>
</div>

@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">{{$error}}</div>
	@endforeach
@endif

<form method="POST" action="{{route('admin.storeSuratMasuk')}}" enctype="multipart/form-data">
	{{csrf_field()}}

	<label>Pengirim</label>
	<input type="text" name="pengirim" class="form-control input-lg">

	<br>
	<label>Tanggal Surat</label>
	<input type="date" name="tanggal" class="form-control input-lg">
	
	<br>
	<label>Nomor Surat</label>
	<input type="text" name="nomor_surat" class="form-control input-lg">	

	<br>
	<label>Perihal</label>
	<input type="text" name="perihal" class="form-control input-lg">

	<br>
	<label>Tanggal Diterima</label>
	<input type="date" name="tanggal_diterima" class="form-control input-lg">

	<br>
	<label>Scan Surat Masuk</label>
	<input type="file" name="scan_surat" class="form-control input-lg" multiple>

	<br>
	<label>Keterangan</label>
	<textarea class="form-control input-lg" placeholder="Opsional" rows="4" name="keterangan"></textarea>

	<br>
	<button type="submit" class="btn btn-success btn-md" onclick="return confirm('Apakah data yang anda masukan sudah benar?')">Simpan</button>

</form>
@endsection