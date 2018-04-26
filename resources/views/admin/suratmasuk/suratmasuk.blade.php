@extends('layouts.admin-master')


@section('title', 'Daftar Surat Masuk')

@section('admin')
<div class="panel-title">
	<h2 class="page-title"><strong>Surat Masuk</strong></h2>
	<h3 class="page-title"><a href="{{route('admin.addSuratMasuk')}}"><button class="btn btn-primary btn-md">Tambah Surat Masuk</button></a></h3>
</div>

<div class="panel">
	<div class="panel-body">
		<table id="table-surat" class="display" style="width:100%">
			<thead>
				<tr>
					<td>No</td>
					<td>Pengirim</td>
					<td>Tanggal</td>
					<td>No. Surat</td>
					<td>Perihal</td>
					<td>Keterangan</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				@foreach($suratmasuk as $surat)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$surat->pengirim}}</td>
					<td>
						@php 
							$date = date_create($surat->tanggal);					
							echo date_format($date, "d-m-Y");
						@endphp
					</td>
					<td>{{$surat->nomor_surat}}</td>
					<td>{{$surat->perihal}}</td>
					<td>{{$surat->keterangan}}</td>
					<td>
						<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a>
						<!-- Modal -->

						<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog modal-lg">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">{{$surat->perihal}}</h4>
						        </div>
						        <div class="modal-body" style="width: 100%; text-align: center;">						        
						          <img width="800" height="800" src="/gambar/{{$surat->file_surat}}">
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						</div>

						<a title="Edit" href="{{route('admin.editSuratMasuk', $surat->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
						<a title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus surat ini?')" href="{{route('admin.deleteSuratMasuk', $surat->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection