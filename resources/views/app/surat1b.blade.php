@extends('layouts.master')

@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat Eksternal</strong></h3>
	<h3 class="page-title"><a href="/table/surat1/1/tambah"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
</div>

<div class="panel">

	@if(Session::has('success'))
		<div id="toastr-demo">
		</div>
	@endif
	<form class="navbar-form navbar-right">
		<div class="input-group">
			<input type="text" value="" class="form-control" placeholder="Cari Data...">
			<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
		</div>
	</form>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>					
					<th>Jenis Surat</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)		
				<tr>									
					<td>Surat 1</td>					
					<td>{{$srt->created_at}}</td>
					<td>
						<a target="_blank" href="{{route('viewSurat', $srt->id)}}"><button type="button" class="btn btn-primary btn-sm">View</button></a>
						<a href="{{route('editSurat', $srt->id)}}"><button type="button" class="btn btn-warn btn-sm">Edit</button></a>
						<a href="{{route('deleteSurat', $srt->id)}}" class="deleteSurat"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
					</td>
				</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>
</div>
@endsection