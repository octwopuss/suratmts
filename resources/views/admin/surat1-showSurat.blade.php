@extends('layouts.admin-master')

@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat 1</strong></h3>
	<h3 class="page-title"><a href="/admin/buat-surat/1"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
</div>
<div class="panel">	
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
						<a target="_blank" href="#"><button type="button" class="btn btn-primary btn-sm">View</button></a>
						<a href="#"><button type="button" class="btn btn-warn btn-sm">Edit</button></a>
						<a href="#" class="deleteSurat"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
					</td>
				</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>
</div>
@endsection