@extends('layouts.master')

@section('form')
<h3 class="page-title">Surat 1</h3>
<form method="POST" action="{{route('updateSurat', $surat->id)}}">
	{{csrf_field()}}

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif

	<label>Nama</label>
	<input class="form-control input-lg" placeholder="" value="{{$surat->nama}}" type="text" name="nama">
	<br>
	<label>NIM</label>
	<input class="form-control input-lg" placeholder="" value="{{$surat->nim}}" type="text" name="nim">
	<br>
	<label>Angkatan</label>
	<input class="form-control input-lg" placeholder="" value="{{$surat->angkatan}}"  type="text" name="angkatan">
	<br>		
	<span class="input-group-btn"><button class="btn btn-primary" type="submit">Save</button></span>
</form>
@endsection