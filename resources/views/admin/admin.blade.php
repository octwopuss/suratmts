@extends('layouts.admin-master')

@section('admin')

@php
    $notif1A = DB::table('detail_surat')->where('notif', '1')->where('tipe_surat', '1A')->get();        
    $notif1B = DB::table('detail_surat')->where('notif', '1')->where('tipe_surat', '1B')->get();        
@endphp
<div class="panel-body">
    <div class="row">
        <div class="panel-heading">
            <h1 class="page-title">Surat Keluar</h1>
        </div>
        <a href="{{route('admin.showSurat1A')}}">           
            <div class="col-md-3">                
                    <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">{{count($notif1A)}}</span>                        
                        <span class="title">Surat Internal</span>                            
                    </p>
                </div>                
            </div>
        </a>

        <a href="{{route('admin.showSurat1B')}}">           
            <div class="col-md-3">                
                    <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">{{count($notif1B)}}</span>
                        <span class="title">Surat Eksternal</span>                            
                    </p>
                </div>                
            </div>
        </a>        
    </div>
    <div class="row">
        <div class="panel-heading">
            <h1 class="page-title">Surat Masuk</h1>
        </div>
        <a href="{{route('admin.showSuratMasuk')}}">           
            <div class="col-md-5">                
                    <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number">Daftar Surat Masuk</span>                                                         
                        <span class="title"></span>
                    </p>
                </div>                
            </div>
        </a>       
    </div>
</div>
@endsection