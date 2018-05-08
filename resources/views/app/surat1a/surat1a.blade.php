@extends('layouts.master')


@section('title', 'Daftar Surat Keterangan Aktif Kuliah')
@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat Internal</strong></h3>
	<h3 class="page-title"><a href="/surat-internal/create"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
</div>
@php
$no = 1;
@endphp

<div class="panel">
	<div class="panel-body">
		<table id="table-surat" class="cell-border" style="width:100%">
			<thead>
				<tr>						
					<th>No. </th>			
					<th>Keperluan</th>
					<th>Tanggal Diajukan</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)		
				@php				
					$surat1a = DB::table('surat_1_a')->where('id', $srt->id_surat)->first();					
				@endphp
			<tr>
				<td>{{$no++}}</td>				
				<td>{{$surat1a->keperluan}}</td>					
				<td>{{$surat1a->created_at}}</td>
				<td>					
					<a href="{{route('editSurat1A', $surat1a->id)}}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
					<a onclick="return confirm('Apakah anda yakin akan menghapus surat ini?')" href="{{route('deleteSurat1A', $srt->id)}}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>					
				</td>
			</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>	
</div> 	

@endsection