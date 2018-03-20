@extends('layouts.master')

@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat Internal</strong></h3>
	<h3 class="page-title"><a href="/surat-internal/create"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
</div>

<div class="panel">

	@if($cek_surat == null)
	<div class="panel-body">
		<table id="table-surat" class="cell-border" style="width:100%">
			<thead>
				<tr>									
					<th>Keperluan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>			
			<tr>				
				<td></td>					
				<td></td>
				<td>					
				</td>
			</tr>							
			</tbody>
		</table>
	</div>
	@else
	<div class="panel-body">
		<table id="table-surat" class="cell-border" style="width:100%">
			<thead>
				<tr>									
					<th>Keperluan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)		
			<tr>				
				<td>{{$srt->keperluan}}</td>					
				<td>{{$srt->created_at}}</td>
				<td>
					<a target="_blank" href="{{route('viewSurat', $srt->id)}}"><button type="button" class="btn btn-primary btn-sm">View</button></a>
					<a href="{{route('editSurat1A', $srt->id)}}"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
					<a href="{{route('deleteSurat1A', $srt->id)}}" class="deleteSurat"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
				</td>
			</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>
	@endif		
</div> 	

@endsection