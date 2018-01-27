@extends('layouts.admin-master');


@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Table {{$data}}</strong></h3>
</div>
<div class="panel">
	<form class="navbar-form navbar-right">
		<div class="input-group">
			<input type="text" value="" class="form-control" placeholder="Cari Data...">
			<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
		</div>
	</form>	
	<div class="navbar-left">
		
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Tanggal Masuk</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Steve</td>
					<td>Jobs</td>
					<td>18 Desember 2017</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye fa-xs fa-fw"></i>View</button>
						<a href="/admin/surat-masuk/1/edit">
							<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-wpforms fa-xs fa-fw"></i>Edit</button>
						</a>
						<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-print fa-xs fa-fw"></i>Cetak</button>
					</td>	
				</tr>
				<tr>
					<td>2</td>
					<td>Simon</td>
					<td>Philips</td>
					<td>20 Desember 2017</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye fa-xs fa-fw"></i>View</button>
						<a href="/admin/surat-masuk/2/edit">
							<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-wpforms fa-xs fa-fw"></i>Edit</button>
						</a>
						<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-print fa-xs fa-fw"></i>Cetak</button>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Jane</td>
					<td>Doe</td>
					<td>30 Desember 2017</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye fa-xs fa-fw"></i>View</button>
						<a href="/admin/surat-masuk/3/edit">
							<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-wpforms fa-xs fa-fw"></i>Edit</button>
						</a>
						<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-print fa-xs fa-fw"></i>Cetak</button>
					</td>
				</tr>
				<tr>					
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection