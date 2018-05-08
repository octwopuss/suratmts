@extends('layouts.admin-master')

@section('admin')
	<form method="POST" action="{{route('admin.storeProses1A', $id)}}">
		{{csrf_field()}}

		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">{{$error}}</div>
			@endforeach
		@endif	

		<div class="panel">
			<div class="panel-title">
				<h2>Masukkan Nomor Surat</h2>
			</div>
			<div class="panel-body">
				<label>Nomor Surat</label>
				<input type="text" name="nomor" class="form-control input-lg" placeholder="Nomor Terakhir {{$nomor}}">	
				<br>
				<label>Penanggung Jawab</label>																
				<select class="form-control input-lg" name="pj">
					@foreach($ttd as $pj)
					<option value="{{$pj->id}}">{{$pj->jabatan}} - {{$pj->nama}}</option>
					@endforeach
				</select>
				<br>				
				<button class="btn btn-primary" type="submit">Lanjut</button>
			</div>			
		</div>
	</form>	
@endsection