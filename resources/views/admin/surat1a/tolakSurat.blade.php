@extends ('layouts.admin-master')

@section('title', 'Tolak Surat')

@section('admin')
	
	<div class="panel">	
		<div class="panel-body">
			<div class="panel-title">
				<h2 class="page-title">Tolak Surat</h2>
				<p>Komentar Alasan Ditolak</p>
			</div>
			<form method="POST" action="{{route('admin.storeTolak1A', $id)}}">
				{{csrf_field()}}
				<textarea class="form-control" placeholder="Alasan" rows="4" name="commentar"></textarea>
				<br>
				<button type="submit">Save</button>
			</form>
		</div>
	</div>


@endsection