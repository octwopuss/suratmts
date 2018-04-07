@extends('layouts.admin-master')

@section('admin')
<div class="panel">
	<div class="panel-body">
		<div class="page-title">
			<h2>Daftar Penanggung Jawab Surat</h2>
		</div>		
		<table id="table-surat" class="cell-border">
			<thead>
				<tr>
					<td width="50%">Nama</td>
					<td>status</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>	
				@foreach($penanggungjawab as $pj)
				<tr>
					<td>{{$pj->nama}}</td>
					<td align="center">
						@if($pj->active == 1)
							<p style="font-size: 10pt;" class="label label-success">Aktif</p>
						@endif
					</td>
					<td align="center">
						@if($pj->active == 0)
							<a href="{{route('admin.storePenanggungJawab', $pj->id)}}" title="aktifkan" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Aktifkan</a>
						@endif

					</td>
				</tr>			
				@endforeach
			</tbody>
		</table>
		<br>
	</div>
</div>
@endsection