@extends('layouts.admin-master')

@section('form')
<h3 class="page-title">Surat {{$data}}</h3>
<form method="POST">
	<input class="form-control input-lg" placeholder="" type="text">
	<br>
	<input class="form-control input-lg" placeholder="" type="text">
	<br>
	<input class="form-control input-lg" placeholder="" type="text">
	<br>
	<input type="date" name="waktu" class="form-control input-lg">
	<br>
	<span class="input-group-btn"><button class="btn btn-primary" type="button">Save</button></span>
</form>
@endsection