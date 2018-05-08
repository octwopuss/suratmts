@extends('layouts.master')

@section('title', 'Dashboard')

@section('dashboard')
<div class="panel-body">
    <div class="panel-heading">        
        <h1 class="page-title">Ajukan Surat</h1>
    </div>
    <div class="row">
        <a href="{{route('showSurat1A')}}">           
            <div class="col-md-4">                
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">Surat Keterangan Aktif Kuliah</span>                        
                    </p>
                </div>                
            </div>
        </a>
        <a href="{{route('showSurat1B')}}">           
            <div class="col-md-4">                
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>                        
                        <span class="number">Surat Permintaan Data</span>                                         
                    </p>
                </div>                
            </div>
        </a>
    </div>
</div>

@endsection