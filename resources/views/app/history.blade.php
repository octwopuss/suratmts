@extends('layouts.master')

@section('title','Riwayat Surat')
@section('history')
<?php $i = 1; ?>
<div class="panel">
	<div class="panel-heading">
		<h2 class="panel-title">History</h2>
	</div>
	<div class="panel-body">
		<table id="table-surat" class="cell-border" style="width:100%">
			<thead>
				<tr>
					<th>No.</th>									
					<th>Keperluan Surat</th>
					<th>Tanggal Pengajuan</th>
					<th>Status Surat</th>	
					<th>Keterangan</th>				
					<th>Aksi</th>	
				</tr>
			</thead>
			<tbody>				
				@foreach($detail_surat as $surat)
				<tr>
					@php
						$surat1a = DB::table('surat_1_a')->where('id', $surat->id_surat)->first();
						$surat1b = DB::table('surat_1_b')->where('id', $surat->id_surat)->first();						
					@endphp
					<td>
						{{$i++}}
					</td>										
					<td>							
						@if($surat->tipe_surat == "1A")
							{{$surat1a->keperluan}}
						@else
							@if($surat1b->alasan_keperluan == "Tugas")
								Penelitian dan Penulisan Tugas
							@else
								Penelitian dan Penulisan Tesis
							@endif
						@endif
					</td>
					<td>{{$surat->created_at}}</td>
					@if($surat->status == 0)
					<td><span class="label label-default">Sedang Diproses</span></td>
					@elseif($surat->status == 1)
					<td><span class="label label-success">Diterima</span></td>
					@else
					<td><span class="label label-danger">Ditolak</span></td>
					@endif					
					<td>{{$surat->comment}} </td>	
					<td>
						@if($surat->tipe_surat == "1A")
						<a target="_blank" href="{{route('viewHistory', [$surat1a->id, $surat->user_id, $surat->tipe_surat])}}" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a>
						@else
						<a target="_blank" href="{{route('viewHistory', [$surat1b->id, $surat->user_id, $surat->tipe_surat])}}" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a>
						@endif
					</td>														
				</tr>		
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection