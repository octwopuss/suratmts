@extends('layouts.master')

@section('dashboard')
<div class="panel-body">
    <div class="panel-heading">        
        <h1 class="page-title">Ajukan Surat</h1>
    </div>
    <div class="row">
@for($i = 1; $i < 2; $i++)
        <a href="{{route('showSurat1A')}}">           
            <div class="col-md-3">                
                    <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">Surat Internal</span>
                        <!-- <span class="title">Internal</span>                             -->
                    </p>
                </div>                
            </div>
        </a>
        <a href="{{route('showSurat1B')}}">           
            <div class="col-md-3">                
                    <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">Surat Eksternal</span>                        
                    </p>
                </div>                
            </div>
        </a>
@endfor
    </div>
</div>

@endsection