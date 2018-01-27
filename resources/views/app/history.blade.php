@extends('layouts.master')

@section('history')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">History</h3>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>					
					<th>Jenis Surat</th>
					<th>Waktu Pengajuan</th>
					<th>Status Surat</th>	
					<th>Aksi</th>				
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Surat 1</td>
					<td>5 Desember 2017</td>
					<td><span class="label label-success">Diterima</span></td>
					<td><a href="/sejarah-surat/lihat/1"><button class="btn btn-info btn-xs"><i class="fa fa-eye fa-fw"></i><span>Lihat</span>
				</tr>
				<tr>
					<td>2</td>
					<td>Surat 2</td>
					<td>5 Desember 2017</td>
					<td><span class="label label-default">Pending</span></td>
					<td><a href="/sejarah-surat/lihat/1"><button class="btn btn-info btn-xs"><i class="fa fa-eye fa-fw"></i><span>Lihat</span>
				</tr>
				<tr>
					<td>3</td>
					<td>Surat 2</td>
					<td>10 Desember 2017</td>
					<td><span class="label label-default">Pending</span></td>
					<td><a href="/sejarah-surat/lihat/1"><button class="btn btn-info btn-xs"><i class="fa fa-eye fa-fw"></i><span>Lihat</span></button></a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection