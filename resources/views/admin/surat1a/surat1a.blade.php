@extends('layouts.admin-master')

@section('admin')
	<div class="panel-title">
	<h3 class="page-title"><strong>Surat Internal</strong></h3>
	<h3 class="page-title"><a href="{{route('admin.pengajuSurat1A')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Surat</button></a></h3>
</div>

<div class="panel">	
	<div class="panel-body">
		<table id="table-surat" style="width:100%">
			<thead>
				<tr>
					<?php $i = 1; ?>
					<th>No.</th>	
					<th>Pengaju</th>									
					<th>Keperluan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)		
				@php
					$id = $srt->id_surat;
					$surat = DB::table('surat_1_a')->where('id', $id)->first();
				@endphp
			<tr>			
				<td>{{$i++}}</td>
				<td>{{$surat->nama}}</td>	
				<td>{{$surat->keperluan}}</td>					
				<td>{{$surat->created_at}}</td>
				<td>						
				<a href="{{route('admin.prosesSurat1A', $srt->id_surat)}}" title="Proses Surat" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></a>		
				<a href="{{route('admin.editSurat1A', $srt->id_surat)}}" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
				<a href="{{route('admin.tolakSurat1A', $srt->id_surat)}}" title="Tolak" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a></a>	
				
				</td>
			</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>	
</div> 	
		
@endsection