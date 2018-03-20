@extends('layouts.admin-master');


@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Surat 1</strong></h3>
</div>
<div class="panel">
	<form class="navbar-form navbar-right">
		<div class="input-group">
			<input type="text" value="" class="form-control" placeholder="Cari Data...">
			<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
		</div>
	</form>	
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Pengaju Surat</th>
					<th>Jenis Surat</th>
					<th>Tanggal Masuk</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($surat as $srt)
				<tr>			
					<td>{{$srt->student->nama}}</td>					
					<td>Surat 1</td>
					<td>{{$srt->created_at->format('d F Y')}}</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye fa-xs fa-fw"></i>View</button>
						<a href="/admin/surat-masuk/1/edit">
							<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-wpforms fa-xs fa-fw"></i>Edit</button>
						</a>
						<a target="_blank" href="{{route('cetakSurat',$srt->id)}}">
							<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-print fa-xs fa-fw"></i>Cetak</button>
						</a>
					</td>	
				</tr>				
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection