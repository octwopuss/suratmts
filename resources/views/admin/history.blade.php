@extends('layouts.admin-master')

@section('title','Riwayat Surat')

@section('admin')
<?php $i = 1; ?>
<div class="panel">
	<div class="panel-heading">
		<h2 class="panel-title">History</h2>
	</div>
	<div class="panel-body">
		<table id="table-surat">
			<thead>
				<tr>
					<th>No.</th>
					<th>Pengaju</th>						
					<th>Keperluan Surat</th>
					<th>No. Surat</th>					
					<th>Tanggal Pengajuan</th>
					<th>Status Surat</th>	
					<th>Keterangan</th>
					<th>Aksi</th>				
				</tr>
			</thead>
			<tbody>	
			@foreach($surat as $data)										
				@php					
					$surat1a = DB::table('surat_1_a')->where('id', $data->id_surat)->first();
					$surat1b = DB::table('surat_1_b')->where('id', $data->id_surat)->first();									$nomor_surat = DB::table('nomor_surat')->where('tipe_surat', $data->tipe_surat)->where('id_surat', $data->id_surat)->first();
				@endphp
				<tr>					
					<td>{{$i++}}</td>
					<td>
						@if($data->tipe_surat == "1A")
							{{$surat1a->nama}}
						@else
							{{$surat1b->nama}}
						@endif
					</td>
					<td>
						@if($data->tipe_surat == "1A")
							{{$surat1a->keperluan}}
						@else
							{{$surat1b->keperluan_data}}
						@endif
					</td>
					<td>
						@if($data->status == 1)
							{{$nomor_surat->nomor}}						
						@endif
					</td>					
					<td>{{$data->created_at}}</td>
					@if($data->status == 1)					
					<td><span class="label label-success">Berhasil Diproses</span></td>											
					@elseif($data->status == 2)	
					<td><span class="label label-danger">Ditolak</span></td>											
					@endif
					<td>{{$data->comment}}</td>
					<td width="15%" align="center">
						@if($data->tipe_surat == "1A")
							@if($data->status == 1)						
								<a target="_blank" href="{{route('admin.viewSurat1A', $surat1a->id)}}" class="btn btn-primary btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>							
							@endif
						<a href="{{route('admin.editSurat1A', $surat1a->id)}}" title="Edit" class="btn btn-warning btn-xs"><i class="fa fa-edit" disabled></i></a>
						@else
							@if($data->status == 1)
								<a target="_blank" href="{{route('admin.viewSurat1B', $surat1b->id)}}" class="btn btn-primary btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>
							@endif
						<a href="{{route('admin.editSurat1B', $surat1b->id)}}" title="Edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection