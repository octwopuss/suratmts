@extends('layouts.master')

@section('form')	

	@foreach($surat as $srt)
	<p>ID : {{$srt->id}}</p>
	<p>Bidang pilihan : {{$srt->bidang_pilihan}}</p>

	@endforeach
@endsection