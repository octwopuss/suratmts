@extends('layouts.master')

@section('form')
<h3 class="page-title">Surat {{$data}}</h3>
<form method="POST" action="{{route('storeSurat', $data)}}">
	{{csrf_field()}}
	<label>Nama</label>
	<input class="form-control input-lg" placeholder="" type="text" name="name">
	<br>
	<label>NIM</label>
	<input class="form-control input-lg" placeholder="" type="text" name="nim">
	<br>
	<label>Angkatan</label>
	<input class="form-control input-lg" placeholder="" type="text" name="angkatan">
	<br>
	<label>Tanggal</label>
	<input type="date" name="waktu" class="form-control input-lg" name="tanggal">
	<br>	
	<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection