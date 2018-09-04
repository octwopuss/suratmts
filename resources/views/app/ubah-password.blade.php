@extends('layouts.master')
@section('title','Ubah Password')

@section('history')

<form method="POST" action="{{route('updatePassword')}}">
	{{csrf_field()}}

	@if(Session::has('gagal-update-password'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check-circle"></i> {{Session::get('gagal-update-password')}}
        </div>        
    @endif

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
	@endif
	<div class="panel">
		<div class="panel-heading">
			<h1 class="panel-title"><strong>Ubah Password</strong></h1>			
		</div>
		<div class="panel-body">			
			<label>Masukkan Password Baru</label>
			<input class="form-control input-lg" placeholder="" type="password" name="password_baru">
			<label>Konfimasi Password</label>
			<input class="form-control input-lg" placeholder="" type="password" name="konfirmasi_password">
		</div>
		<div class="panel-body">
			<button type="submit" class="btn btn-primary" >Lanjut</button>				
		</div>		
	</div>	
</form>
@endsection