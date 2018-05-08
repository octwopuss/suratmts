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
					<th>Keperluan </th>
					<th>Instansi Tujuan</th>
					<th>Tanggal Diajukan</th>					
					<th>Aksi</th>
				</tr>`
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
					<td>
						@if($surat->alasan_keperluan == "Tugas")
							Penulisan dan penelitian tugas
							
						@else
							Penulisan dan penelitian tesis
						@endif
					</td>					
					<td>{{$surat->instansi_tujuan}}</td>
					<td>{{$surat->created_at}}</td>
					<td>			
						@if($surat->ba_seminar)
							<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a>
						<!-- Modal -->

						<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog modal-lg">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Berita Acara Seminar</h4>
						        </div>
						        <div class="modal-body" style="width: 100%; text-align: center;">						        
						          <img src="/bukti_seminar/{{$surat->ba_seminar}}">
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						</div>
						@endif
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