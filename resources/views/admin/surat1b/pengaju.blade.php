@extends('layouts.admin-master');

@section('admin')

<form method="POST" action="{{route('admin.findPengajuSurat1B')}}">	
	{{csrf_field()}}
	<div class="panel">
		<div class="panel-heading">
			<h1 class="panel-title"><strong>Pilih Pengaju Surat Eksternal</strong></h1>			
		</div>
		<div class="panel-body">
			<select class="form-control" id="select2-js" name="pengaju">
				@foreach($student as $mhs)
					<option value="{{$mhs->id}}">{{$mhs->nama}}</option>
				@endforeach				
			</select>														
		</div>
		<div class="panel-body">
			<button type="submit" class="btn btn-primary" >Lanjut</button>				
		</div>		
	</div>	
</form>

@endsection