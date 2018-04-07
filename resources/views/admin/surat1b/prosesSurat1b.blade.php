@extends('layouts.admin-master')

@section('admin')
	<form method="POST" action="{{route('admin.storeProses1B', $id)}}">
		{{csrf_field()}}

		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">{{$error}}</div>
			@endforeach
		@endif	
		

		<div class="panel">
			<div class="panel-body">
				<h2>Masukkan Nomor Surat</h2>				
			</div>			
			<div class="panel-body">
				<label>Nomor Surat</label>
				<input type="text" name="nomor" placeholder="Nomor Terakhir {{$nomor}}" class="form-control">								
				<br>				
				<button class="btn btn-primary" type="submit">Lanjut</button>
			</div>			
		</div>
	</form>	
@endsection