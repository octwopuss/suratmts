@extends('layouts.master')

@section('history')
<div class="panel">
	<div class="panel-heading">
		<h2 class="panel-title">History</h2>
	</div>
	<div class="panel-body">
		<table id="table-surat" class="cell-border" style="width:100%">
			<thead>
				<tr>									
					<th>Keperluan Surat</th>
					<th>Tanggal Pengajuan</th>
					<th>Status Surat</th>	
					<th>Aksi</th>				
				</tr>
			</thead>
			<tbody>
				@foreach($detail_surat as $surat)
				<tr>										
					<td>
						@php
						if($surat->tipe_surat == "1A"){
							$id_surat = $surat->id_surat;
							$surat = DB::table('surat_1_a')->where('id', $id_surat)->first();
							$keperluan = $surat->keperluan;
							echo $keperluan;
						}else{
							$id_surat = $surat->id_surat;
							$surat = DB::table('surat_1_b')->where('id', $id_surat)->first();
							$keperluan = $surat->keperluan_data;
							echo $keperluan;
						}
						@endphp
					</td>
					<td>
						{{$surat->created_at}}
					</td>
					<td><span class="label label-success">Diterima</span></td>
					<td><a href="/riwayat-surat/lihat/1"><button class="btn btn-info btn-xs"><i class="fa fa-eye fa-fw"></i><span>Lihat</span>
				</tr>		
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection