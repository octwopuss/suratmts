@extends('layouts.master')

@section('title','Profil')
@section('history')
<div class="col-md-8">
	<div class="panel panel-headline">
		<div class="panel-heading">
			<div class="right">
				<p><a href="{{route('editProfil')}}" title="Edit Data"><i class="fa fa-edit"></i>Edit Data</a> &nbsp;
				<a href="{{route('ubahPassword')}}" title="Ubah Password"><i class="fa fa-key">Ubah Password</i></a></p>
			</div>
			<h1 class="panel-title">Profil Akun</h1>
			<hr>	
		</div>
		<div class="panel-body">
			<p>Nama</p>
			<h5><b>{{$student->nama}}</b></h5>
			<p>NIM</p>
			<h5><b>{{$student->nim}}</b></h5>
			<p>Bidang Pilihan</p>
			<h5><b>{{$student->bidang_pilihan}}</b></h5>
			<p>Judul Tesis</p>
			<h5><b>@if($student->judul_tesis != null) {{$student->judul_tesis}} @else - @endif </b></h5>
			<p>Semester</p>
			<h5><b>@if($student->semester != null) {{$student->semester}} @else <b> - </b> @endif</b></h5>
			<p>Nomor Handphone</p>
			<h5><b>@if($student->phone != null) {{$student->phone}} @else <b> - </b> @endif</b></h5>
			<p>Email</p>
			<h5><b>@if($student->email != null) {{$student->email}} @else <b> - </b> @endif</b></h5>
			<p>Instansi</p>
			<h5><b>@if($student->instansi != null) {{$student->instansi}} @else <b> - </b> @endif</b></h5>
			<p>Alamat Instansi</p>
			<h5><b>@if($student->alamat_instansi != null) {{$student->alamat_instansi}} @else <b> - </b> @endif</b></h5>
			<p>Telepon Instansi</p>
			<h5><b> @if($student->telp_instansi != null) {{$student->telp_instansi}} @else <b> - </b> @endif</b></h5>
		</div>

	</div>
</div>
	
	
@endsection