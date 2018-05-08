<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">        
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>
    @php
        $notif = DB::table('detail_surat')->where('notif', '1')->get();   
        $notif_drop = DB::table('detail_surat')->where('notif' , '1')->take(5)->get();                
    @endphp
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <!-- LOGO -->
            <div class="brand">
                <a href="{{route('admin.dashboard')}}"><img src="{{asset('assets/img/logo-login.png')}}" alt="Dashboard" class="img-responsive logo"></a>
            </div>
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
                                        @foreach($notif_drop as $ntf)                         
                                            @if($ntf->tipe_surat == "1A" )
                                                @php
                                                    $surat1a = DB::table('surat_1_a')->where('id', $ntf->id_surat)->first();                                            
                                                    $jenis = "Surat Internal";
                                                @endphp
                                                    <li><a href="{{route('admin.showSurat1A')}}" class="notification-item">{{$surat1a->nama}} Telah Mengajukan {{$jenis}}</a></li>
                                            @else
                                                @php
                                                    $surat1b = DB::table('surat_1_b')->where('id', $ntf->id_surat)->first(); 
                                                    $jenis = "Surat Eksternal";                                            
                                                @endphp
                                                    <li><a href="{{route('admin.showSurat1B')}}" class="notification-item">{{$surat1b->nama}} Telah Mengajukan {{$jenis}}</a></li>
                                            @endif                                                               
                                        @endforeach
                                    @else
                                    <li><a class="notification-item">Tidak ada notifikasi</a></li>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- <img src="{{asset('assets/img/user.png')}}" class="img-circle" alt="Avatar">  --><span>{{Auth::guard('admin')->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admin.logout')}}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
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
                        <li><a href="/admin/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dasbor</span></a>
                        <li>
                            <a href="#suratMasuk" data-toggle="collapse" class="collapsed"><i class="lnr lnr-envelope"></i> <span>Surat Masuk</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="suratMasuk" class="collapse">
                                <ul class="nav">
                                    <li><a href="{{route('admin.showSuratMasuk')}}">Daftar Surat Masuk</a></li>
                                    <li><a href="{{route('admin.addSuratMasuk')}}">Buat Surat Masuk</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPagesAdmin" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Formulir Pengajuan</span > <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPagesAdmin" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{route('admin.showSurat1A')}}">Surat Internal</a></li>
                                    <li><a href="{{route('admin.showSurat1B')}}">Surat Eksternal</a></li>                                    
                               </ul>
                            </div>
                        </li>                                                                               
                        <li>
                            <a href="#createSurat" data-toggle="collapse" class="collapsed"><i class="lnr lnr-inbox"></i> <span>Buat Surat</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="createSurat" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{route('admin.pengajuSurat1A')}}">Surat Internal</a></li>                           
                                    <li><a href="{{route('admin.pengajuSurat1B')}}">Surat Eksternal</a></li>                         
                                </ul>
                            </div>
                        </li>  
                        <li>
                            <a href="#Mahasiswa" data-toggle="collapse" class="collapsed"><i class="fa fa-users"></i> <span>Mahasiswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="Mahasiswa" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{route('admin.showMahasiswa')}}">Data Mahasiswa</a></li>                           
                                    <li><a href="{{route('admin.createMahasiswa')}}">Tambah Mahasiswa</a></li>                           
                                </ul>
                            </div>
                        </li>  
                        <li><a href="{{route('admin.history')}}"><i class="fa fa-history" ></i><span>Riwayat Surat Keluar</span></a></li>                        
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
                    @yield('login')                                           
                    @yield('admin')                    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>    
    <!-- DataTable JS -->
    <script>
        $(document).ready(function() {
            $('#table-surat').DataTable();
        } );

         var count = 0;

        function tambahData(){
            var field_data = '<input class="form-control input-lg" placeholder="opsional" type="text" name="keperluan_data[]">';
            $('#keperluan_data').append(field_data);
            count += 1;
           if(count > 8){
                $('#btnTambahData').hide();
           }
        }

        $(document).ready(function() {
            $('#select2-js').select2();
        });
    </script>          
</body>
</html>