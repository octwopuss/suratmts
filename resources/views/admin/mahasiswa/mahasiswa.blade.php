@extends('layouts.admin-master')

@section('admin')
	<div class="panel-title">
	<h3 class="page-title"><strong>Data Mahasiswa</strong></h3>
	<h3 class="page-title"><a href="{{route('admin.createMahasiswa')}}"><button type="button" class="btn btn-success">Tambah Mahasiswa</button></a></h3>
</div>

<div class="panel">	
	<div class="panel-body">
		<table id="table-surat" class="cell-border" style="width:100%">
			<thead>
				<tr>
					<th>Nama</th>									
					<th>NIM</th>
					<th>Bidang Pilihan</th>
					<th>Email</th>	
					<th>Telepon</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($mahasiswa as $row)		
			<tr>			
				<td>{{$row->nama}}</td>	
				<td>{{$row->nim}}</td>					
				<td>{{$row->bidang_pilihan}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->phone}}</td>
				<td>					
					<a href="{{route('admin.editMahasiswa', $row->id)}}"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
					<a href="{{route('admin.deleteMahasiswa', $row->id)}}" class="deleteSurat"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
				</td>
			</tr>				
			@endforeach	
			</tbody>
		</table>
	</div>	
</div> 	
		
@endsection