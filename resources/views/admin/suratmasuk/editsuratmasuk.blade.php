@extends('layouts.admin-master')

@section('title', 'Tambah Surat Masuk')

@section('admin')
<div class="panel-title">
	<h1 class="page-title">Tambah Surat Masuk</h1>
</div>

<form method="POST" action="{{route('admin.updateSuratMasuk', $surat->id)}}" enctype="multipart/form-data">
	{{csrf_field()}}

	<label>Pengirim</label>
	<input type="text" name="pengirim" class="form-control input-lg" value="{{$surat->pengirim}}">

	<br>
	<label>Tanggal</label>
	<input type="date" name="tanggal" class="form-control input-lg">
	
	<br>
	<label>Nomor Surat</label>
	<input type="text" name="nomor_surat" class="form-control input-lg" value="{{$surat->nomor_surat}}">	

	<br>
	<label>Perihal</label>
	<input type="text" name="perihal" class="form-control input-lg" value="{{$surat->perihal}}">

	<br>
	<label>Scan Surat Masuk</label>
	<input type="file" name="scan_surat" class="form-control">

	<br>
	<label>Keterangan</label>
	<textarea class="form-control input-lg" placeholder="Opsional" rows="4" name="keterangan" value="{{$surat->keterangan}}"></textarea>

	<br>
	<button type="submit" onclick="return confirm('Apakah data yang anda masukan sudah benar?')" class="btn btn-success btn-md">Update</button>

</form>
@endsection