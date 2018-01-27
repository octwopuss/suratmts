@extends('layouts.master')

@section('tabel')
<div class="panel-title">
	<h3 class="page-title"><strong>Table {{$data}}</strong></h3>
	<h3 class="page-title"><a href="/table/{{$data}}/tambah"><button type="button" class="btn btn-success">Buat Surat</button></a></h3>
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
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Steve</td>
					<td>Jobs</td>
					<td>@steve</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm">View</button>
						<button type="button" class="btn btn-warn btn-sm">Edit</button>
						<button type="button" class="btn btn-danger btn-sm">Delete</button>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Simon</td>
					<td>Philips</td>
					<td>@simon</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm">View</button>
						<button type="button" class="btn btn-warn btn-sm">Edit</button>
						<button type="button" class="btn btn-danger btn-sm">Delete</button>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Jane</td>
					<td>Doe</td>
					<td>@jane</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm">View</button>
						<button type="button" class="btn btn-warn btn-sm">Edit</button>
						<button type="button" class="btn btn-danger btn-sm">Delete</button>
					</td>
				</tr>
				<tr>					
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection