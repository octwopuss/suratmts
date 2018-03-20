@extends('layouts.master')

@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat Eksternal</strong></h3>
	<h3 class="page-title"><a href="{{route('createSurat1B')}}"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
</div>

<div class="panel">

	@if(Session::has('success'))
		<div id="toastr-demo">				
		</div>
	@endif	
	<div class="panel-body">
		<table id="table-surat" class="display" style="width:100%">
			<thead>
				<tr>					
					<th>Keperluan Data</th>
					<th>Instansi Tujuan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)		
				<tr>									
					<td>{{$srt->keperluan_data}}</td>					
					<td>{{$srt->instansi_tujuan}}</td>
					<td>{{$srt->created_at}}</td>
					<td>
						<a target="_blank" href="{{route('viewSurat', $srt->id)}}"><button type="button" class="btn btn-primary btn-sm">View</button></a>
						<a href="{{route('editSurat1B', $srt->id)}}"><button type="button" class="btn btn-warn btn-sm">Edit</button></a>
						<a href="{{route('deleteSurat1B', $srt->id)}}" class="deleteSurat"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
					</td>
				</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>
</div>
@endsection