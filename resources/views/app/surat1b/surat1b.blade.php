@extends('layouts.master')

@section('title', 'Daftar Surat Permintaan Data')
@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat Eksternal</strong></h3>
	<h3 class="page-title"><a href="{{route('createSurat1B')}}"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
</div>

@php
	$i = 1;	
@endphp
<div class="panel">
	@if(Session::has('success'))
		<div id="toastr-demo">				
		</div>
	@endif	
	<div class="panel-body">
		<table id="table-surat" class="display" style="width:100%">
			<thead>
				<tr>			
					<th>No.</th>		
					<th>Keperluan Data</th>
					<th>Instansi Tujuan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)	
			@php				
				$surat1b = DB::table('surat_1_b')->where('id', $srt->id_surat)->first();
			@endphp	
				<tr>		
					<td>{{$i++}}</td>							
					<td>{{$surat1b->keperluan_data}}</td>					
					<td>{{$surat1b->instansi_tujuan}}</td>
					<td>{{$surat1b->created_at}}</td>
					<td>						
						<a href="{{route('editSurat1B', $srt->id_surat)}}" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
						<a onclick="return confirm('Apakah anda yakin akan menghapus surat ini?')" href="{{route('deleteSurat1B', $srt->id_surat)}}" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>
</div>
@endsection