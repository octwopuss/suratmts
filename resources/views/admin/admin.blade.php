@extends('layouts.admin-master')

@section('admin')
<div class="panel-body">
<div class="panel-heading">
    <h1 class="page-title">Daftar Surat Masuk</h1>
</div>
<div class="row">
@for($i = 1; $i < 2; $i++)
        <a href="{{route('admin.suratMasuk.show')}}">           
            <div class="col-md-3">                
                    <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">Surat</span>
                        <span class="title">{{$i}}</span>                            
                    </p>
                </div>                
            </div>
        </a>
@endfor
    </div>
</div>

@endsection