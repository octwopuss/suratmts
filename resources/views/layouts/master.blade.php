<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">        
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">    
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">    
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">    
</head>

<body>

    @php
        $user_id = Auth::guard('student')->user()->id;
        $notif = DB::table('detail_surat')->where('user_id', $user_id)->where('user_notif', '1')->take(5)->get();                
    @endphp
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <!-- LOGO -->
            <!-- <div class="brand">
                <a href=" "><img src="assets/img/Logo-Unlam-mini.png" alt="Dashboard" class="img-responsive logo"></a>
            </div> -->
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>                      
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                @if(count($notif) > 0)
                                <span class="badge bg-danger">             
                                    {{count($notif)}}                                                 
                                </span>
                                @endif                                    
                            </a>
                            <ul class="dropdown-menu notifications">                    
                            @if(count($notif) > 0)        
                                @foreach($notif as $ntf)                                    
                                    @if($ntf->status == 1)                                    
                                        @php                                            
                                            $status = "diterima";
                                            if($ntf->tipe_surat == "1A"){
                                                $tipe = "internal";
                                            }
                                            else{
                                                $tipe = "eksternal";                                            
                                            }
                                        @endphp                                        
                                <li><a href="{{route('history')}}" class="notification-item">
                                    @if($ntf->status == 1)
                                    <span class="dot bg-success"></span>
                                    @elseif($ntf->status == 2)
                                    <span class="dot bg-danger"></span>
                                    @endif
                                    Pengajuan surat {{$tipe}} anda telah {{$status}}
                                </a></li>   
                                    @elseif($ntf->status == 2)
                                        @php                                            
                                            $status = "ditolak";
                                            if($ntf->tipe_surat == "1A"){
                                                $tipe = "internal";
                                            }
                                            else{
                                                $tipe = "eksternal";                                            
                                            }
                                        @endphp
                                <li><a href="{{route('history')}}" class="notification-item">
                                        @if($ntf->status == 1)
                                        <span class="dot bg-success"></span>
                                        @elseif($ntf->status == 2)
                                        <span class="dot bg-danger"></span>
                                        @endif
                                        Pengajuan surat {{$tipe}} anda telah {{$status}}                                    
                                    @endif
                                @endforeach                                 
                                @else
                                <li><a class="notification-item">Tidak ada pemberitahuan</a></li>
                                @endif
                            </ul>
                        </li>
                        <!-- Might use this dropdown later -->
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Basic Use</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{Auth::guard('student')->user()->nama}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i><span>Dasbor</span></a>                 
                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-inbox"></i> <span>Buat Surat</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{route('showSurat1A')}}" class="">Surat Internal</a></li>                                    
                                    <li><a href="{{route('showSurat1B')}}" class="">Surat Eksternal</a></li>                                    
                                </ul>
                            </div>
                        </li>  
                        <li><a href="/riwayat-surat"><i class="fa fa-history" ></i><span>Riwayat Surat</span></a></li>                                            
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="panel-body">
                    @yield('dashboard')       
                    @yield('form')    
                    @yield('login')   
                    @yield('tabel')            
                    @yield('history') 
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
       
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->    
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>    
    <script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-surat').DataTable();
        } );
    </script>          
</body>
</html>