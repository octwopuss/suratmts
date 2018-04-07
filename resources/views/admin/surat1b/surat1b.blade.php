@extends('layouts.admin-master')

@section('admin')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat Eksternal</strong></h3>
	<h3 class="page-title"><a href="{{route('admin.pengajuSurat1B')}}"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
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
					<?php $i = 1; ?>
					<th>No.</th>			
					<th>Pengaju</th>
					<th>Keperluan Data</th>
					<th>Instansi Tujuan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)				
				@php
					$id = $srt->id_surat;
					$surat = DB::table('surat_1_b')->where('id', $id)->first();
				@endphp
				<tr>				
					<td>{{$i++}}</td>
					<td>{{$surat->nama}}</td>						
					<td>{{$surat->keperluan_data}}</td>					
					<td>{{$surat->instansi_tujuan}}</td>
					<td>{{$surat->created_at}}</td>
					<td>						
						<a href="{{route('admin.prosesSurat1B', $srt->id_surat)}}" title="Proses Surat" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></a>
						<a href="{{route('admin.editSurat1B', $srt->id_surat)}}" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
						<a href="{{route('admin.tolakSurat1B', $srt->id_surat)}}" title="Tolak" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a></a>						
						
					</td>
				</tr>								
			@endforeach	
			</tbody>
		</table>
	</div>
</div>
@endsection