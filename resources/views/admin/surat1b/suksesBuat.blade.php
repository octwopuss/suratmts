@extends('layouts.admin-master')

@section('title', 'Surat Berhasil Dibuat')

@section('admin')

	<div class="panel">
		<div class="panel-body">
			<div class="panel-title">
				<h2 class="page-title">Surat Berhasil Dibuat!</h2>
			</div>
			<a  target="_blank" class="btn btn-default" href="{{route('admin.viewSurat1B', $id)}}"><i class="fa fa-eye"></i>Lihat Surat</a>
			<a class="btn btn-default" href="{{route('admin.showSurat1B')}}"><i class="fa fa-home"></i>Kembali</a>
		</div>		
	</div>		

	
@endsection